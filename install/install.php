<?php
$config = include  '../config.php' ;
if ($config['installed'] == "sudah") {
	die("KNTLCMS sudah terinstall . Tolong hapus folder ini demi keamanan website "); 
} else {
if ($config['reg_kode'] == md5($config['reg_nama'] . "KNTL69!")) {
	
} else {
	die("Silahkan Lakukan registrasi terlebih dahulu di NAMA_WEBSITE/install . jika sudah mengisi registrasi tapi muncul tulisan ini berarti pastikan file config.php sudah di chmod kan ke 766");
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
$config['servername']= $_POST['servername'];
$config['username']= $_POST['username'];
$config['password'] = $_POST['password'];
$config['dbname']= $_POST['dbname'];
 $admin_name = $_POST['admin_name'];
	 $admin_pass = md5("KNTLCMS" . md5(md5(md5($_POST['admin_pass']))));
$sqlx = "INSERT INTO user (username,password)
VALUES ('$admin_name' , '$admin_pass')";
$conn = new mysqli($_POST['servername'], $_POST['username'], $_POST['password'], $_POST['dbname']);
// Check connection
if($conn->connect_error) {
    die("Koneksi MySQL gagal . pastikan konfigurasi mysql benar" . $conn->connect_error);
} else { 

	file_put_contents('../config.php', '<?php return ' . var_export($config, true) . ';');
	sleep(5);
	$sql = " CREATE TABLE `counter` ( `counter` INT( 20 ) NOT NULL );
 INSERT INTO counter VALUES (0); ";
		$sql2 = "CREATE TABLE `entri` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `image_default` tinyint(1) NOT NULL,
  `image_url` text NOT NULL,
  `view` int(11) NOT NULL
) ;";
		$sql3 = "CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ";
		$sql4 = "ALTER TABLE `entri`
  ADD PRIMARY KEY (`id`);";
		$sql5 = "ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);";
		$sql6 = "ALTER TABLE `entri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
";
		$sql7 = "ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";

if  ($conn->query($sql) === TRUE AND $conn->query($sql2) === TRUE  AND $conn->query($sql3) === TRUE AND $conn->query($sql4) === TRUE AND $conn->query($sql5) === TRUE AND $conn->query($sql6) === TRUE AND $conn->query($sql7) === TRUE AND $conn->query($sqlx) === TRUE ) {
  header('Location: finish.php');
} else {
   die("Terjadi Error saat membuat tabel . pastikan user yang anda berikan memiliki pemission full terhadap database tersebut" . $conn->error);
}

	
	
}
	
}}
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Instalasi KNTLCMS</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">KNTLCMS Installer</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Instalasi KNTLCMS</h1>
        <p class="lead">Silahkan masukan detail konfigurasi database MySQL anda</p>
      </div>
	
<form class="form-horizontal" action="install.php" method="POST">
<fieldset>
<div class="alert alert-<?php echo $notice_type ?>" role="alert" style="<?php echo notice_display ?>">
		<strong><?php echo $notice_bold ?></strong> <?php echo $notice ?></div>
<!-- Form Name -->
	<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="servername">Lokasi Server MySQL</label>  
  <div class="col-md-4">
  <input id="servername" name="servername" placeholder="localhost" class="form-control input-md" required="" type="text">
  <span class="help-block">Isi lokasi server mysql anda . isi localhost kecuali jika anda menghost server mysql di tempat lain (beda server) </span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username MySQL</label>  
  <div class="col-md-4">
  <input id="username" name="username" placeholder="kntlcms" class="form-control input-md" required="" type="text">
  <span class="help-block">Masukan username MySQL yang memiliki akses penuh kedalam database yang ingin anda gunakan (tidak harus root)</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password MySQL</label>
  <div class="col-md-4">
    <input id="password" name="password" placeholder="passw0rd" class="form-control input-md" required="" type="password">
    <span class="help-block">Masukan password username MySQL anda diatas</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dbname">Nama Database MySQL</label>  
  <div class="col-md-4">
  <input id="dbname" name="dbname" placeholder="kntlcms" class="form-control input-md" required="" type="text">
  <span class="help-block">masukan nama database yang ingin digunakan untuk KNTLCMS . pastikan username yang anda masukan sebelumnya memiliki akses penuh ke database tersebut</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="admin_name">Username Admin KNTLCMS</label>  
  <div class="col-md-4">
  <input id="admin_name" name="admin_name" placeholder="Garok" class="form-control input-md" required="" type="text">
  <span class="help-block">masukan username admin yang anda inginkan untuk mengatur instalasi KNTLCMS anda . jangan sampai lupa !</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="admin_pass">Password Admin KNTLCMS</label>
  <div class="col-md-4">
    <input id="admin_pass" name="admin_pass" placeholder="passw0rd" class="form-control input-md" required="" type="password">
    <span class="help-block">Masukan password admin yang anda inginkan  buatlah password yang kuat agar tidak gampang di hack oleh hacker hacker nakal jaman now</span>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" type="submit" class="btn btn-primary">Submit &gt;</button>
  </div>
</div>
</fieldset>
</form>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>

