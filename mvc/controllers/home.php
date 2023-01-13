<?php
    class home extends controller{
        var $commonmodel;
        var $categorymodel;
        var $slider;
        var $checkoutmodel;
        function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->categorymodel = $this->ModelClient("homemodel");
            $this->slider = $this->ModelClient("slidermodel");
            $this->checkoutmodel = $this->ModelClient("checkoutmodel");
        }

        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }

        function index(){
            if(isset($_GET['page'])){
                $currentpage =  $_GET['page'];
            }else $currentpage = 1;
            // hiển thị sản phẩm tương ứng số trang
            $limit = 6;
            $totalproduct = $this->commonmodel->GetNumber("product");
            $totalpage = ceil($totalproduct / $limit);
            $offset = ($currentpage - 1) * $limit;
            $result = json_decode($this->commonmodel->GetCategoryPage($limit,$offset,"product"),true);
            $totalpage = ceil($totalproduct / $limit);
            //hiện danh mục sản phẩm
            $tolalcategory =json_decode($this->categorymodel->ShowCategory(),true);
            //hiển thị sản phẩm mới
            $productnew = $this->commonmodel->GetProductNew();
            //lấy ra id sản phẩm được bán nhiều nhất
            $MSProduct = $this->commonmodel->MSProduct();
            //Hiển Thị slider
            $slider = $this->slider->ShowSlider();
            //Sản phẩm khuyến mãi
            $productsale = $this->commonmodel->ProductSale();
            $data = [
                "folder"        =>"home",
                "file"          =>"home",
                "data"          =>$result,
                "total"         =>$totalpage,
                "currentpage"   =>$currentpage,
                "totalcategory" =>$tolalcategory,
                "productnew"    =>$productnew,
                "MSProduct"     =>$MSProduct,
                "sliders"       =>$slider,
                "productsale"   =>$productsale
            ];
            $this->ViewClinet("masterlayout",$data);
        }

        // Lịch sử mua hàng của khách hàng
        function history(){
            if(isset($_SESSION["info"])){
                if(isset($_POST["confirm"])){
                    $id = $_POST["id"];
                    $this->checkoutmodel->Confirm($id);
                }
                if(isset($_POST["cancel"])){
                    $id = $_POST["id"];
                    $this->checkoutmodel->CancelOrder($id);
                }
                if(isset($_POST["delete"])){
                    $id = $_POST["id"];
                    $this->checkoutmodel->DeleteOrder($id);
                }
                if(isset($_POST["details"])){
                    
                }
                //lấy id khách hàng sau đó lấy ra nhưng đơn hàng của khách hàng đó
                $id = $_SESSION["info"]["id"];
                $order = $this->checkoutmodel->GetHistotyOrder($id);
                $data = [
                    "order"=>$order
                ];
                $this->ViewClinet("history",$data);
            }else{
                $_SESSION["error_login"] = "Vui Lòng đăng nhập";
                header("location:".base."login/login");
            }
        }
    }
?>