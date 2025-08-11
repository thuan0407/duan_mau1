<?php 
class User{
    public $id;
    public $name;
    public $email;
    public $role;
    public $password;
    public $address;
    public $number;
    public $active;
}
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class UserModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

            public function all(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `user`";
                $data=$this->conn->query($sql)->fetchAll();
                $dulieu=[];
                foreach($data as $tt){
                    $user = new User();
                    $user->id          = $tt['id'];
                    $user->name        = $tt['name'];
                    $user->email       = $tt['email'];
                    $user->number      = $tt['number'];
                    $user->address     = $tt['address'];
                    $user->password    = $tt['password'];
                    $user->role        = $tt['role'];
                    $user->active      = $tt['active'];
                    $dulieu[]=$user;
                }
                return $dulieu;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

            public function find_account($id){                                     //tìm tài khoản người dùng
            try{
                $sql="SELECT * FROM `user`= $id";
                $data=$this->conn->query($sql)->fetch();
                if($data !== false){
                    $user = new User();
                    $user->id          = $tt['id'];
                    $user->name        = $tt['name'];
                    $user->email       = $tt['email'];
                    $user->number      = $tt['number'];
                    $user->address     = $tt['address'];
                    $user->password    = $tt['password'];
                    $user->role        = $tt['role'];
                    $user->active      = $tt['active'];
                    return $user;
                }

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function create(User $user){        //thêm người dùng
            try{
                $sql="INSERT INTO `user` (`id`, `name`, `email`, `role`, `password`, `address`, `number`,`active`) 
                VALUES (NULL, '".$user->name."', '".$user->email."',
                 '".$user->role."', '".$user->password."', '".$user->address."', '".$user->number."', '".$user->active."');";
                $data=$this->conn->exec($sql);
                return $data;
            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function delete_account($id){                                //xóa tài khoản
            try{
                $sql="DELETE FROM user WHERE `user`.`id` = $id";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function lock_account($id) {                            // Khóa tài khoản
            try {
                $id = (int)$id;
                $active = 0;

                $sql = "UPDATE `user` SET `active` = '$active' WHERE `user`.`id` = $id;";
                $data = $this->conn->exec($sql);
                return $data;

            } catch (PDOException $err) {
                echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
            }
        }

        public function open_account($id) {                            // mở tài khoản
            try {
                $id = (int)$id;
                $active = 1;

                $sql = "UPDATE `user` SET `active` = '$active' WHERE `user`.`id` = $id;";
                $data = $this->conn->exec($sql);
                return $data;

            } catch (PDOException $err) {
                echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
            }
        }

}
