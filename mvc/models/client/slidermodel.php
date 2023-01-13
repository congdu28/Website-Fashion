<?php
    class slidermodel extends database{
        // Hiển thị Slider
        function ShowSlider(){
            $sql = "SELECT * FROM slider WHERE status = 'Hiển Thị'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>