<?php
require_once 'models/Model.php';

class Article extends Model
{

    public $id;
    public $typeId;
    public $title;
    public $avatar;
    public $userId;
    public $description;
    public $content;
    public $created_at;
    public $updated_at;
    /*
     * Chuỗi search, sinh tự động dựa vào tham số GET trên Url
     */
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND article.title LIKE '%{$_GET['title']}%'";
        }
    }

    /**
     * Lấy thông tin của sản phẩm đang có trên hệ thống
     * @return array
     */
    public function getAll()
    {
        $obj_select = $this->connection
            ->prepare("SELECT article.*, types.name 
                        AS type_name, users.name AS author FROM article
                        INNER JOIN types ON article.typeId = types.id
                        INNER JOIN users ON article.userId = users.id
                        WHERE TRUE $this->str_search
                        ORDER BY article.created_at DESC
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Lấy thông tin của sản phẩm đang có trên hệ thống
     * @param array Mảng các tham số phân trang
     * @return array
     */
    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT article.*, types.name 
                    AS type_name, users.name AS author FROM article
                    INNER JOIN types ON article.typeId = types.id
                    INNER JOIN users ON article.userId = users.id
                    WHERE TRUE $this->str_search
                    ORDER BY article.updated_at DESC,article.created_at DESC
                    LIMIT $start, $limit
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Tính tổng số bản ghi đang có trong bảng products
     * @return mixed
     */
    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM article WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    /**
     * Insert dữ liệu vào bảng products
     * @return bool
     */
    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO article(typeId, title, avatar, description, userId, content) 
                                VALUES (:typeId, :title, :avatar, :description, :userId, :content)");
        $arr_insert = [
            ':typeId' => $this->typeId,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':userId' => $this->userId,
            ':content' => $this->content
        ];
        return $obj_insert->execute($arr_insert);
    }

    /**
     * Lấy thông tin sản phẩm theo id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT article.*, types.name 
            AS type_name, users.name AS author FROM article
            INNER JOIN types ON article.typeId = types.id
            INNER JOIN users ON article.userId = users.id WHERE article.id = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }


    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE article SET typeId=:typeId, title=:title, avatar=:avatar,
            description=:description, userId=:userId, content=:content, updated_at=:updated_at WHERE id = $id
");
        $arr_update = [
            ':typeId' => $this->typeId,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':userId' => $this->userId,
            ':content' => $this->content,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM article WHERE id = $id");
        return $obj_delete->execute();
    }

    public function getArticleInHomePage($params = []) {
        $str_filter = '';
        if (isset($params['type_article'])) {
          $str_type = $params['type_article'];
          $str_filter .= " AND types.id IN $str_type";
        }
        if (isset($params['content'])) {
          $str_content = $params['content'];
          $str_filter .= " AND $str_content";
        }
        if(isset($params['title'])){
            $str_title = $params['title'];
            $str_filter.= " AND article.title LIKE %$str_title%";
        }
        //do cả 2 bảng products và categories đều có trường title, nên cần phải thay đổi lại tên cột cho 1 trong 2 bảng
        $sql_select = "SELECT article.*, types.name 
              AS type_name, users.name AS author FROM article
              INNER JOIN types ON article.typeId = types.id
              INNER JOIN users ON article.userId = users.id
              WHERE TRUE $str_filter";
    
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $articles = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
      }
    
}