<?php 
    class Product{
        public $id;
        public $name;
        public $image;
        public $price;
        public $category_id;
        public $description;
        public $hot;
        public $discount;
        public $quantity;

    }
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class ProductModel 
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

}
