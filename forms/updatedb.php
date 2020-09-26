<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

    $id = $_POST["id"];  
    $name = $_POST["name2"];  
    $email = $_POST["email2"];  
    $profile = $_POST["profile2"];  
    $password = $_POST["password3"];
    // print_r($id);
    // exit;
    $sql = "UPDATE user SET name='$name', email='$email', profile='$profile', password='$password', date=now() WHERE id=$id;";
    if(mysqli_query($conn, $sql)) { 
      echo "변경 되었습니다.";
    } else {
      print_r($db->errorInfo());    // 쿼리문에 문제가 있으면 에러 출력
    }
?>