<?php
$config = include 'config.php';
    $gambar = $config['gambar_default'];
$get = $_SERVER['REQUEST_URI'];
$get = explode("/", $get);
if (count($get)< 3) { //klo di hosting ganti 2
	$user = $_GET['nama'];
$user = str_replace("/","",$user);
$user = htmlspecialchars($user, ENT_QUOTES, 'UTF-8');

} else {
$user = $get[2]; //klo di hosting ganti 1
$user = str_replace("/","",$user);
$user = htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
}
if ($config['installed'] == "sudah") {
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
// Check connection
if ($conn->connect_error) {
    die("Gagal terkoneksi ke server MySQL " . $conn->connect_error);
}
$user = $conn->escape_string($user);
if (strpos($user, "<") !== false) {
	die("GAK USAH XSS ANJING"); }
elseif (strpos($user, ">") !== false) {
	die("GAK USAH XSS ANJING");
} else {

//Fitur USER belum diuji dan belum tentu kompatibel dengan hosting anda . lebih baik pakai VPS untuk kompatibilitas
// Create connection


$sql = "SELECT * FROM entri ORDER BY RAND() LIMIT 0,1;";
$result = $conn->query($sql);
$sqlq = "UPDATE counter SET counter = counter + 1";
$resultq = $conn->query($sqlq);


	if ($config['reg_kode'] == md5($config['reg_nama'] . "KNTL69!") ){
		If ($config['web_mode'] == "acak") {
			$display = $config['prefix_acak'] . " " . rand($config['acak_range_start'],$config['acak_range_end']) . " " . $config['sufix_acak'] ;
		} else {
		
		if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $display = $config['prefix_entri'] . " " . $row['judul'];
		$kntl = $row['id'];
        $sqlx = "UPDATE entri SET view = view +1 WHERE id=$kntl";
        if ($row['image_default'] == "True" ) {
            $gambar = $config['gambar_default'];
        } else if ($row['image_url'] == "") {
            $gambar = $config['gambar_default'];
        } else {
            $gambar = $row['image_gambar'];
        }
		

$resultx = $conn->query($sqlx);
    }
} else {
    $display =  "Tidak ada entri";
}}
	
	}
		else {
			$display =  "<h1>WARNING! . KNTLCMS Bajakan terdeteksi! harap masukan kode authentikasi yang benar!</h1>";
	}



If ( $config['baon'] == "kontol") {
	$baon =  "<audio controls autoplay style=" . '"'.  "display:none" . '"'.  ">
  <source src=" . '"'.  "http://kontolerz.byethost6.com/baon.ogg" . '"'.  " type=" . '"'.  "audio/ogg" . '"'.  ">
  <source src=" . '"'.  "http://kontolerz.byethost6.com/baon.mp3" . '"'.  " type=" . '"'.  "audio/mpeg" . '"'.  ">
  Browser kamu tidak support elemen audio . upgrade browsermu!
</audio> ";
} else {
	$baon = "";
}
if ($config['prefix_nama'] == "ada") {
			$display = $_GET['nama'] . " " . $display ;
		}
	
} 
	
} else {
	header('Location: install/index.php'); }
$slogan = $user . " " . $config['desc_website'] ;
$conn->close();

?> 

<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
	<!-- SEO FACEBOOK . JANGAN DIHAPUS NGENTOD -->
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?php echo $display ?>" />
<meta property="og:description"        content="<?php echo $slogan ?>"/>
<meta property="og:image"              content="<?php echo $config["gambar_default"] ?>" />


    <title><?php echo $display ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $config['bootstrap_theme'] ?>" rel="stylesheet">
<link rel="icon" type="image/png" href="favicon.ico">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3//assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="https://getbootstrap.com/docs/3.3//assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/docs/3.3//assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]> $config['prefix_acak'] = $_POST['nomor_acak'];
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	  <?php echo $baon ?>
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $config['nama_website'] ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="https://www.facebook.com/mgfakhri">Created By : humanpuff69</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
		  <br>
		  <center><img src="<?php echo $gambar ?>"><img><center>
        <h1><?php
	echo $display;
?>
			  </h1>
			  <p class="lead"><b><?php echo $user ?></b> <?php echo $config['desc_website'] ?></p>
      </div>

    </div><!-- /.container -->
		

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/3.3//assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/3.3//dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3//assets/js/ie10-viewport-bug-workaround.js"></script>

Powered by KNTLCMS <!-- awas kalau lu hapus ngentod . gw cape cape buat cms dari PHP (pemberii harapan palsu) malah gak dihargain yoga! --> 
</body></html>
