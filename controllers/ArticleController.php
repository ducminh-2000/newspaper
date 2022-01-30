<?php
require_once 'controllers/Controller.php';
require_once 'models/article.php';
require_once 'models/type.php';
require_once 'models/Pagination.php';

class ArticleController extends Controller
{
  public function index()
  {
    $article_model = new Article();

    //lấy tổng số bản ghi đang có trong bảng articles
    $count_total = $article_model->countTotal();
    //        xử lý phân trang
    $query_additional = '';
    if (isset($_GET['title'])) {
      $query_additional .= '&title=' . $_GET['title'];
    }
    $arr_params = [
        'total' => $count_total,
        'limit' => 5,
        'query_string' => 'page',
        'controller' => 'article',
        'action' => 'index',
        'full_mode' => false,
        'query_additional' => $query_additional,
        'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
    $articles = $article_model->getAllPagination($arr_params);
    $pagination = new Pagination($arr_params);

    $pages = $pagination->getPagination();

    //lấy danh sách type đang có trên hệ thống để phục vụ cho search
    $type_model = new Type();
    $types = $type_model->getAll();
    if($_SESSION['user']['roleId'] == 2){
        $this->content = $this->render('views/article/menu.php', [
        'articles' => $articles,
        'types' => $types,
        'pages' => $pages,
        ]);
    
        require_once 'views/layouts/main_home.php';
    }
    else{
        $this->content = $this->render('views/article/index.php', [
            'articles' => $articles,
            'types' => $types,
            'pages' => $pages,
        ]);
        require_once 'views/layouts/main.php';
    }
  }

  public function create()
  {
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $typeId = $_POST['type_id'];
      $title = $_POST['title'];
      $content = $_POST['content'];
      $description = $_POST['description'];
      //xử lý validate
      if (empty($title)) {
        $this->error = 'Không được để trống title';
      } else if ($_FILES['avatar']['error'] == 0) {
        //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $arr_extension = ['jpg', 'jpeg', 'png', 'gif', 'jfif'];

        $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
        //làm tròn theo đơn vị thập phân
        $file_size_mb = round($file_size_mb, 2);

        if (!in_array($extension, $arr_extension)) {
          $this->error = 'Cần upload file định dạng ảnh';
        } else if ($file_size_mb > 2) {
          $this->error = 'File upload không được quá 2MB';
        }
      }

      //nếu ko có lỗi thì tiến hành save dữ liệu
      if (empty($this->error)) {
        $filetitle = '';
        //xử lý upload file nếu có
        if ($_FILES['avatar']['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/uploads';
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
          $filetitle = time() . '-article-' . $_FILES['avatar']['name'];
          move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filetitle);
        }
        //save dữ liệu vào bảng articles
        $article_model = new Article();
        $article_model->typeId = $typeId;
        $article_model->title = $title;
        $article_model->avatar = $filetitle;
        $article_model->userId = $_SESSION['user']['id'];
        $article_model->content = $content;
        $article_model->description = $description;
        $is_insert = $article_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Insert dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Insert dữ liệu thất bại';
        }
        header('Location: index.php?controller=article');
        exit();
      }
    }

    //lấy danh sách type đang có trên hệ thống để phục vụ cho search
    $type_model = new Type();
    $types = $type_model->getAll();

    $this->content = $this->render('views/article/create.php', [
        'types' => $types
    ]);
    require_once 'views/layouts/main.php';
  }

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=article');
      exit();
    }

    $id = $_GET['id'];
    $article_model = new Article();
    $article = $article_model->getById($id);
    if($_SESSION['user']['roleId'] != 2){
      $this->content = $this->render('views/article/detail.php', [
          'article' => $article
      ]);
      require_once 'views/layouts/main.php';
    }else{
      $this->content = $this->render('views/article/detail_home.php', [
        'article' => $article
    ]);
    require_once 'views/layouts/main_home.php';
    }
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=article');
      exit();
    }

    $id = $_GET['id'];
    $article_model = new Article();
    $article = $article_model->getById($id);
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $typeId = $_POST['typeId'];
      $title = $_POST['title'];
      $content = $_POST['content'];
      $description = $_POST['description'];
      //xử lý validate
      if (empty($title)) {
        $this->error = 'Không được để trống title';
      } else if ($_FILES['avatar']['error'] == 0) {
        //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

        $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
        //làm tròn theo đơn vị thập phân
        $file_size_mb = round($file_size_mb, 2);

        if (!in_array($extension, $arr_extension)) {
          $this->error = 'Cần upload file định dạng ảnh';
        } else if ($file_size_mb > 2) {
          $this->error = 'File upload không được quá 2MB';
        }
      }

      //nếu ko có lỗi thì tiến hành save dữ liệu
      if (empty($this->error)) {
        $filetitle = $article['avatar'];
        //xử lý upload file nếu có
        if ($_FILES['avatar']['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/uploads';
          //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
          @unlink($dir_uploads . '/' . $filetitle);
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
          $filetitle = time() . '-article-' . $_FILES['avatar']['name'];
          move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filetitle);
        }
        //save dữ liệu vào bảng articles
        $article_model = new Article();
        $article_model->typeId = $typeId;
        $article_model->title = $title;
        $article_model->avatar = $filetitle;
        $article_model->userId = $_SESSION['user']['id'];
        $article_model->content = $content;
        $article_model->description = $description;
        $article_model->updated_at = date('Y-m-d H:i:s');

        $is_update = $article_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Update dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Update dữ liệu thất bại';
        }
        header('Location: index.php?controller=article');
        exit();
      }
    }

    //lấy danh sách type đang có trên hệ thống để phục vụ cho search
    $type_model = new Type();
    $types = $type_model->getAll();

    $this->content = $this->render('views/article/update.php', [
        'types' => $types,
        'article' => $article,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=article');
      exit();
    }

    $id = $_GET['id'];
    $article_model = new Article();
    $is_delete = $article_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa dữ liệu thành công';
    } else {
      $_SESSION['error'] = 'Xóa dữ liệu thất bại';
    }
    header('Location: index.php?controller=article');
    exit();
  }

  public function showAll() {
    $article_model = new Article();
    $count_total = $article_model->countTotal();
    $params = [];
    $query_additional = '';
    if (isset($_GET['title'])) {
      $query_additional .= '&title=' . $_GET['title'];
    }
    if (isset($_GET['typeId'])) {
      $query_additional .= '&typeId=' . $_GET['typeId'];
    }    
    $params_pagination = [
      'total' => $count_total,
      'limit' => 5,
      'query_string' => 'page',
      'controller' => 'article',
      'action' => 'showAll',
      'full_mode' => false,
      'query_additional' => $query_additional,
      'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
    //xử lý phân trang
    $pagination_model = new Pagination($params_pagination);
    $pagination = $pagination_model->getPagination();
    //get articles
    $article_model = new Article();
    $articles = $article_model->getarticleInHomePage($params);

    //get categories để filter
    $type_model = new Type();
    $types = $type_model->getAll();

    $this->content = $this->render('views/article/menu.php', [
      'articles' => $articles,
      'types' => $types,
      'pagination' => $pagination,
    ]);

    require_once 'views/layouts/main_home.php';
  }

  public function detailByGuest() {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID ko hợp lệ';
      $url_redirect = $_SERVER['SCRIPT_title'] . '/';
      header("Location: $url_redirect");
      exit();
    }

    $id = $_GET['id'];
    $article_model = new Article();
    $article = $article_model->getById($id);

    $this->content = $this->render('views/article/detail_home.php', [
      'article' => $article
    ]);
    require_once 'views/layouts/main_home.php';
  }

}