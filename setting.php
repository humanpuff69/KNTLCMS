<?php
$config = include 'config.php';

  include('session.php');

if (strpos($_POST['nama_website'], "'") !== false OR strpos($_POST['nama_website'], "RLIKE") !== false  OR strpos($_POST['nama_website'], "SELECT") !== false OR strpos($_POST['nama_website'], "EXTRACTVALUE") !== false OR strpos($_POST['nama_website'], "AND") !== false OR strpos($_POST['nama_website'], "THEN") !== false OR strpos($_POST['nama_website'], "BENCHMARK") !== false  OR strpos($_POST['nama_website'], "iframe") !== false OR strpos($_POST['nama_website'], "<") !== false OR strpos($_POST['nama_website'], ">") !== false  OR strpos($_POST['desc_website'], "'") !== false OR strpos($_POST['desc_website'], "RLIKE") !== false  OR strpos($_POST['desc_website'], "SELECT") !== false OR strpos($_POST['desc_website'], "EXTRACTVALUE") !== false OR strpos($_POST['desc_website'], "AND") !== false OR strpos($_POST['desc_website'], "THEN") !== false OR strpos($_POST['desc_website'], "BENCHMARK") !== false  OR strpos($_POST['desc_website'], "iframe") !== false OR strpos($_POST['desc_website'], "<") !== false OR strpos($_POST['desc_website'], ">") !== false OR strpos($_POST['gambar_default'], "'") !== false OR strpos($_POST['gambar_default'], "RLIKE") !== false  OR strpos($_POST['gambar_default'], "SELECT") !== false OR strpos($_POST['gambar_default'], "EXTRACTVALUE") !== false OR strpos($_POST['gambar_default'], "AND") !== false OR strpos($_POST['gambar_default'], "THEN") !== false OR strpos($_POST['gambar_default'], "BENCHMARK") !== false  OR strpos($_POST['gambar_default'], "iframe") !== false OR strpos($_POST['gambar_default'], "<") !== false OR strpos($_POST['gambar_default'], ">") !== false OR strpos($_POST['bootstrap_theme'], "'") !== false OR strpos($_POST['bootstrap_theme'], "RLIKE") !== false  OR strpos($_POST['bootstrap_theme'], "SELECT") !== false OR strpos($_POST['bootstrap_theme'], "EXTRACTVALUE") !== false OR strpos($_POST['bootstrap_theme'], "AND") !== false OR strpos($_POST['bootstrap_theme'], "THEN") !== false OR strpos($_POST['bootstrap_theme'], "BENCHMARK") !== false  OR strpos($_POST['bootstrap_theme'], "iframe") !== false OR strpos($_POST['bootstrap_theme'], "<") !== false OR strpos($_POST['bootstrap_theme'], ">") !== false OR strpos($_POST['web_mode'], "'") !== false OR strpos($_POST['web_mode'], "RLIKE") !== false  OR strpos($_POST['web_mode'], "SELECT") !== false OR strpos($_POST['web_mode'], "EXTRACTVALUE") !== false OR strpos($_POST['web_mode'], "AND") !== false OR strpos($_POST['web_mode'], "THEN") !== false OR strpos($_POST['web_mode'], "BENCHMARK") !== false  OR strpos($_POST['web_mode'], "iframe") !== false OR strpos($_POST['web_mode'], "<") !== false OR strpos($_POST['web_mode'], ">") !== false OR strpos($_POST['prefix_entri'], "'") !== false OR strpos($_POST['prefix_entri'], "RLIKE") !== false  OR strpos($_POST['prefix_entri'], "SELECT") !== false OR strpos($_POST['prefix_entri'], "EXTRACTVALUE") !== false OR strpos($_POST['prefix_entri'], "AND") !== false OR strpos($_POST['prefix_entri'], "THEN") !== false OR strpos($_POST['prefix_entri'], "BENCHMARK") !== false  OR strpos($_POST['prefix_entri'], "iframe") !== false OR strpos($_POST['prefix_entri'], "<") !== false OR strpos($_POST['prefix_entri'], ">") !== false OR strpos($_POST['suffix_na'], "'") !== false OR strpos($_POST['suffix_na'], "RLIKE") !== false  OR strpos($_POST['suffix_na'], "SELECT") !== false OR strpos($_POST['suffix_na'], "EXTRACTVALUE") !== false OR strpos($_POST['suffix_na'], "AND") !== false OR strpos($_POST['suffix_na'], "THEN") !== false OR strpos($_POST['suffix_na'], "BENCHMARK") !== false  OR strpos($_POST['suffix_na'], "iframe") !== false OR strpos($_POST['suffix_na'], "<") !== false OR strpos($_POST['suffix_na'], ">") !== false ){
    die("GAK USAH NGEDEFACE ANJING!");
	} else {
// Create connection
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  id, judul , image_url , view FROM entri ORDER BY id DESC LIMIT 0,10";
//$result = $conn->query($sql);



if($config['web_mode'] == "entri" ) {
	$checked_entri = "checked=" . '"' . "checked" . '"' . "  ";
	$checked_acak = "";
} else {
	$checked_acak = "checked=" . '"' . "checked" . '"' . "  ";
	$checked_entri = "";
}
if($config['baon'] == "kontol" ) {
	$checked_baon_on = "checked=" . '"' . "checked" . '"' . "  ";
	$checked_baon_off= "";
} else {
	$checked_baon_off = "checked=" . '"' . "checked" . '"' . "  ";
	$checked_baon_on = "";
}
if($config['prefix_nama'] == "ada" ) {
	$prefix_nama = "checked=" . '"' . "checked" . '"' . "  ";
	$prefix_namad = "";
} else {
	$prefix_namad = "checked=" . '"' . "checked" . '"' . "  ";
	$prefix_nama = "";
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if($_POST['range_min'] < $_POST['range_max']) {
		$nama_website = $_POST['nama_website'];
		$desc_website = $_POST['desc_website'];
		$gambar_default = $_POST['gambar_default'];
		$bootstrap_theme = $_POST['bootstrap_theme'];
		$web_mode = $_POST['web_mode'];
		$prefix_nama = $_POST['prefix_nama'];
		$prefix_acak = $_POST['nomor_acak'];
		$prefix_entri = $_POST['prefix_entri'];
		$sufix_acak = $_POST['suffix_na'];
		$acak_range_start = $_POST['range_min'];
				$acak_range_end = $_POST['range_max'];
				$baon = $_POST['baon'];
		
		$nama_website = $conn->escape_string($nama_website);
		$desc_website = $conn->escape_string($desc_website);
		$gambar_default = $conn->escape_string($gambar_default);
		$bootstrap_theme = $conn->escape_string($bootstrap_theme);
		$web_mode = $conn->escape_string($web_mode);
		$prefix_nama = $conn->escape_string($prefix_nama);
		$prefix_acak = $conn->escape_string($prefix_acak);
		$prefix_entri = $conn->escape_string($prefix_entri);
		$sufix_acak = $conn->escape_string($sufix_acak);
		$acak_range_start = $conn->escape_string($acak_range_start);
				$acak_range_end = $conn->escape_string($acak_range_end);
				$baon = $conn->escape_string($baon);
		
            $config['nama_website'] = $nama_website;
		    $config['desc_website'] = $desc_website;
	        $config['gambar_default'] = $gambar_default;
	        $config['bootstrap_theme'] = $bootstrap_theme;
	        if($web_mode == 1) {
		        $config['web_mode'] = "entri";
	        } else {
		        $config['web_mode'] = "acak";
	        }
		if($prefix_nama == 1) {
		        $config['prefix_nama'] = "ada";
	        } else {
		        $config['prefix_nama'] = "tydack";
	        }
	        $config['prefix_acak'] = $prefix_acak;
		 $config['prefix_entri'] = $prefix_entri;
	        $config['sufix_acak'] = $sufix_acak;
	        $config['acak_range_start'] = $acak_range_start;
	        $config['acak_range_end'] = $acak_range_end;
	        $config['baon'] = $baon;
file_put_contents('config.php', '<?php return ' . var_export($config, true) . ';');
		sleep(5);
	  $notice_display = "";
	          $notice_type = "success";
	          $notice_bold = "Sukses!  ";
              $notice = "Setting berhasil disimpan!";
} else {
		 $notice_display = "";
	        $notice_type = "danger";
	        $notice_bold = "Terjadi Kesalahan!  ";
            $notice = "Range Minimal tidak boleh lebih besar dari range max";
	}}}
 if (strpos($_SERVER["SERVER_SOFTWARE"], "apache") !== false) { 
$notice_display = "";
	        $notice_type = "warning";
	        $notice_bold = "Perhatian! ";
            $notice = "KNTLCMS berjalan pada server apache / hosting . karena itu fitur site.com/nama tidak akan work . gunakan site.com/?nama=namakamu . untuk memperbaiki error ini silahkan gunakan nginx";
 }
