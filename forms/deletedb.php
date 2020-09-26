<?php
// 데이터베이스 연결
$db = new PDO('mysql:host=localhost; dbname=ittcporfolio; charset=utf8', 'david', 'zxcv1234');
$rows = $db->query("SELECT * FROM portfolio")->fetchAll();
// print_r($rows);
// exit;
// 변수 설정
$no = $_POST["no"];
// 데이터 쓰기 
    $sql = "DELETE FROM portfolio WHERE no = $no";
    // $sql2 = "DELETE FROM images WHERE image_name='{$imageName}'";

  if ($db->query($sql)) { // 쿼리문 실행
    echo "<h3>{$_POST["no"]}가 지워졌습니다.</h3>"; // 쿼리문이 정상적으로 실행되면  이동
    
  } else {
    print_r($db->errorInfo());    // 쿼리문에 문제가 있으면 에러 출력
  }
  
  $file_to_delete = "../assets/img/portfolio/".$imageName;
  
  if (is_file($file_to_delete)){
    unlink($file_to_delete);
    echo "<h3>{$imageName}가 지워졌습니다.</h3>";
  }
?>