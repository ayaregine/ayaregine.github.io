<?php
//Data from juansumbongform
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juansumbong";

$jspassword = $_POST['jspassword'];
$jsusername  = $_POST['jsusername'];

if($jspassword == 'admin' && $jsusername == 'admin')
{
	 header('Location: ' . 'js_addgovtoffice.php', true, ($permanent === true) ? 301 : 302);
}
else if($jspassword == 'admin2' && $jsusername == 'admin2')
{
	 header('Location: ' . 'adminchart.php', true, ($permanent === true) ? 301 : 302);
}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Credential used not valid. please try again.");'; 
	echo 'window.location.href = "admin.php";';
	echo '</script>';
}

?>
