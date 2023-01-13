<?php
    class slidermodel extends database{
        // Hiển thị Slider
        function ShowSlider(){
            $sql = "SELECT * FROM slider";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        //Thêm Slider
        function AddSlider($name,$img){
            $sql = "INSERT INTO slider values ('','$name','$img',current_time(),'','Hiển Thị')";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        //dùng để hiển thị hoặc ẩn slider trang người dùng
        function statusslider($id,$status){
            if($status == "Hiển Thị"){
                $sql = "UPDATE slider SET status='Ẩn' WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }else{
                $sql = "UPDATE slider SET status='Hiển Thị' WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
        }

        //Xóa slider
        function DeleteSlider($id){
            $sql = "DELETE from slider WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
    }
?>