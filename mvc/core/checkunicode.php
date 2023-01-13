<?php
function CheckUnicode($str){
    for($i = 0; $i < strlen($str); $i++){
        if ( ord($str[$i]) != 46 && ord($str[$i]) <48 ||ord($str[$i]) >57 && ord($str[$i]) < 64 || ord($str[$i]) > 90 && ord($str[$i]) <97 || ord($str[$i]) > 122 ){
            return 1;
        }
    }
    return 0;
}
?>