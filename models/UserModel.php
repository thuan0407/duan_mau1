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

}
