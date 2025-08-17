<?php 
class Product_type {
    public $id;
    public $name;
}

// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class Product_typeModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function all(){//hiện toàn bộ thông tin
        try{
            $sql="SELECT * FROM `product_type`";
            $data=$this->conn->query($sql)->fetchAll();
            $list=[];
            foreach($data as $tt){
                $product_type = new Product_type();
                $product_type->id          =$tt['id'];
                $product_type->name        =$tt['name'];
                $list[]=$product_type;
            }
            return $list;

        }catch (PDOException $err) {
        echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
    }
    }
        
}