$conn->close();
?> 
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
 
<link rel="icon" type="image/png" href="favicon.ico">
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
            <li ><a href="admin.php">Dashboard</a></li>
            <li><a href="tambah_entri.php">Tambah Entri</a></li>
            <li><a href="daftar_entri.php">Daftar Entri</a></li>
            <li class=active><a href="#">Setting</a></li>
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
        
        <div class="">
          <h1 class="page-header">Setting</h1>

          <div class="">
			  <form class="form-horizontal" method=POST action="setting.php">
<fieldset>

<!-- Form Name -->
	<div class="alert alert-<?php echo $notice_type ?>" role="alert" style="<?php echo notice_display ?>">
		<strong><?php echo $notice_bold ?></strong> <?php echo $notice ?></div>
<div class="well">
	<h3>Informasi Server</h3> 
	
	<b>Software :</b> <?php echo $_SERVER["SERVER_SOFTWARE"] ?>
	<br>
	<b>Alamat Server :</b> <?php echo $_SERVER['SERVER_ADDR'];  ?>
	<br>
	<b>Nama Server :</b> <?php echo $_SERVER['SERVER_NAME'];  ?>
	<br>
	<b>Host HTTP / Alamat Website :</b> <?php echo $_SERVER['HTTP_HOST'];  ?>
	<br>
	<b>Versi PHP (Pemberi Harapan Palsu) :</b> <?php echo  phpversion() ?>
	<br>
	<h3>Informasi KNTLCMS</h3>
	<b>Versi KNTLCMS :</b> Beta 100517
	<br>
	<b>Lisensi :</b> <?php
