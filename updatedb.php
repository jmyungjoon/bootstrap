<?php
$db = new PDO('mysql:host=localhost; dbname=ittcporfolio; charset=utf8', 'david', 'zxcv1234');

// $rows = $db->query("SELECT * FROM portfolio WHERE no=".$_GET['no'])->fetchAll();

$no=$_POST['no'];
$creator = $_POST['creator'];  
$image = $_POST['image'];  
$apptype = $_POST['apptype'];  
$webname = $_POST['webname'];
$url = $_POST['url'];
$sql = "UPDATE portfolio SET creator='$creator', image='$image', apptype='$apptype', webname='$webname', url='$url', date=now() WHERE no=$no;";
if($db->query($sql)) { 
  echo "변경 되었습니다.";
} else {
  print_r($db->errorInfo());    // 쿼리문에 문제가 있으면 에러 출력
}
?>