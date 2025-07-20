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

        public function all(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `product`";
                $data=$this->conn->query($sql)->fetchAll();
                $dulieu=[];
                foreach($data as $tt){
                    $sanpham = new Product();
                    $sanpham->id=$tt['id'];
                    $sanpham->name        = $tt['name'];
                    $sanpham->image       = $tt['image'];
                    $sanpham->price       = $tt['price'];
                    $sanpham->idcategory  = $tt['idcategory'];
                    $sanpham->description = $tt['description'];
                    $sanpham->hot         = $tt['hot'];
                    $sanpham->view        = $tt['view'];
                    $sanpham->discount    = $tt['discount'];
                    $sanpham->quantity    = $tt['quantity'];
                    $dulieu[]=$sanpham;
                }
                return $dulieu;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

}
