<?php
    class cart extends controller{
        var $commonmodel;
        var $checkoutmodel;
        function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->checkoutmodel = $this->ModelClient("checkoutmodel");;
        }
        
        //Trang lỗi đường dẫn 404
        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }

        //Hiển thị sản phẩm trong giỏ hàng
        function showcart(){
            //xử lý khi người dùng bấm nút thanh toán
            if(isset($_POST['submit'])){
                //Kiểm tra xem giỏ hàng có trống hay không mới cho thanh toán
                if(isset($_SESSION["cart"])){
                    //Lấy thông tin khách hàng 
                    $order = $_POST['order'];
                    //lấy id khách hàng
                    $id = $_SESSION["info"]["id"];
                    //Thêm đơn hàng vào bảng order_product
                    $id_order = $this->checkoutmodel->AddOrder($id,$order["name"],$order["phone"],$order["address"],$order["total"]);
                    //dùng for để duyệt giỏ hàng lấy ra từng sản phẩm
                    foreach($_SESSION["cart"] as $key=>$values){
                        //thêm từng sản phẩm vào bảng order_detail
                        $this->checkoutmodel->AddOrderDetails($id_order,$values["id"],$values["quantity"],$values["total"],$values["name"]);
                        $quantity_product = $this->checkoutmodel->GetQuantityById($values["id"]);
                        //Khi bấm thanh toán thì lấy số lượng còn trong kho trừ đi số lượng mà người dùng mua rồi cập nhật lại số lượng
                        $quantity_update = $quantity_product[0]["quantity"] - $values["quantity"];
                        $this->checkoutmodel->UpdateQuantityById($values["id"],$quantity_update);
                        //lấy số lượng mà người dùng đã mua ghi vào mục pay (số lượng đã bán)
                        $quantity_pay = $this->checkoutmodel->GetProductPay($values["id"]) + $values["quantity"];
                        $this->checkoutmodel->PayProduct($values["id"],$quantity_pay);
                    };
                    unset($_SESSION["cart"]);
                    //notification("success","Đặt Hàng Thành Công","Đơn hàng của bạn đang chờ xử lý","OK","true","3085d6");
                    NotifiOrder("Đặt Hàng Thành Công","home/history");
                }else 
                    notification("error","Không Thành Công","Vui lòng thêm sản phẩm vào giỏ hàng","OK","true","3085d6");
            }
        
            //cập nhật lại số lượng khi người dùng thêm số lượng
            if(isset($_POST["updatequantity"])){
                $id = $_POST["idproduct"];
                $quantity = $_POST["quantity"];
                $quantity_product = $this->checkoutmodel->GetQuantityById($id);
                if($quantity <= $quantity_product[0]["quantity"]){
                    $_SESSION['cart'][$id]["quantity"]=$quantity;
                    if($_SESSION['cart'][$id]["quantity"] <= 0){
                        $_SESSION['cart'][$id]["quantity"]=1;
                        $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price"];
                    }else{
                        $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price"];
                    }
                }else{
                    NotifiErrorQuantity("Xin lỗi số lượng trong kho chỉ còn lại ".$quantity_product[0]["quantity"]." sản phẩm");
                }
            }
            //tính tổng tiền
            $total = 0;
            if(isset($_SESSION["cart"])){
                foreach($_SESSION["cart"] as $key=>$values){
                    $total+=$values["total"];
                }
            }
            $data = [
                "total"=>$total
            ];
            $this->ViewClinet("cart",$data);
        }

        //Thanh toán đơn hàng
        function order(){
            
        }
    }
?>