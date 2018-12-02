<?php
//Data from juansumbongform
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juansumbong";

$juansumbonganswer = $_POST['juansumbonganswer'];
$juansumbongquestion  = $_POST['juansumbongquestion'];
$juansumbongcorrectanswer = $_POST['juansumbongcorrectanswer'];

//echo 'Heree- '.$juansumbonganswer . ' = '.$juansumbongquestion . ' = '.$juansumbongcorrectanswer;

if($juansumbonganswer == '')
{
	echo 'Blank';
}

if(strcasecmp($juansumbonganswer,$juansumbongcorrectanswer) == 0)
{
	 header('Location: ' . 'juansumbong_form.php', true, ($permanent === true) ? 301 : 302);
}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Wrong answer please try again.");'; 
	echo 'window.location.href = "index.php";';
	echo '</script>';
}

?>
