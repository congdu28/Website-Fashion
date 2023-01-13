<?php

    class sigin extends controller{
        var $usermodel;
        var $commonmodel;
        function __construct()
        {
            $this->usermodel = $this->ModelClient("usermodel");
            $this->commonmodel = $this->ModelCommon("commonmodel");
        }

        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }
        
        function sigin(){
            if(!isset($_SESSION["info"])){
                $mess = "";
                if(isset($_POST["sigin"])){
                    $post = $_POST["data"];
                    if($post["pass"] == $post["pass_confirm"]){
                        $checkuser = $this->commonmodel->checkemail($post["email"]);
                        if($checkuser < 1){
                            $user = $this->commonmodel->sigin($post["email"],md5($post["pass"]),$post["name"],$post["address"],$post["phonenumber"]);
                            if($user){
                                NotifiSiginSuccess();
                            }
                        }else{
                            $mess = "<p style='color: red;'>Email này đã có người khác sử dụng</p>";
                        }
                    }else{
                        $mess = "<p style='color: red;'>Xác nhận mật khẩu không khớp</p>";
                    }
                }
                $data = ["mess"=>$mess];
                $this->ViewClinet("sigin",$data);
            }else header("location:".base."home/index");
        }

    }
?>