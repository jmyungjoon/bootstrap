<?php
// 데이터베이스 연결
// include_once ("./forms/contactDB.php");
$db = new PDO('mysql:host=localhost; dbname=ittcportfolio; charset=utf8', 'david', 'zxcv1234');
$rows = $db->query("SELECT * FROM portfolio")->fetchAll();

// 사진 업로드
echo $_FILES["upload_file"]["name"];
// exit;
if($_FILES["upload_file"]["name"] != ''){
    
    $data = explode(".", $_FILES["upload_file"]["name"]);
echo $data[1];
// exit;
    $extension = $data[1];
    $allowed_extension = array("jpg", "png", "gif");
    if(in_array($extension, $allowed_extension)) {
        $new_file_name = $data[0] . '.' . $extension;
        echo $new_file_name;
        // exit;
        $path = '../assets/img/portfolio/' . $new_file_name;
        echo $path;
        // exit;
        if(move_uploaded_file($_FILES["upload_file"]["tmp_name"], $path)) {
            echo 'Image Uploaded';
        } else {
            echo 'There is some error';
        }
    } else {
        echo 'Invalid Image File';
    }
} else {
    echo 'Please Select Image';
}

// 데이터 쓰기 
$sql = "
    INSERT INTO portfolio SET
    creator = '{$_POST["creator"]}',  # 작성자
    image = '{$new_file_name}',  # 사진
    apptype = '{$_POST["apptype"]}',    # 앱종류
    webname = '{$_POST["webname"]}',    # 웹이름
    url = '{$_POST["url"]}',    # 주소
    date = now();                 # 작성일
  ";
  if ($db->query($sql)) { // 쿼리문 실행
    echo "요청이 보내 졌습니다. 감사합니다. "; // 쿼리문이 정상적으로 실행되면  이동
    // header("Location: " . $_SERVER["HTTP_REFERER"]);
  } else {
    print_r($db->errorInfo());    // 쿼리문에 문제가 있으면 에러 출력
  }

  
?>