if($config['reg_kode'] == md5($config['reg_nama'] . "KNTL69!") ){
	echo "KNTLCMS ini sudah terlisensi untuk <b>" . $config['reg_nama'] . "</b> terimakasih sudah membeli KNTLCMS!";
}
		else {
			echo "<b>KNTLCMS ini terdeteksi bajakan . silahkan beli versi aslinya </b>";
	}
			?>
	
	<br>
	<br>
	<strong>Jika Setting tidak tersave / kembali seperti sebelum diubah . jangan lupa chmod file config.php menjadi 766</strong>
	</div>
	
<!-- Text input-->
<div class="form-group" >
  <label class="col-md-4 control-label" for="nama_website">Nama Website</label>  
  <div class="col-md-4">
  <input id="nama_website" name="nama_website" placeholder="Seberapa panjang KNTL mu" class="form-control input-md" required="" type="text" value="<?php echo $config['nama_website'] ?>">
  <span class="help-block">Masukan nama website yang akan di tampilkan</span>  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="desc_website">Deskripsi Website</label>  
  <div class="col-md-4">
  <input id="desc_website" name="desc_website" placeholder=" ini quotes untuk kamu dari kak seto" class="form-control input-md" required="" type="text" value="<?php echo $config['desc_website'] ?>">
  <span class="help-block">masukan deskripsi website . ini akan muncul dibawah quote yang dimunculkan </span>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="gambar_default">Gambar Default</label>  
  <div class="col-md-4">
  <input id="gambar_default" name="gambar_default" placeholder="https://i.imgur.com/qv2t3kv.png" class="form-control input-md" required="" type="text" value="<?php echo $config['gambar_default'] ?>">
  <span class="help-block">Masukan Gambar Default untuk ditayangkan di depan website</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="bootstrap_theme">Bootstrap Theme CSS URL</label>  
  <div class="col-md-4">
  <input id="bootstrap_theme" name="bootstrap_theme" placeholder="https://getbootstrap.com/docs/3.3//dist/css/bootstrap.min.css" class="form-control input-md" required="" type="text" value="<?php echo $config['bootstrap_theme'] ?>">
  <span class="help-block">Jangan sembarangan di ganti kecuali jika anda tau maksudnya . jika konfigurasi ini salah dapat menyebabkan kerusakan tampilan seluruh website! . gunakan dengan bijak</span>  
  </div>
