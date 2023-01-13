<?php
    class homemodel extends database{
        //đếm tất cả các hóa đơn
        function CountAllOrder(){
            $sql = "SELECT count(*) as tong FROM order_product WHERE cancel_order =  0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //đếm tổng doanh thu của web
        function CountAllMony(){
            $sql = "SELECT sum(total_mony) as tong FROM order_product WHERE status_recieve = 'true'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //đếm tổng số đơn hàng đã giao
        function CountOrderSuccess(){
            $sql = "SELECT count(*) as tong FROM order_product WHERE status_recieve = 'true'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //lấy ra 10 đơn hàng gần đây nhất
        function OrderNew(){
            $sql = "SELECT * FROM order_product WHERE cancel_order =  0 and delete_order = 0 order by id desc limit 4";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //đếm tổng số thành viên
        function CountUser(){
            $sql = "SELECT count(*) as tong FROM user_account";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>