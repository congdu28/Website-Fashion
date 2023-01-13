<?php
    class error404 extends controller{
        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }
    }
?>