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
                    $category = new Category();
                    $category->id          =$tt['id'];
                    $category->name        =$tt['name'];
                    $category->date        =$tt['date'];
                    $category->sum         =$tt['sum'];
                    $danhsach[]=$category;
                }
                return $danhsach;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function create_category(Category $category){        //thêm danh mục
            try{
                $sql="INSERT INTO `category` (`id`, `name`, `date`)
                 VALUES (NULL, '".$category->name."', '$category->date');";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function delete_category($id){        //thêm danh mục
            try{
                $sql="DELETE FROM category WHERE `category`.`id` = $id";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function find($id){//tìm
            try{
                $sql="SELECT * FROM `category` Where id = $id";
                $data=$this->conn->query($sql)->fetch();
                if($data !== false){
                    $category = new Category();
                    $category->id          = $data['id'];
                    $category->name        = $data['name'];
                    $category->date        = $data['date'];

                    return $category;
                }

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function update_category(Category $category){        //sửa danh mục
            try{
                $id = (int)$category->id;
                $sql="UPDATE `category` SET `name` = '".$category->name."' WHERE `category`.`id` = $id;";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }
        
}
