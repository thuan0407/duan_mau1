<?php 
class User{
    public $id;
    public $name;
    public $email;
    public $image;
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
                    $user->image       = $tt['image'];
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
                $sql="INSERT INTO `user` (`id`, `name`, `email`, `image`, `role`, `password`, `address`, `number`) 
                VALUES (NULL, '".$user->name."', '".$user->email."', '".$user->image."',
                 '".$user->role."', '".$user->password."', '".$user->address."', '".$user->number."');";
                $data=$this->conn->exec($sql);
                return $data;
            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

}
