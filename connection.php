<?php //echo ("<script LANGUAGE='JavaScript'>alert('connection.php');</script>");?>
<?php

$servername="localhost";
$username="id8610887_creditmanagementanshul";
$password="anshulgarg96";

$conn=mysqli_connect($servername,$username,$password);

if(!$conn)
{
	die("connection failed: ".mysqli_connect_error().'<hr>');
}

$sql='use id8610887_creditmanagementdatabase';
	if(!mysqli_query($conn,$sql)){
		echo 'Error: '.$sql.'<br>'.mysqli_error($conn).'<hr>';
	}
	
?>