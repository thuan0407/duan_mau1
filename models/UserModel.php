<?php 
class User{
    public $id;
    public $name;
    public $email;
    public $role;
    public $password;
    public $address;
    public $number;
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
                    $dulieu[]=$user;
                }
                return $dulieu;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

                public function create(User $user){        //thêm người dùng
            try{
                $sql="INSERT INTO `user` (`id`, `name`, `email`, `role`, `password`, `address`, `number`) 
                VALUES (NULL, '".$user->name."', '".$user->email."',
                 '".$user->role."', '".$user->password."', '".$user->address."', '".$user->number."');";
                $data=$this->conn->exec($sql);
                return $data;
            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function delete_tk($id){                                //xóa tài khoản
            try{
                $sql="DELETE FROM user WHERE `user`.`id` = $id";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

public function update_pass($id, $newHash) {
    try {
        $sql = "UPDATE `user` SET `password` = ? WHERE `id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$newHash, $id]);
        return true;
    } catch (PDOException $err) {
        echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        return false;
    }
}

}
