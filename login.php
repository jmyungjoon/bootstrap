<?php
$id = $_POST['name'];
$password = $_POST['password'];
if(($id == "admin") && ($password == "admin")) {
    echo Json_encode(array('data'=>true));
    } else {
        echo Json_encode(array('data'=>false));
    };
?>