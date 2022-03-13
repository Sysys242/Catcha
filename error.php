<?php
$error = htmlspecialchars($_GET["reason"]);

if($error == "alval") {
    echo "<script>alert('Error : The captcha is already completed')</script>";
}


?>