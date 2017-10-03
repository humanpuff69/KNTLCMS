<html>
<head>
<meta http-equiv="refresh" content="3;url=daftar_entri.php" />
<title>Menghapus Entri</title>
</head>
<body>
			
																 <?php
$config = include 'config.php';

if (strpos($_GET['id'], "'") !== false OR strpos($_GET['id'], "RLIKE") !== false  OR strpos($_GET['id'], "SELECT") !== false OR strpos($_GET['id'], "EXTRACTVALUE") !== false OR strpos($_GET['id'], "AND") !== false OR strpos($_GET['id'], "THEN") !== false OR strpos($_GET['id'], "BENCHMARK") !== false ) {
    die("GAK USAH NGEDEFACE ANJING!");
	
}
if (strpos($_POST['id'], "'") !== false OR strpos($_GET['id'], "RLIKE") !== false  OR strpos($_GET['id'], "SELECT") !== false OR strpos($_GET['id'], "EXTRACTVALUE") !== false OR strpos($_GET['id'], "AND") !== false OR strpos($_GET['id'], "THEN") !== false OR strpos($_GET['id'], "BENCHMARK") !== false ) {
    die("GAK USAH NGEDEFACE ANJING!");
	
}
session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from user where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user']) && !isset($_SESSION['user_hash'])){
      header("location:login.php");
   } else {
// Create connection
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$ngentod = $conn->escape_string($_GET['id']);
// sql to delete a record
$sql = "DELETE FROM entri WHERE id=" . $ngentod ;;

if ($conn->query($sql) === TRUE) {
    echo "Entri Sukses Terhapus!";
} else {
    echo "Gagal Menghapus Entri: " . $conn->error;
}

$conn->close();}
?> 
<br>
	klik<a href="daftar_entri.php">here</a> untuk kembali ke daftar entri
</body>
</html>   

  
