<?php

    class logout extends controller{
        var $commonmodel;
        var $tableAdmin = "admin_account";
        function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
        }

        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }
        //đăng nhập admin
        function admin(){
            setcookie("user","",time()-1,"/");
            header("location:".base."login/admin");
        }

        function logout(){
            unset($_SESSION["info"]);
            unset($_SESSION["cart"]);
            header("location:".base."home/index");
        }
    }

?>