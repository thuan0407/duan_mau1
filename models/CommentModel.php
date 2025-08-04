<?php 
class Comment{
    public $id;
    public $content;
    public $product_id;
    public $date;
    public $user_id;
    public $user_name;
    public $total_comments;
}
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class CommentModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

        public function create(Comment $comment){        //thêm danh comment
            try{
                $sql="INSERT INTO `comment` (`id`, `content`, `product_id`, `user_id`, `date`)
                 VALUES (NULL, '".$comment->content."', '".$comment->product_id."', '".$comment->user_id."', '".$comment->date."');";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }  

public function find_comment_idpro($id) {
    try {
        $sql = "SELECT cmt.*, user.name as name_User
        FROM `product` as pro 
        JOIN `comment` as cmt ON cmt.product_id = pro.id 
        JOIN `user` as user ON cmt.user_id = user.id 
        WHERE pro.id = $id
        ORDER BY cmt.date DESC;";
        $data= $this->conn->query($sql)->fetchAll();
        $comments = [];
        foreach ($data as $row) {
            $comment                   = new Comment();
            $comment->id              = $row['id'];
            $comment->content         = $row['content'];
            $comment->date            = $row['date'];
            $comment->name_User       = $row['name_User'];
            $comments[] = $comment;
        }

        return $comments;
    } catch (PDOException $err) {
        echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
    }
}

        public function delete_comment($id){                                //xóa comment
            try{
                $sql="DELETE FROM comment WHERE `comment`.`id` = $id";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

}
