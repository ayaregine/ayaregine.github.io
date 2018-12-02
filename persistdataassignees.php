<?php
//Data from juansumbongform
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juansumbong";

$juansumbongname = $_POST['juansumbongname'];
$juansumbonggovtoffice = $_POST['juansumbonggovtoffice'];
$juansumbongusername = $_POST['juansumbongusername'];
$juansumbongpassword = $_POST['juansumbongpassword'];

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname, "3307");
//Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "INSERT INTO `js_assignees`(`id`, `name`, `office`, `username`,`password`,`active`) VALUES ('','$juansumbongname','$juansumbonggovtoffice', '$juansumbongusername', '$juansumbongpassword', 'yes')";

if ($conn->query($sql) === TRUE)
{
    header('Location: ' . 'js_addassignees.php', true, ($permanent === true) ? 301 : 302);
} 
else 
{
	echo mysqli_info($con); 
    echo '<script type="text/javascript">'; 
	echo 'alert("Error occured please try again.");'; 
	echo 'window.location.href = "js_addassignees.php";';
	echo '</script>';
}		

$conn->close();
?>
