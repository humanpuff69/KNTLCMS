<?php
$config = include 'config.php';
    $gambar = $config['gambar_default'];
$get = $_SERVER['REQUEST_URI'];
$get = explode("/", $get);

	$user = $_GET['nama'];
$user = str_replace("/","",$user);
$user = htmlspecialchars($user, ENT_QUOTES, 'UTF-8');


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
            $gambar = $row['image_url'];
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




if ($config['prefix_nama'] == "ada") {
			$display = $user . " " . $display ;
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
<meta property="og:image"              content="<?php echo $gambar ?>" />


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
	  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	  <a href="https://github.com/humanpuff69/KNTLCMS"><img style="position: absolute; top: 0; right: 0; border: 0 ; z-index: 999999999999;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
	
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
	 
        <div class="navbar-header">
	
          <a class="navbar-brand" href="#"><?php echo $config['nama_website'] ?></a>
        </div>
        
      </div>
    </nav>

	  <div class="container">
		<div class="starter-template">
		  <br>
		  <center><img src="<?php echo $gambar ?>" width="300px" height="300px"><img></center>
        <h1><?php echo $display; ?> </h1>
			  <p class="lead"><b><?php echo $user ?></b> <?php echo $config['desc_website'] ?></p>
			<br>
			<div class="fb-share-button" data-href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F<?php echo $_SERVER['HTTP_HOST'];  ?>%2F&amp;src=sdkpreparse">Bagikan ke teman kamu di facebook</a></div>
		  </div>
		 <hr>
		 <div class="fb-comments" data-href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>" data-numposts="10"></div>
	  </div>
 <!-- /.container -->
		

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/3.3//assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/3.3//dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3//assets/js/ie10-viewport-bug-workaround.js"></script>

<center><h3><span class="label label-success">Powered by <a href="https://github.com/humanpuff69/KNTLCMS/">KNTLCMS</a></span></h3></center><!-- awas kalau lu hapus ngentod . gw cape cape buat cms dari PHP (pemberii harapan palsu) malah gak dihargain yoga! --> 
</body></html>
