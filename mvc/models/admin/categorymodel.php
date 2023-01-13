<?php

    class categorymodel extends database{
        //Hàm lấy tất cả danh mục sản phẩm
        function GetCategory(){
            $sql = "SELECT * FROM category WHERE status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        //Hàm xóa danh mục sản phẩm
        function DeleteCategory($id){
            $sql = "UPDATE  category SET status_delete = 1 WHERE id = '$id'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        //Hàm them danh mục sản phẩm
        function AddCategory($name,$status,$slug){
            $sql = "INSERT INTO category VALUES ('','$name','$slug','$status',current_time(),'',0)";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        //Hàm lấy danh mục sản phẩm theo id
        function GetCategoryId($id){
            $sql = "SELECT * FROM category WHERE id = '$id' and status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        //Hàm xử lý thay đổi trạng thái hiển thị của danh mục sản phẩm
//        function StatusCategory($id,$status){
//            if($status == "Hiển Thị"){
//                $sql = "UPDATE category SET status='Ẩn' WHERE id = $id";
//                $query = $this->conn->prepare($sql);
//                $query->execute();
//            }else{
//                $sql = "UPDATE category SET status='Hiển Thị' WHERE id = $id";
//                $query = $this->conn->prepare($sql);
//                $query->execute();
//            }
//        }

        //Hàm xử lý chỉnh sửa danh mục sản phẩm
        function EditCategory($name,$slug,$id){
            $sql = "UPDATE  category SET slug = '$slug', name = '$name' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
    }

?>