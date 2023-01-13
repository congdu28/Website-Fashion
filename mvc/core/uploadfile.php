<?php
    function UpLoadFiles($url,$file = []){
        //tạo đường dẫn khi upload lên sever
        // echo "<pre>";
        // print_r($file);die;
        
            $target_file = $url.basename($file["img"]["name"]);
        //kiểm tra dung lượng của file
        $error =[];
       
            if($file["img"]["size"] > 10242880){
                $error = ["size"=>"file ".$file["img"]["name"]." vượt quá 10MB"];
            }

        //Kiểm tra loại file
        
            $file_type = pathinfo($file["img"]["name"], PATHINFO_EXTENSION);
            $array_file_type = ["jpg","png","jpeg","gif"];
            if(!in_array(strtolower($file_type),$array_file_type)){
                $error = ["file ".$file["img"]["name"]." không đúng định dạng"];
            }
        
        //Kiểm tra đã tồn tại trên sever hay chưa
        
            if(file_exists($target_file)){
                $error = ["exits"=>"file ".$file["img"]["name"]." đã tồn tại trên hệ thống"];
            }
        //upload lên sever
        if(empty($error)){
                if(move_uploaded_file($file["img"]["tmp_name"],$target_file)){
                    $success = true;
                }
        }else{
            return $error;
        }
        return $success;
    }
?>