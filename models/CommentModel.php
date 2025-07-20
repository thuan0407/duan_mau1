<?php 
class Comment{
    public $id;
    public $content;
    public $product_id;
    public $date;
    public $iduser;
}
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class CommentModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

}
