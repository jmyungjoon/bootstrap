<?php 
$db = new PDO('mysql:host=localhost; dbname=ittcportfolio; charset=utf8', 'david', 'zxcv1234');
echo "hello";
$rows = $db->query("SELECT * FROM portfolio WHERE no=".$_GET['no'])->fetchAll();
echo $rows;
$no=$_GET['no'];

?>

<!DOCTYPE html>
<html lang="ko">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Page</title>

  <!-- Custom fonts for this template -->
  <link href="./assets/css/all.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="./assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  
</head>

<body id="page-top">



<!-- Bootstrap core JavaScript-->
<script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./assets/js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="./assets/js/jquery.dataTables.min.js"></script>
  <script src="./assets/js/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="./assets/js/datatables-demo.js"></script>  
</body>

</html>
<div id="up_date_Modal" class="modal fade">
    <div class="modal-dialog" style="color:black">
      <div class="text-left modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Member</h4>
            <button type="button" onclick="goBack()" class="close" data-dismiss="modal">&times;</button>
          </div>
                
          <div class="modal-body">
            <form method="post" id="update_form" enctype='multipart/form-data'>
              <label>Enter Creator</label>
              <input type="hidden" name="no" value="<?php echo $no?>">
              <input type="text" name="creator" id="creator" value="<?php echo $rows[0]['creator'] ?>" class="form-control" />
              <br />
              <label>Enter Image</label>
              <input type="text" name="image" id="image" value="<?php echo $rows[0]['image'] ?>" class="form-control"/>
              <br />
              <label>Enter Apptype</label>
              <input type="text" name="apptype" id="apptype" value="<?php echo $rows[0]['image'] ?>" class="form-control" />
              <br />  
              <label>Enter Webname</label>
              <input type="text" name="webname" id="webname" value="<?php echo $rows[0]['webname'] ?>" class="form-control"  />
              <br />
              <label>Enter Url</label>
              <input type="text" name="url" id="url" value="<?php echo $rows[0]['url'] ?>" class="form-control" />
              <br />
              <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-success" />
            </form>
          </div>
            <div class="modal-footer">
              <button type="button" onclick="goBack()" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
      </div>
    </div>
  </div>
  <script>
  $("#up_date_Modal").modal('show');

  $('#update_form').on("submit", function(event){  
            event.preventDefault();  
            let a = confirm("Are you sure?");
            if (a === true) {
              $.ajax({  
                url:"updatedb.php",  
                method:"POST",  
                data:$('#update_form').serialize(),  
                success:function(data){  
                    $('#update_form')[0].reset();  
                    location.replace("./portfolio.html");
                }  
              }); 
            } else {
                  location.replace("./portfolio.html");
            }
  });

  function goBack() {
    location.replace("./portfolio.html");
  }
  
</script>