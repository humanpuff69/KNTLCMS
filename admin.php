<?php
$config = include 'config.php';
  include('session.php');


// Create connection
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  id, judul , image_url , view FROM entri ORDER BY id DESC LIMIT 0,10";
$result = $conn->query($sql);

$sql2 = "SELECT COUNT(*) FROM `entri'";
$result2 = $conn->query($sql2);
$sqlq = "SELECT counter from counter";
$resultq = $conn->query($sqlq);
if ($resultq->num_rows > 0) {
    
    while($row = $resultq->fetch_assoc()) {
	$totalview = $row['counter'];
    }
} else {
    $totalview = "0";
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
          <a class="navbar-brand" href="#">KNTLCMS Administrator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav navbar-right">
            <li class=active><a href="#">Dashboard</a></li>
            <li><a href="tambah_entri.php">Tambah Entri</a></li>
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
        
        <div class="">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
				<h1><?php
					$rows = mysqli_num_rows($result2);
echo $rows;
					?></h1>
              <h4>Jumlah Entri</h4>
              <span class="text-muted">Anda Memiliki <?php echo $rows ?> Entri</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
				<h1>1024</h1>
              <h4>Jumlah Pengunjung Hari Ini</h4>
              <span class="text-muted">(Hanya Placeholder)Anda Memiliki 1024 Pengunjung</span>
            </div>
			   <div class="col-xs-6 col-sm-3 placeholder">
				<h1><?php echo $totalview ?></h1>
              <h4>Jumlah Pengunjung Total</h4>
              <span class="text-muted">Anda Memiliki <?php echo $totalview ?> Pengunjung</span>
            </div>
			   <div class="col-xs-6 col-sm-3 placeholder">
				<h1>69</h1>
              <h4>View Quote</h4>
              <span class="text-muted">(Hanya Placeholder)Anda Memiliki 69 View Quote</span>
            </div>
            </div>
          </div>

			<h2 class="sub-header">Entri Terbaru  <a href="tambah_entri.php"><button type="button" class="btn btn-success"><span class="glyphicons glyphicons-plus"></span> Tambah Entri</button></a>
			</h2> <div class="table-responsive">
            <table class="table table-striped">
              <thead>
			
                <tr>
                  <th>#</th>
                  <th>Judul</th>
                  <th>URL Gambar</th>
                  <th>Views</th>
                  <th>Aksi</th>
                </tr>
              </thead>
				  <tbody>
            				  <?php
				  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>
                  <td>" . $row["id"] . "</td>
                  <td>" . $row["judul"] . "</td>
                  <td>" . $row["image_url"] . "</td>
                  <td>" . $row["view"] . "</td>
                  <td>" . "<a href=". '"' . "delete.php?id=". $row["id"] . '"' . "><button type=". '"' . "button". '"' .  "class=". '"' . "btn btn-sm btn-danger". '"' . ">Hapus</button></a></td>
                </tr>";
    }
} else {
    echo "Entri tidak ditemukan . silahkan buat entri di menu Tambah Entri";
}
				  ?>
              </tbody>
            </table>
			<a href="daftar_entri.php"><button type="button" class="btn btn-primary"> Lihat Lebih Banyak Entri -></button></a>
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
