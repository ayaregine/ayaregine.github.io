<?php
session_start();
//Data from juansumbongform
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juansumbong";

$juansumbongremarks = $_POST['juansumbongremarks'];
$juansumbongremarkstatus = $_POST['juansumbongremarkstatus'];
$juansumbongid = $_SESSION['fromAdmin'];

$_SESSION['repId'] = $juansumbongid;
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname, "3307");
//Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
 //govtofficeremarks
echo $juansumbongid;
echo $juansumbongremarkstatus;
echo $juansumbongremarks;
 


if (!mysqli_query($conn,"UPDATE `js_complaint` SET `resolved`='$juansumbongremarkstatus',`govtofficeremarks`='$juansumbongremarks',`lastupdated`=now() WHERE `id` = '$juansumbongid'"))
{
  echo("Error description: " . mysqli_error($con));
  //echo '<script type="text/javascript">'; 
	//echo 'alert("Error occured please try again.");'; 
	//echo 'window.location.href = "juansumbong_formassignee.php";';
	//echo '</script>';
}
else
{
	header('Location: ' . 'officeslist.php', true, ($permanent === true) ? 301 : 302);
} 
	

$conn->close();
?>
