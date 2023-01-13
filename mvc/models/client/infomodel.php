<?php
    class infomodel extends database{
        //thay đổi thông tin người dùng
        function ChangerInfo($id, $name, $email, $address,$phone){
            $sql = "UPDATE user_account SET phone_number = '$phone', address_user = '$address', name = '$name' where id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        //lấy thông tin người dùng theo id
        function GetInfoUser($id){
            $sql = "SELECT * FROM user_account where id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //đổi mật khẩu người dùng
        function ChangerPassUser($id, $pass){
            $sql = "UPDATE user_account SET pass_word = '$pass' where id = $id ";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
    }
?>