<?php
$notice_display = "display:none";
$config = include  '../config.php' ;
if ($config['installed'] == "sudah") {
	die("KNTLCMS sudah terinstall . Tolong hapus folder ini demi keamanan website "); 
} else {
if ($config['reg_kode'] == md5($config['reg_nama'] . "KNTL69!")) {
	header('Location: install.php');}
if ($_POST['reg_kode'] == md5($_POST['reg_nama'] . "KNTL69!")) {
	$config['reg_kode'] = $_POST['reg_kode'];
	$config['reg_nama'] = $_POST['reg_nama'] ;
	file_put_contents('../config.php', '<?php return ' . var_export($config, true) . ';');
	sleep(5);
	header('Location: install.php');
} else {
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$notice_display = "";
	        $notice_type = "danger";
	        $notice_bold = "Terjadi Kesalahan!  ";
            $notice = "nama atau kode registrasi salah . mohon cek kembali ";
	}
	
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
        <p class="lead">Selamat datang di instalasi KNTLCMS . untuk memulai instalasi silahkan masukan lisensi KNTLCMS anda</p>
      </div>
		<div class="well">
			<b>Hal yang harus diperhatikan sebelum menginstall KNTLCMS</b>
			<br>
			1.Berdoa kepada tuhannya masing masing
			<br>
			2.Jangan lupa chmod file config.php menjadi 766 (demi keamanan jangan 777)
			<br>
			3.KNTLCMS ini masih versi beta . jadi tolong laporkan bug ke creatornya
			<br>
			4.Dilarang mendistribusikan KNTLCMS tanpa izin apalagi versi nulled nya
			<br>
			5.Script ini hanya pernah dites dan di desain untuk di php 7.0 keatas . jika anda memakai php 5.6 kebawah kami tidak tanggung jawab
			<br>
			6.Perhatikan besar kecilnya huruf saat registrasi . karena form ini case sensitive
			<br>
			7.Dan yang terakhir jangan lupa bahagia
			</div>
<form class="form-horizontal" action="index.php" method="POST">
<fieldset>
<div class="alert alert-<?php echo $notice_type ?>" role="alert" style="<?php echo notice_display ?>">
		<strong><?php echo $notice_bold ?></strong> <?php echo $notice ?></div>
<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="reg_nama">Nama</label>  
  <div class="col-md-4">
  <input id="reg_nama" name="reg_nama" placeholder="Garok" class="form-control input-md" required="" type="text">
  <span class="help-block">Masukan nama yang anda gunakan untuk membeli KNTLCMS</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="reg_kode">Kode Registrasi</label>  
  <div class="col-md-4">
  <input id="reg_kode" name="reg_kode" placeholder="12345678901234567890123456789012" class="form-control input-md" type="text">
  <span class="help-block">Masukan kode registrasi yang anda dapatkan . pastikan cocok dengan namanya</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Lanjut &gt;</button>
  </div>
</div>

</fieldset>
</form>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>