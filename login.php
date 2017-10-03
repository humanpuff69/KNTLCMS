<?php
   include("config.php");
$config = include "config.php";
   session_start();
   $notice_display="display:none";
$notice_type = "danger";
	$notice_bold = "Terjadi Kesalahan ";
	
         $notice = "Username atau password salah! silahkan coba lagi";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	 
    $db = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);  
      $myusername = $_POST['username'];
      $mypassword = $_POST['password'];
	    $myusername = $db->escape_string($myusername);
	    $mypassword = $db->escape_string($mypassword);
	   $hashedpass = md5("KNTLCMS" . md5(md5(md5($mypassword))));
      if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
      $sql = "SELECT id FROM user WHERE username = '$myusername' and password = '$hashedpass'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        
         $_SESSION['login_user'] = $myusername;
		 $_SESSION['user_hash'] =  md5($mypassword);
         
         header('Location: admin.php');
      }else {
		  $notice_display = "";
	$notice_type = "danger";
	$notice_bold = "Terjadi Kesalahan ";
	
         $notice = "Username atau password salah! silahkan coba lagi";
      }
   }



?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>KNTLCMS Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="https://getbootstrap.com/docs/3.3/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-horizontal" method="POST" action="login.php">
<fieldset>

<!-- Form Name -->
<legend>KNTLCMS Admin Login</legend>
	<div class="alert alert-<?php echo $notice_type ?>" role="alert" style="<?php echo $notice_display ?>">
		<strong><?php echo $notice_bold ?></strong> <?php echo $notice ?></div>
	<div class="well"><strong>Notice For Defacer</strong>
		elu ngejek gw gara2 cms nya bisa di hack . situ bisa buat cms? kok ngehack aja bangga?
	</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username"></label>  
  <div class="col-md-4">
  <input id="username" name="username" placeholder="Username" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password"></label>
  <div class="col-md-4">
    <input id="password" name="password" placeholder="Password" class="form-control input-md" required="" type="password">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Log In</button>
  </div>
</div>

</fieldset>
</form>


    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>