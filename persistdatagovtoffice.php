<?php
//Data from juansumbongform
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juansumbong";

$juansumbongoffice = $_POST['juansumbongoffice'];

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname, "3307");
//Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

 
$sql = "INSERT INTO `js_offices`(`id`, `name`) VALUES ('','$juansumbongoffice')";

if ($conn->query($sql) === TRUE)
{
     header('Location: ' . 'js_addgovtoffice.php', true, ($permanent === true) ? 301 : 302);
} 
else 
{
    echo '<script type="text/javascript">'; 
	echo 'alert("Error occured please try again.");'; 
	echo 'window.location.href = "js_addgovtoffice.php";';
	echo '</script>';
}		

$conn->close();
?>
