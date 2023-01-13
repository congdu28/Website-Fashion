<?php
    class admin extends controller{
        var $categorymodel;
        var $accadminmodel;
        var $commonmodel;
        var $productmodel;
        var $slider;
        var $ordermodel;
        var $table = "admin_account";
        var $homemodel;
        function __construct()
        {
            $this->homemodel  = $this->ModelAdmin("homemodel");
            $this->categorymodel = $this->ModelAdmin("categorymodel");
            $this->accadminmodel = $this->ModelAdmin("accountmodel");
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->productmodel = $this->ModelAdmin("productmodel");
            $this->slider = $this->ModelAdmin("slidermodel");
            $this->ordermodel=$this->ModelAdmin("ordermodel");
            //check người dùng đã đăng nhập hay chưa hoặc đã đăng nhập trước đó mà chưa đăng xuất
            if(isset($_COOKIE["user"])){
                $cookie = $_COOKIE["user"];
                $result = $this->commonmodel->GetCookie($cookie,$this->table);
                if($result < 1){
                    header("location:".base."login/admin");
                }
            }else{
                header("location:".base."login/admin");
            }
            
        }

        //Lỗi đường dẫn 404
        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }

        //Trang home admin
        function home(){
            //lấy ra số lượng tất cả các đơn hàng
            $countallorder = $this->homemodel->CountAllOrder();
            //lấy ra tổng doanh thu của web
            $totalmony = $this->homemodel->CountAllMony();
            //lấy ra tổng các đơn hàng đã giao thành công
            $ordersuccess = $this->homemodel->CountOrderSuccess();
            //lấy ra tổng số lượng thành viên
            $totaluser = $this->homemodel->CountUser();
            //lấy ra thông tin 10 đơn hàng gần nhất
            $ordernew = $this->homemodel->OrderNew();
            $data = [
                "folder"=>"home",
                "file"  =>"homeadmin",
                "totalorder"=>$countallorder[0]["tong"],
                "totalmony"=>$totalmony[0]["tong"],
                "ordersuccess"=>$ordersuccess[0]["tong"],
                "ordernew"=>$ordernew,
                "totaluser"=>$totaluser[0]["tong"]
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        //quản lí danh mục sản phẩm
        function showcategory(){
            $limit = 5;
            //lấy số trang
            if(isset($_GET['page'])){
                $currentpage =  $_GET['page'];
            }else $currentpage = 1;
            // hiển thị sản phẩm tương ứng số trang
            $offset = ($currentpage - 1)*$limit;
            $totalcategory = $this->commonmodel->GetNumber("category");
            $totalpage = ceil($totalcategory / $limit);
            $mess = "";
            $temp = $this->commonmodel->GetCategoryPage($limit,$offset,"category");
            $result = json_decode($temp,true);
            if( isset($_SESSION["DeleteCategory"]) ){
                $mess  = $_SESSION["DeleteCategory"];
                unset($_SESSION["DeleteCategory"]);
            }
            $data = [
            "folder"     =>"category",
            "file"       =>"showcategory",
            "title"      =>"Danh Sách Danh Mục Sản Phẩm",
            "data"       =>$result,
            "mess"       =>$mess,
            "total"  =>$totalpage,
            "currentpage"=>$currentpage
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        //Xóa danh mục sản phẩm 
        function deletecategory($id,$page,$stt){
            if($stt % 5 == 1){
                $page-=1;
            }
            $result = $this->categorymodel->DeleteCategory($id);
            $this->productmodel->UpdateProduct($id);
            if($result){
                $_SESSION["DeleteCategory"] = "Xóa Danh Mục Thành Công!";
                header("location:".base."admin/showcategory&page=".$page."");
            }
            
        }

        //Thêm Danh Mục Sản Phẩm 
        function addcategory(){
            $mess = "";
            if(isset($_POST["submit"])){
                $name = $_POST["name_category"];
                $publish = "Hiển Thị";
                $slug = $_POST["slug"];
                $result = $this->categorymodel->AddCategory($name,$publish,$slug);
                if($result == true){
                    $mess = "Thêm Danh Mục Thành Công";
                   
                }else{
                    $mess ="Có Lỗi Xảy Ra Vui Lòng Thử Lại";
                }
            }
            $data = [
                "folder"=>"category",
                "file"  =>"addcategory",
                "title" =>"Thêm Mới Danh Mục Sản Phẩm",
                "mess"  =>$mess];
            $this->ViewAdmin("masterlayout",$data);
        }

        //Thay đổi trạng thái hiển thị danh mục sản phẩm
        function statuscategory(){
            $id = $_GET['id'];
            $status = $_GET['status'];
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else $page =1;
            $this->categorymodel->StatusCategory($id,$status);
            header("location:".base."admin/showcategory&page=".$page."");
        }
        
        //Chỉnh sửa danh mục sản phẩm
        function editcategory(){
            $id = $_GET['id'];
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else{
                $page = 1;
            }
            $mess="";
            if(isset($_POST['submit'])){
                $slug = $_POST['slug'];
                $name = $_POST['name'];
                $result = $this->categorymodel->EditCategory($name,$slug,$id);
                if($result != null){
                    $mess = "Sửa Danh Mục Thành Công!";
                }else{
                    $mess = "Sửa Danh Mục Thất Bại!";
                }
            }
            $result = $this->commonmodel->GetData($id,"category");
            $data = [
                "folder"      =>"category",
                "file"        =>"editcategory",
                "title"       =>"Sửa Danh Mục Sản Phẩm",
                "data"        =>$result,
                "mess"        =>$mess,
                "page"        =>$page
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        //Đổi mật khẩu admin
        function changepass(){
                if(isset($_POST["submit"])){
                    $post = $_POST["data"];
                    $cookie = $_COOKIE["user"];
                    $result = $this->commonmodel->GetPassOld($cookie,$this->table);
                    if($result != null){
                        if(md5($post["pass_old"]) == $result[0]["pass_word"]){
                            if($post["pass_new"]==$post["pass_again"]){
                                $passnew = $post["pass_new"];
                                $passold = $result[0]["pass_word"];
                                $success = $this->commonmodel->ChangePassword(md5($passnew),$cookie,$this->table);
                                if($success){
                                    notification("success","Thành Công!","Mật khẩu đã được thay đổi!","Xác Nhận","true","#3085d6");
                                }else{
                                    notification("error","Thất Bại","Có lỗi sảy ra vui lòng thử lại!","Xác Nhận","true","#3085d6");
                                }
                            }else{
                                notification("error","Thất Bại","Nhập lại mật khẩu không khớp!","Xác Nhận","true","#3085d6");
                            }
                        }else{
                            notification("error","Thất Bại","Mật khẩu cũ không chính xác!","Xác Nhận","true","#3085d6");
                        }
                    }
                }
            $data = ["folder"=>"changepass","file"=>"changepass","titel"=>"Đổi Mật Khẩu"];
            $this->ViewAdmin("masterlayout",$data);
        }

        // Thêm Sản Phẩm Mới
        function addproduct(){
            $data_category = json_decode($this->categorymodel->GetCategory(),true);
            $notifi = [];
            $addsuccess="";
            if(isset($_POST["submit"])){
                $product = $_POST["product"];
                // echo "<pre>";
                // echo $_FILES["img"]["name"];die;
                if($product["id_category"] == "true"){
                    $notifi["category"] = "Vui Lòng Chọn Danh Mục";
                }
                if($product["name"] == ""){
                    $notifi["name"] = "Vui Lòng Nhập Tên Sản Phẩm";
                }
                if($product["price"] == ""){
                    $notifi["price"] = "Vui Lòng Nhập Giá Sản Phẩm";
                }
                if($_FILES["img"]["name"] == ""){
                    $notifi ["img"] = "Vui Lòng Chọn Ảnh Sản Phẩm";
                }
                if($product["quantity"] == ""){
                    $notifi["quantity"] = "Vui Lòng Nhập Số Lượng Sản Phẩm";
                }
                if($product["sale"] == ""){
                    $notifi["sale"] = "Vui Lòng Nhập % Giảm Giá";
                }
                if($notifi == null){
                    $img_product = $_FILES["img"]["name"];
                    $checkUpLoad = UpLoadFiles(urlFileProduct,$_FILES);
                    if($checkUpLoad != 1){
                        $notifi["img"] = $checkUpLoad["exits"];
                    }
                }
                //lấy tên danh mục sản phẩm mà người quản trị chọn để lưu vào name_category
                $temp = $this->categorymodel->GetCategoryId($product["id_category"]);
                $name_category = json_decode($temp,true);
                if($notifi == null){
                    $result = $this->productmodel->AddProduct($product["name"],$product["price"],$img_product,$product["quantity"],$product["decs"],$product["company"],$product["id_category"],$name_category[0]["name"],$product["sale"]);
                    if($result == true){
                        $addsuccess = "Thêm Sản Phẩm Thành Công!";
                    }
                };
            }
            $data = [
            "folder" =>"product",
            "file"=>"addproduct",
            "title"=>"Thêm Mới Sản Phẩm",
            "data"=>$data_category,
            "notifi"=>$notifi,
            "addsuccess"=>$addsuccess
            ];
            $this-> ViewAdmin("masterlayout",$data);
        }

        //Quản lí sản phẩm
        function showproduct(){
            //hiện thông báo xóa sản phẩm
            if( isset($_SESSION["DeleteProduct"]) ){
                $mess  = $_SESSION["DeleteProduct"];
                unset($_SESSION["DeleteProduct"]);
            }else{
                $mess = "";
            }
            //lấy số trang
            if(isset($_GET['page'])){
                $currentpage =  $_GET['page'];
            }else $currentpage = 1;
            // hiển thị sản phẩm tương ứng số trang
            $limit = 3;
            $totalproduct = $this->commonmodel->GetNumber("product");
            $totalpage = ceil($totalproduct / $limit);
            $offset = ($currentpage - 1) * $limit;
            $result = json_decode($this->commonmodel->GetCategoryPage($limit,$offset,"product"),true);
            $totalpage = ceil($totalproduct / $limit);
            $data = [
                "folder"      =>"product",
                "file"        =>"showproduct",
                "title"       =>"Danh Sách Sản Phẩm",
                "data"        =>$result,
                "total"       =>$totalpage,
                "currentpage" =>$currentpage,
                "mess"        =>$mess
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        //Xóa sản phẩm
        function deleteproduct($id,$page,$stt){
            $result = $this->productmodel->DeleteProduct($id);
            if($stt % 3 == 1){
                $page-=1;
            }
            if($result){
                $_SESSION["DeleteProduct"] = "Xóa Sản Phẩm Thành Công!";
                header("location:".base."admin/showproduct&page=".$page."");
            }
        }
        //Chỉnh sửa thông tin sản phẩm
        function editproduct(){
            //lấy trang của id cần sửa
            if(isset( $_GET["page"])){
                $page = $_GET["page"];
            }else $page =1;
            //lấy id cần sửa
            $id = $_GET['id'];
            //lấy sản phẩm cần sửa
            $product = $this->commonmodel->GetProductById($id);
            // lấy danh sách danh mục sản phẩm
            $category = json_decode($this->categorymodel->GetCategory(),true);
            $notifi = [];
            if(isset($_POST["submit"])){
                $editproduct = $_POST["product"];
                if($_FILES["img"]["name"] == ""){
                    $notifi ["img"] = "Vui Lòng Chọn Ảnh Sản Phẩm";
                }else{
                    $img_product = $_FILES["img"]["name"];
                    $checkUpLoad = UpLoadFiles(urlFileProduct,$_FILES);
                    if($checkUpLoad != 1){
                        $notifi["img"] = $checkUpLoad["exits"];
                    }
                }
                // kiểm tra lỗi
                if($notifi == null){
                    //lấy tên danh mục sản phẩm mà người quản trị chọn để lưu vào name_category
                    $temp = $this->categorymodel->GetCategoryId($editproduct["id_category"]);
                    $name_category = json_decode($temp,true);
                    $result = $this->productmodel->UpdateProductById($id,$editproduct["name"],$editproduct["price"],$img_product,$editproduct["quantity"],$editproduct["decs"],$editproduct["company"],$editproduct["id_category"],$name_category[0]["name"]);
                    if($result != null){
                        notification("success","Sửa Sản Phẩm Thành Công","","","false","");
                        header('Refresh: 1; URL='.base.'admin/showproduct');
                    }
                }
            }

            $data = [
                "folder"=>"product",
                "file"  =>"editproduct",
                "title" =>"Sửa Sản Phẩm",
                "product"=>$product,
                "category"=>$category,
                "notifi"=>$notifi,
                "page"  =>$page
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        //Hiển thị slider
        function showslider(){
            if(isset($_SESSION["DeleteSlider"])){
                $mess = $_SESSION["DeleteSlider"];
                unset($_SESSION["DeleteSlider"]);
            }else $mess="";
            $sliders = $this->slider->ShowSlider();
            $data = [
                "folder"=>"slider",
                "file"  =>"showslider",
                "title" =>"Quản Lí Slider",
                "mess"  =>$mess,
                "slider"=>$sliders
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        
        //Thêm mới slider
        function addslider(){
            $mess = "";
            if( isset($_POST['submit']) ){
                $slider = $_POST["slider"];
                $result = $this->slider->AddSlider($slider["name"],$slider["img"]);
                if($result != null){
                    $mess = "Thêm Slider Thành Công!";
                }else $mess = "Thêm Slider Thất Bại!";
            }
            $data = [
                "folder"=>"slider",
                "file"  =>"addslider",
                "title" =>"Thêm Mới Slider",
                "mess"  =>$mess
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        
        //Xóa slider
        function deleteslider($id){
            $result = $this->slider->DeleteSlider($id);
            if($result){
                $_SESSION["DeleteSlider"] = "Xóa Slider Thành Công!";
                header("location:".base."admin/showslider");
            }
        }
        
        //Trạng thái slider
        function statusslider(){
            $id = $_GET['id'];
            $status = $_GET['status'];
            $this->slider->statusslider($id,$status);
            header("location:".base."admin/showslider");
        }

        //Quản lí tài khoản người dùng
        function useraccount(){
            //lấy số trang mà người dùng chọn
            if(!isset($_GET['page']) || $_GET['page'] < 1){
                $currentpage = 1;
            }else $currentpage =  $_GET['page'];
            $limit = 6;
            $offset = ($currentpage-1)*$limit;
            $listaccount = $this->accadminmodel->GetAllUser($limit,$offset);
            $numberaccount = $this->accadminmodel->GetNumberUser();
            $totalpage = ceil($numberaccount/$limit);
            $data = [
                "folder"=>"useraccount",
                "file"  =>"useraccount",
                "title" =>"Quản Lí Tài Khoản Người Dùng",
                "listaccount"=>$listaccount,
                "currentpage"=>$currentpage,
                "totalpage"=>$totalpage
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        
        //Xử Lý mở hoặc khóa tài khoản người dùng
        function statusaccountuser(){
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else $page = 1;
            $id = $_GET['id'];
            $status = $_GET['status'];
            $this->accadminmodel->StatusAccountUser($id,$status);
            header("location:".base."admin/useraccount&page=".$page."");
        }

        //Quản lí đơn hàng
        function order(){
            //lấy số trang mà người dùng chọn
            if(!isset($_GET['page']) || $_GET['page'] < 1){
                $currentpage = 1;
            }else $currentpage =  $_GET['page'];
            //lấy ra số lượng sản phẩm để phân trang
            $numberorder = $this->ordermodel->GetNumberOrder();
            $limit =  6;
            $totalpage = ceil($numberorder / 6);
            $offset = ($currentpage - 1) * 6;
            //lấy ra sản phẩm theo số trang mà người dùng chọn
            $listorder = $this->ordermodel->GetAllOrder($limit,$offset);
            $data = [
                "folder"=>"order",
                "file"  =>"order",
                "title" =>"Quản Lí Đơn Hàng",
                "listorder"=>$listorder,
                "currentpage"=>$currentpage,
                "totalpage"=>$totalpage
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        //Chi tiết đơn hàng
        function orderdetails(){
            $mess ="";
            $id_user = $_GET["id_user"];
            $id_order = $_GET["id_order"];
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else{
                $page = 1;
            }
            //lấy thông tin trạng thái đơn hàng
            $status = $this->ordermodel->GetStatusOrder($id_order);
            //lấy thông tin chi tiết đơn hàng
            $order_details = $this->ordermodel->GetOrderDetails($id_order);
            // lấy thông tin người dùng
            $info_user = $this->ordermodel->GetInfoUserById($id_user); 
            //xử lý khi người dùng bấm nút thanh toán
            if(isset($_POST["submit"])){
                //hàm xử lý đơn hàng
                $this->ordermodel->orderprocessing($id_order);
                notification("success","Thành Công","Đơn hàng đã được xử lý","","false","#3085d6");
                header('Refresh: 1; URL='.base.'admin/orderdetails&id_order='.$id_order.'&id_user='.$id_user.'&page='.$page.'');
            }
            $data = [
                "folder"=>"order",
                "file"  =>"orderdetails",
                "title" =>"Quản Lí Đơn Hàng",
                "mess"  =>$mess,
                "infouser"=>$info_user,
                "orderdetails"=>$order_details,
                "idorder" => $id_order,
                "page"=>$page,
                "statusorder"=>$status[0]["status"]
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
    }
?>