<?php

    class login extends controller{
        var $commonmodel;
        var $tableAdmin = "admin_account";
        var $accountmodel;
        function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->accountmodel = $this->ModelAdmin("accountmodel");
        }

        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }
        //đăng nhập admin
        function admin(){
            // if($this->Mymodel->BackLogin() == true){
            //     header("location:".base."category/index");
            // }
            $data = [];
            $data = ["user"=>"","pass"=>""];
            if(isset($_POST['login'])){
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            $data = ["user"=>$user,"pass"=>$pass];
            $result = $this->commonmodel->Login($user,md5($pass),$this->tableAdmin);
            if($result >= 1 ){
                $cookie = randomcookie(200);
                setcookie("user",$cookie,time()+3600,"/");
                $this->commonmodel->AddCookie($user,$cookie,$this->tableAdmin);
                notification("success","Đăng Nhập Thành Công","","","false","");
                header('Refresh: 1; URL='.base.'admin/home');
            }else{
                notification("error","Đăng Nhập Thất Bại","Thông tin tài khoản hoặc mật khẩu không chính xác!","Đăng Nhập Lại","true","#3085d6");
            }
            }
            
            $this->ViewAdmin("login",$data);
        }
        //đăng nhập khách hàng
        function login(){
            if(!isset($_SESSION["info"])){
                $mess = "";
                $email = "";
                $pass = "";
                if(isset($_POST["login"])){
                    $email = $_POST["email"];
                    $pass = $_POST["password"];
                    $check_block_user = $this->accountmodel->CheckBlockUser($email);
                    if($check_block_user == 0){
                        $check = $this->accountmodel->LoginUser($email,md5($pass),"user_account");
                        if($check >=1){
                            $name = $this->accountmodel->GetNameUser($email,md5($pass));
                            $_SESSION["info"]["id"]= $name[0]["id"];
                            $_SESSION["info"]["name"] = $name[0]["name"];
                            $_SESSION["info"]["phone"] = $name[0]["phone_number"];
                            $_SESSION["info"]["address"] = $name[0]["address_user"];
                            $_SESSION["info"]["email"] = $name[0]["email_account"];
                            notification("success","Đăng Nhập Thành Công","","","false","");
                            header('Refresh: 1; URL='.base.'home/index');
                        }else{
                            notification("error","Đăng Nhập Thất Bại","Thông tin tài khoản hoặc mật khẩu không chính xác","OK","true","#3085d6");
                        }
                    }else{
                        notification("error","Đăng Nhập Thất Bại","Tài khoản của bạn đã bị khóa vui lòng liên hệ quản trị viên để được mở khóa","OK","true","#3085d6");
                        // $mess = "Tài khoản của bạn đã bị khóa vui lòng liên hệ quản trị viên để được mở";
                    }
                }
                $data = [
                    "mess"=>$mess,
                    "email"=>$email,
                    "pass"=>$pass
                
                ];
                $this->ViewClinet("login",$data);
            }else header("location:".base."home/index");
        }
    }

?>