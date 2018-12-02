<?php
//Data from juansumbongform
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juansumbong";

$juansumbongoffice = $_POST['juansumbongoffice'];
$juansumbongblocked = $_POST['juansumbongblocked'];
$juansumbongid = $_POST['js_id'];

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname, "3307");
//Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

//countblocktries
$resulttries = mysqli_query($conn,"select `blocktries` from `js_complaint` where id = '$juansumbongid'");

$tries = 0;
while($rowresult = mysqli_fetch_array($resulttries))
{
	$tries = $rowresult["blocktries"];
}
 
$tries = $tries + 1;
$result = mysqli_query($conn,"select name from js_assignees where id = (select id from js_offices where name = '$juansumbongoffice')");

while($row = mysqli_fetch_array($result))
{
	$name = $row["name"];
	$sql = "UPDATE `js_complaint` SET `juansumbonggovtoffice`='$juansumbongoffice',`assignee`='$name',`lastupdated`=now(), `isblocked` = '$juansumbongblocked', `blocktries` = '$tries' WHERE `id` = '$juansumbongid';";
	
	if ($conn->query($sql) === TRUE)
	{
		header('Location: ' . 'juansumbong_assigncomplaint.php', true, ($permanent === true) ? 301 : 302);
	} 
	else 
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Error occured please try again.");'; 
		echo 'window.location.href = "juansumbong_formassignee.php";';
		echo '</script>';
	}				
}	
//echo mysqli_info($conn); 

$conn->close();
?>
