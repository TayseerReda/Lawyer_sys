<?php
function auth($num1=null,$num2=null){
    if(!isset($_SESSION["admin"])||($_SESSION["admin"]["role"]!=$num1 && $_SESSION["admin"]["role"]!=$num2)){
        header("location:/EXAME/error/error401.php");
    }
}
?>