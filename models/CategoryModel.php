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

        public function all(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT cate.*, COALESCE(SUM(pro.quantity),0) as sum FROM `category` as cate 
                LEFT JOIN product as pro ON pro.category_id = cate.id GROUP BY cate.id ORDER BY sum DESC";
                $data=$this->conn->query($sql)->fetchAll();
                $danhsach=[];
                foreach($data as $tt){
                    $danhmuc = new Category();
                    $danhmuc->id          =$tt['id'];
                    $danhmuc->name        =$tt['name'];
                    $danhmuc->date        =$tt['date'];
                    $danhmuc->sum         =$tt['sum'];
                    $danhsach[]=$danhmuc;
                }
                return $danhsach;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

}
