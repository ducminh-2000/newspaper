<?php
//models/type
require_once 'models/Model.php';
class Type extends Model {
  //khai báo các thuộc tính cho model trùng với các trường
//    của bảng types
  public $id;
  public $name;
  public $created_at;
  public $updated_at;

  //insert dữ liệu vào bảng types
  public function insert() {
    $sql_insert =
      "INSERT INTO types(`name`)
VALUES (:name)";
    //cbi đối tượng truy vấn
    $obj_insert = $this->connection
      ->prepare($sql_insert);
    //gán giá trị thật cho các placeholder
    $arr_insert = [
      ':name' => $this->name,
    ];
    return $obj_insert->execute($arr_insert);
  }

  /**
   * LẤy thông tin danh mục trên hệ thống
   * @param $params array Mảng các tham số search
   * @return array
   */
  public function getAll($params = []) {
    //tạo 1 chuỗi truy vấn để thêm các điều kiện search
    //dựa vào mảng params truyền vào
    $str_search = 'WHERE TRUE';
    //check mảng param truyền vào để thay đổi lại chuỗi search
    if (isset($params['name']) && !empty($params['name'])) {
      $name = $params['name'];
      //nhớ phải có dấu cách ở đầu chuỗi
      $str_search .= " AND `name` LIKE '%$name%'";
    }
    //tạo câu truy vấn
    //gắn chuỗi search nếu có vào truy vấn ban đầu
    $sql_select_all = "SELECT * FROM types $str_search";
    //cbi đối tượng truy vấn
    $obj_select_all = $this->connection
      ->prepare($sql_select_all);
    $obj_select_all->execute();
    $types = $obj_select_all
      ->fetchAll(PDO::FETCH_ASSOC);
    return $types;
  }

  public function getById($id) {
    $sql_select_one = "SELECT * FROM types WHERE id = $id";
    $obj_select_one = $this->connection
      ->prepare($sql_select_one);
    $obj_select_one->execute();
    $type = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $type;
  }

  /**
   * Lấy type theo id truyền vào
   * @param $id
   * @return array
   */
  public function gettypeById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT * FROM types WHERE id = $id");
    $obj_select->execute();
    $type = $obj_select->fetch(PDO::FETCH_ASSOC);

    return $type;
  }

  /**
   * Update bản ghi theo id truyền vào
   * @param $id
   * @return bool
   */
  public function update($id)
  {
    $obj_update = $this->connection->prepare("UPDATE types SET `name` = :name, `updated_at` = :updated_at 
         WHERE id = $id");
    $arr_update = [
      ':name' => $this->name,
      ':updated_at' => $this->updated_at,
    ];

    return $obj_update->execute($arr_update);
  }

  /**
   * Xóa bản ghi theo id truyền vào
   * @param $id
   * @return bool
   */
  public function delete($id)
  {
    $obj_delete = $this->connection
      ->prepare("DELETE FROM types WHERE id = $id");
    $is_delete = $obj_delete->execute();
    //để đảm bảo toàn vẹn dữ liệu, sau khi xóa type thì cần xóa cả các product nào đang thuộc về type này
    $obj_delete_product = $this->connection
      ->prepare("DELETE FROM article WHERE typeId = $id");
    $obj_delete_product->execute();

    return $is_delete;
  }

  /**
   * Lấy tổng số bản ghi trong bảng types
   * @return mixed
   */
  public function countTotal()
  {
    $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM types");
    $obj_select->execute();

    return $obj_select->fetchColumn();
  }

  public function getAllPagination($params = [])
  {
    $limit = $params['limit'];
    $page = $params['page'];
    $start = ($page - 1) * $limit;
    $obj_select = $this->connection
      ->prepare("SELECT * FROM types  LIMIT $start, $limit");
    $obj_select->execute();
    $types = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $types;
  }
}