</div>
	
<div class="form-group">
  <label class="col-md-4 control-label" for="prefix_nama">Prefix Sebut nama</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="web_mode-0">
      <input name="prefix_nama" id="prefix_nama-0" value="1" <?php echo $prefix_nama ?> type="radio">
      Nyala . (Jonru . Panjang kntlmu adalah 69cm)
    </label>
	</div>
  <div class="radio">
    <label for="web_mode-1">
      <input name="prefix_nama" id="prefix_nama-1" value="2" <?php echo $prefix_namad ?> type="radio">
      Mati . (Panjang kntlmu adalah 69cm)
    </label>
	</div>
  </div>
</div>
<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="web_mode">Mode Website</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="web_mode-0">
      <input name="web_mode" id="web_mode-0" value="1" <?php echo $checked_entri ?> type="radio">
      Entri (quote kak seto , karakter game , personality , dll)
    </label>
	</div>
  <div class="radio">
    <label for="web_mode-1">
      <input name="web_mode" id="web_mode-1" value="2" <?php echo $checked_acak ?> type="radio">
      Nomor Acak (Panjang kntl , tahun meninggal , dll)
    </label>
	</div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="prefix_entri">prefix Text Entri</label>  
  <div class="col-md-4">
  <input id="prefix_entri" name="prefix_entri" placeholder="lagu terbaik untuk kamu adalah" class="form-control input-md"  type="text"  value="<?php echo $config['prefix_entri'] ?>">
  <span class="help-block">Hanya perlu dimasukan jika memakai mode entri . masukan prefix text yang ingin dimunculkan sebelum judul entri</span>  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="sufix_entri">sufix Text Entri</label>  
  <div class="col-md-4">
  <input id="sufix_entri" name="sufix_entri" placeholder=" adalah lagu terbaik untuk kamu" class="form-control input-md"  type="text"  value="<?php echo $config['prefix_entri'] ?>">
  <span class="help-block">Hanya perlu dimasukan jika memakai mode entri . masukan prefix text yang ingin dimunculkan sebelum judul entri</span>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nomor_acak">prefix Text Nomor Acak</label>  
  <div class="col-md-4">
  <input id="nomor_acak" name="nomor_acak" placeholder="Panjang kontol kamu adalah" class="form-control input-md"  type="text" required="" value="<?php echo $config['prefix_acak'] ?>">
  <span class="help-block">Hanya perlu dimasukan jika memakai mode nomor acak . masukan prefix text yang ingin dimunculkan sebelum nomor acak</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="suffix_na">suffix Text Nomor Acak</label>  
  <div class="col-md-4">
  <input id="suffix_na" name="suffix_na" placeholder="cm" class="form-control input-md" type="text" required="" value="<?php echo $config['sufix_acak'] ?>">
  <span class="help-block">Hanya perlu dimasukan jika memakai mode nomor acak . masukan sufix text yang ingin dimunculkan setelah nomor acak </span>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="range_min">Range Acak Min</label>  
  <div class="col-md-4">
  <input id="range_min" name="range_min" placeholder="0" class="form-control input-md" required="" type="number" min="0" max="65535" value="<?php echo $config['acak_range_start'] ?>">
  <span class="help-block">Hanya perlu dimasukan jika memakai mode nomor acak . masukan nomor minimal yang bisa dihasilkan . minimalnya adalah 0</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="range_max">Range Acak Max</label>  
  <div class="col-md-4">
  <input id="range_max" name="range_max" placeholder="100" class="form-control input-md" required="" type="number" min="0" max="65535" value="<?php echo $config['acak_range_end'] ?>">
  <span class="help-block">Hanya perlu dimasukan jika memakai mode nomor acak . masukan nomor maksimal yang bisa dihasilkan . minimalnya adalah diatas range minimal</span>  
  </div>
</div>

<!-- Text input-->


<!-- Select Basic -->


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">submit</button>
  </div>
</div>

</fieldset>
</form>

			</div>
		  </div>
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
