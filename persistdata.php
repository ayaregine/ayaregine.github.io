<?php
//Data from juansumbongform
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juansumbong";

$juansumbongname = $_POST['juansumbongname'];
$juansumbonggovtid = $_POST['juansumbonggovtid'];
$juansumbonggender = $_POST['juansumbonggender'];
$juansumbongemail = $_POST['juansumbongemail'];
$juansumbongbarangay = $_POST['juansumbongbarangay'];
$juansumbongnumber = $_POST['juansumbongnumber'];
$juansumbongcurrentaddress = $_POST['juansumbongcurrentaddress'];
$juansumbongtitlecomplaint = $_POST['juansumbongtitlecomplaint'];
$juansumbongtypeofcomplaint = $_POST['juansumbongtypeofcomplaint'];
$juansumbonggovtoffice = $_POST['juansumbonggovtoffice'];
$juansumbongpicture = $_POST['juansumbongpicture'];
$juansumbongmessage = $_POST['juansumbongmessage'];

/* echo 'Heree- '.$juansumbongname . ' = '.$juansumbongbirthday. ' = '.$juansumbonggender . ' = '.$juansumbongemail . ' = '.$juansumbongbarangay. ' = '.$juansumbongnumber . ' = '.$juansumbongcurrentaddress . ' = '.$juansumbongtitlecomplaint . ' = '.$juansumbongtypeofcomplaint . ' = '.$juansumbonggovtoffice. ' = '.$juansumbongpicture . ' = '.$juansumbongmessage;
echo "\n"; */
$target_dir = "upload/";
$ctr = 0;
foreach ($_FILES['files']['name'] as $filename) {
	
    echo $filename . '/';
    
    
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($filename);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
	echo 'sizeeeeee' . $_FILES["files"]["size"];
    if ($_FILES["files"]["size"] [$ctr]> 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["files"]["tmp_name"][$ctr], $target_file)) {
            echo "The file ". basename($filename). " has been uploaded." . $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
	$ctr++;
	$finalFilename = $finalFilename . $filename . '/';
}
echo '-------->'.$finalFilename ;
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname, "3307");
//Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
$date = date('Y-m-d H:i:s');
 
$sql = "INSERT INTO `js_complaint`(`id`, `juansumbongname`, `juansumbonggovtid`, `juansumbonggender`, `juansumbongemail`, `juansumbongbarangay`, `juansumbongnumber`, `juansumbongcurrentaddress`, `juansumbongtitlecomplaint`, `juansumbongtypeofcomplaint`, `juansumbonggovtoffice`, `juansumbongpicture`, `juansumbongmessage`, `legitcitizen`, `resolved`,`datefiled`,`assignee`,`govtofficeremarks`,`lastupdated`,`isblocked`,`blocktries`) VALUES ('','$juansumbongname','$juansumbonggovtid','$juansumbonggender','$juansumbongemail','$juansumbongbarangay','$juansumbongnumber','$juansumbongcurrentaddress','$juansumbongtitlecomplaint','$juansumbongtypeofcomplaint','notyetassigned','$finalFilename','$juansumbongmessage','true','false','$date','none','none','$date','false','0');";

if ($conn->query($sql) === TRUE)
{
     header('Location: ' . 'juansumbong_formdone.php', true, ($permanent === true) ? 301 : 302);
} 
else 
{
    echo '<script type="text/javascript">'; 
	echo 'alert("Error occured please try again.");'; 
	echo 'window.location.href = "juansumbong_form.php";';
	echo '</script>';
}		

$conn->close();
?>
