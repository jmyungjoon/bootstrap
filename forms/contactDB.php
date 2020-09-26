<?php 
$db = new PDO('mysql:host=localhost; dbname=ittcportfolio; charset=utf8', 'david', 'zxcv1234');
$rows = $db->query("SELECT * FROM portfolio")->fetchAll(PDO::FETCH_OBJ);
?>