<?php
  include('session.php');
$config = include 'config.php';

$notice_display = "display:none";
if (strpos($_POST['judul'], "'") !== false OR strpos($_POST['judul'], "RLIKE") !== false  OR strpos($_POST['judul'], "SELECT") !== false OR strpos($_POST['judul'], "EXTRACTVALUE") !== false OR strpos($_POST['judul'], "AND") !== false OR strpos($_POST['judul'], "THEN") !== false OR strpos($_POST['judul'], "BENCHMARK") !== false  OR strpos($_POST['judul'], "iframe") !== false OR strpos($_POST['judul'], "<") !== false OR strpos($_POST['judul'], ">") !== false ){
    die("GAK USAH NGEDEFACE ANJING!");
	
}
if (strpos($_POST['image_url'], "'") !== false OR strpos($_POST['image_url'], "RLIKE") !== false  OR strpos($_POST['image_url'], "SELECT") !== false OR strpos($_POST['image_url'], "EXTRACTVALUE") !== false OR strpos($_POST['image_url'], "AND") !== false OR strpos($_POST['image_url'], "THEN") !== false OR strpos($_POST['image_url'], "BENCHMARK") !== false OR strpos($_POST['image_url'], "iframe") !== false  OR strpos($_POST['image_url'], "<") !== false OR strpos($_POST['image_url'], ">") !== false ) {
    die("GAK USAH NGEDEFACE ANJING!");
	
}
if (strpos($_POST['image_default'], "'") !== false OR strpos($_POST['image_default'], "RLIKE") !== false  OR strpos($_POST['image_default'], "SELECT") !== false OR strpos($_POST['image_default'], "EXTRACTVALUE") !== false OR strpos($_POST['image_default'], "AND") !== false OR strpos($_POST['image_default'], "THEN") !== false OR strpos($_POST['image_default'], "BENCHMARK") !== false OR strpos($_POST['image_default'], "iframe") !== false  OR strpos($_POST['image_default'], "<") !== false OR strpos($_POST['image_default'], ">") !== false ) {
    die("GAK USAH NGEDEFACE ANJING!");
	
}
// Create connection
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$imgdft = $_POST['image_default'];
$judul = $_POST['judul'];
$image_url = $_POST['image_url'];
 $imgdft = $conn->escape_string($imgdft);
 $judul = $conn->escape_string($judul);
 $image_url = $conn->escape_string($image_url);
$sql = "INSERT INTO entri (judul , image_default , image_url , view)
VALUES ('$judul' , $imgdft, '$image_url' , '0')";
  if(!isset($_SESSION['login_user']) && !isset($_SESSION['user_hash'])){
      header("location:login.php");
   }else {
If ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['judul']=="") {
	$notice_display = "";
	$notice_type = "danger";
	$notice_bold = "Terjadi Kesalahan ";
	$notice = "Tolong masukan judul entri";
} else {
	if ($_POST['image_default']==="True") {
	if ($conn->query($sql) === TRUE) {
	$notice_display = "";
	$notice_type = "success";
	$notice_bold = "Sukses!  ";
    $notice = "Entri baru telah ditambahkan!";
    } else {
	$notice_display = "";
	$notice_type = "danger";
	$notice_bold = "Terjadi Kesalahan ";
    $notice = "Maaf . Mengalami kesalahan saat membuat entri baru Error: " . $sql . "<br>" . $conn->error;
    }
 } else if ($_POST['image_default']==="False") {
		if ($_POST['image_url']==""){
				$notice_display = "";
	$notice_type = "danger";
	$notice_bold = "Terjadi Kesalahan ";
			$notice = "Mohon masukan URL Gambar";
		} else {
			if ($conn->query($sql) === TRUE) {
					$notice_display = "";
	$notice_type = "success";
	$notice_bold = "Sukses!  ";
    $notice = "Entri baru telah ditambahkan!";

    } else {
					$notice_display = "";
	$notice_type = "danger";
	$notice_bold = "Terjadi Kesalahan ";
    $notice = "Maaf . Mengalami kesalahan saat membuat entri baru Error: " . $sql . "<br>" . $conn->error;
    }
	}
	
}}}
$conn->close();

?> 
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">

    <title>KNTLCMS Administrator</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/dashboard/dashboard.css" rel="stylesheet">

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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin.php">KNTLCMS Administrator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="admin.php">Dashboard</a></li>
            <li class="active"><a href="#">Tambah Entri</a></li>
            <li><a href="daftar_entri.php">Daftar Entri</a></li>
            <li><a href="setting.php">Setting</a></li>
			<li><a href="logout.php">Logout</a></li>
			<li><a href="http://fb.com/mgfakhri">Created By : humanpuff69</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="alert alert-<?php echo $notice_type ?>" role="alert" style="<?php echo notice_display ?>">
        <strong><?php echo $notice_bold ?></strong> <?php echo $notice ?>
      </div>
        <div class="">
          <h1 class="page-header">Tambah Entri</h1>

          

          
          
        <div class="table-responsive" style="padding-left:3px;padding-right:3px;border:0px">
  <form method="POST" action="tambah_entri.php" class="form-horizontal">


<!-- Form Name -->


<!-- Text input-->
<div class="form-group">
  <label for="judul" class="col-md-4 control-label">Masukan Judul Entri</label>  
  <div class="col-md-6">
  <input id="judul" name="judul" placeholder="Menggencangkan! Berita ini ternyata hanya clickbait . no 69 bikin kaget" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="image_default">Gunakan Gambar Default</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="image_default-0">
      <input name="image_default" id="image_default-0" value="True" checked="checked" type="radio">
      Ya (Memakai Gambar <?php echo $config['gambar_default'] ?>)
    </label>
	</div>
  <div class="radio">
    <label for="image_default-1">
      <input name="image_default" id="image_default-1" value="False" type="radio">
      Tidak
    </label>
	</div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="image_url">URL Gambar</label>  
  <div class="col-md-6">
  <input id="image_url" name="image_url" placeholder="http://imgur.com/xxxx" class="form-control input-md" type="text">
  <span class="help-block">Hanya diisi jika tidak menggunakan gambar default</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
    <button id="Submit" name="Submit" class="btn btn-success">Buat Entri Baru</button>
  </div>
</div>


</form>
            
          </div></div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/3.3/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>