<?php
//Data from juansumbongform
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juansumbong";

$juansumbongquestion = $_POST['juansumbongquestion'];
$juansumbonganswer = $_POST['juansumbonganswer'];

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname, "3307");
//Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

 
$sql = "INSERT INTO `js_securityquestion`(`id`, `question`, `answer`) VALUES ('','$juansumbongquestion','$juansumbonganswer')";

if ($conn->query($sql) === TRUE)
{
     header('Location: ' . 'js_addquestion.php', true, ($permanent === true) ? 301 : 302);
} 
else 
{
    echo '<script type="text/javascript">'; 
	echo 'alert("Error occured please try again.");'; 
	echo 'window.location.href = "js_addquestion.php";';
	echo '</script>';
}		

$conn->close();
?>
