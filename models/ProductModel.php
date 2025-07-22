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
                    $sanpham->category_id = $tt['category_id'];
                    $sanpham->description = $tt['description'];
                    $sanpham->hot         = $tt['hot'];
                    $sanpham->discount    = $tt['discount'];
                    $sanpham->quantity    = $tt['quantity'];
                    $dulieu[]=$sanpham;
                }
                return $dulieu;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }


            public function find($id){                                     //tìm
            try{
                $sql="SELECT * FROM `product` WHERE id = $id";
                $data=$this->conn->query($sql)->fetch();
                if($data !== false){
                    $sanpham = new Product();
                    $sanpham->id          =$data['id'];
                    $sanpham->name        = $data['name'];
                    $sanpham->image       = $data['image'];
                    $sanpham->price       = $data['price'];
                    $sanpham->category_id  = $data['category_id'];
                    $sanpham->description = $data['description'];
                    $sanpham->hot         = $data['hot'];
                    $sanpham->discount    = $data['discount'];
                    $sanpham->quantity    = $data['quantity'];
                    return $sanpham;
                }

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function create(Product $sanpham){        //thêm sản phẩm
            try{
                $sql="INSERT INTO `product` (`id`, `image`, `price`, `category_id`, `hot`, `quantity`, `description`, `discount`, `name`)
                 VALUES (NULL, '".$sanpham->image."', '".$sanpham->price."', '".$sanpham->category_id."', '".$sanpham->hot."',
                  '".$sanpham->quantity."', '".$sanpham->description."', '".$sanpham->discount."', '".$sanpham->name."');";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }


        public function delete_sanpham($id){                                //xóa sản phẩm
            try{
                $sql="DELETE FROM product WHERE `product`.`id` = $id";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function update(Product $sanpham){                  //upate sản phẩm
            try{
                $id=(int)$sanpham->id;
                $sql="UPDATE `product` SET `image` = '".$sanpham->image."', `price` = '".$sanpham->price."',
                 `category_id` = '".$sanpham->category_id."', `hot` = '".$sanpham->hot."', `quantity` = '".$sanpham->quantity."', `description` = '".$sanpham->description."', 
                 `discount` = '".$sanpham->discount."', `name` = '".$sanpham->name."' WHERE `product`.`id` = $id;";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function all_hot(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `product` Where `hot` = 1 LIMIT 4";
                $data=$this->conn->query($sql)->fetchAll();
                $dulieu=[];
                foreach($data as $tt){
                    $sanpham = new Product();
                    $sanpham->id=$tt['id'];
                    $sanpham->name        = $tt['name'];
                    $sanpham->image       = $tt['image'];
                    $sanpham->price       = $tt['price'];
                    $sanpham->category_id = $tt['category_id'];
                    $sanpham->description = $tt['description'];
                    $sanpham->hot         = $tt['hot'];
                    $sanpham->discount    = $tt['discount'];
                    $sanpham->quantity    = $tt['quantity'];
                    $dulieu[]=$sanpham;
                }
                return $dulieu;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function all_moi(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `product` Where `hot` = 2 LIMIT 4";
                $data=$this->conn->query($sql)->fetchAll();
                $dulieu=[];
                foreach($data as $tt){
                    $sanpham = new Product();
                    $sanpham->id=$tt['id'];
                    $sanpham->name        = $tt['name'];
                    $sanpham->image       = $tt['image'];
                    $sanpham->price       = $tt['price'];
                    $sanpham->category_id = $tt['category_id'];
                    $sanpham->description = $tt['description'];
                    $sanpham->hot         = $tt['hot'];
                    $sanpham->discount    = $tt['discount'];
                    $sanpham->quantity    = $tt['quantity'];
                    $dulieu[]=$sanpham;
                }
                return $dulieu;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function all_khuyenmai(){//hiện toàn bộ thông tin
            try{
                $sql="SELECT * FROM `product` Where `hot` = 3 LIMIT 4";
                $data=$this->conn->query($sql)->fetchAll();
                $dulieu=[];
                foreach($data as $tt){
                    $sanpham = new Product();
                    $sanpham->id=$tt['id'];
                    $sanpham->name        = $tt['name'];
                    $sanpham->image       = $tt['image'];
                    $sanpham->price       = $tt['price'];
                    $sanpham->category_id = $tt['category_id'];
                    $sanpham->description = $tt['description'];
                    $sanpham->hot         = $tt['hot'];
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
