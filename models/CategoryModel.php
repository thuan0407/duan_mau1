<?php 
class Category {
    public $id;
    public $name;
    public $sum;
    public $date;
}

// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class CategoryModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

}
