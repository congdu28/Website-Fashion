<?php
    class controller{

        function ModelAdmin($model){
            require_once "./mvc/models/admin/".$model.".php";
            return new $model;
        }

        function ViewAdmin($view, $data = []){
            require_once "./mvc/views/admin/cpanel/".$view.".php";
        }

        function ModelClient($model){
            require_once "./mvc/models/client/".$model.".php";
            return new $model;
        }

        function ViewClinet($view, $data = []){
            require_once "./mvc/views/client/cpanel/".$view.".php";
        }

        function ModelCommon($model){
            require_once "./mvc/models/common/".$model.".php";
            return new $model;
        }
    }
?>