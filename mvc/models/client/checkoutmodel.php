<?php
    class checkoutmodel extends database{
        //Ghi dữ liệu vào bảng order_product trong database
        function AddOrder($id_user,$name,$phone,$address,$total){
            $sql = "INSERT INTO order_product VALUES ('', $id_user, current_time(), '$name', '$address', '$phone', 'Chờ Xử Lý',$total,'false',0,0)";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $id_order = $this->conn->lastInsertId();
            return $id_order;
        }

        //Ghi dữ liệu vào bảng order_details trong database
        function AddOrderDetails($id_order,$id_product,$quantity,$unit_price,$name_product){
            $sql = "INSERT INTO order_details VALUES ($id_order,'$name_product', $id_product, $quantity, $unit_price)";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        //Lấy ra số lượng hiện có của sản phẩm tức là cột quantity của sản phẩm
        function GetQuantityById($id){
            $sql = "SELECT quantity FROM product WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //cập nhật lại số lượng sản phẩm sau khi đã bán
        function UpdateQuantityById($id,$quantity){
            $sql = "UPDATE product SET quantity = $quantity WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        //Lấy số lượng đã bán cột pay trong bảng product
        function GetProductPay($id){
            $sql = "SELECT pay FROM product WHERE id = $id and status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]["pay"];
        }
        //Cập nhật số lượng sản phẩm đã bán trong mỗi sản phẩm (cột pay trong csdl)
        function PayProduct($id,$quantity){
            $sql = "UPDATE product SET pay = $quantity WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        //lấy đơn hàng theo id khách hàng(dùng để hiển thị lịch sử mua hàng của khách hàng)
        function GetHistotyOrder($id){
            $sql = "select * from order_product where user_id = $id and cancel_order = 0 and delete_order = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        //xử lý khách hàng bấm nút xác nhận đã nhận hàng
        function Confirm($id){
            $sql = "UPDATE order_product SET status_recieve = 'true' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $sql = "UPDATE order_product SET status = 'Đã Nhận Hàng' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        //xử lý khi khách hàng bấm xóa đơn hàng
        function DeleteOrder($id){
                $sql = "UPDATE  order_product SET delete_order = 1 WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
        }
        function CancelOrder($id){
            $sql = "UPDATE  order_product SET cancel_order = 1 WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
    }
    }
?>