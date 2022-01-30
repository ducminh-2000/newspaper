<?php
require 'Model.php';
class User extends Model{
    public $id;
    public $username;
    public $password;
    public $name;
    public $roleId;
    public $created_at;
    public $updated_at;

    public $str_search;

    function __construct(){
        parent::__construct();
        if (isset($_GET['username']) && !empty($_GET['username'])) {
            $username = addslashes($_GET['username']);
            $this->str_search .= " AND users.username LIKE '%$username%'";
        }
    }

    public function getAll() {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users ORDER BY updated_at DESC, created_at DESC");
        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function getAllPagination($params = []) {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE TRUE $this->str_search
              ORDER BY created_at DESC
              LIMIT $start, $limit");

        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function getTotal() {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM users WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getById($id) {
        $obj_select = $this->connection
            ->prepare("SELECT users.*, role.name AS role_name FROM users 
            INNER JOIN role ON users.roleId = role.id WHERE users.id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function insert() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO users(username, password, name, roleId)
VALUES(:username, :password, :name, :roleId)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':name' => $this->name,
            ':roleId' => $this->roleId
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function update($id) {
        $obj_update = $this->connection
            ->prepare("UPDATE users SET name=:name,password=:password, roleId=:roleId, updated_at=:updated_at
             WHERE id = $id");
        $arr_update = [
            ':name' => $this->name,
            ':password' => $this->password,
            ':roleId' => $this->roleId,
            ':updated_at' => $this->updated_at,
        ];
        $obj_update->execute($arr_update);

        return $obj_update->execute($arr_update);
    }
    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM users WHERE id = $id");
        return $obj_delete->execute();
    }

    public function getUserByUsername($username) {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM users WHERE username='$username'");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getUserByUsernameAndPassword($username, $passwordword) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE username=:username AND password=:password LIMIT 1");
        $arr_select = [
            ':username' => $username,
            ':password' => $passwordword,
        ];
        $obj_select->execute($arr_select);

        $user = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function insertRegister() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO users(username, password, roleId)
VALUES(:username, :password, :roleId)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':roleId' => $this->roleId,
        ];
        return $obj_insert->execute($arr_insert);
    }

}
?>