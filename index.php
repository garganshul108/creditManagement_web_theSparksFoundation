<?php
// 	echo ("<script LANGUAGE='JavaScript'>alert('index.php');</script>"); 
	require('connection.php');
// 	echo ("<script LANGUAGE='JavaScript'>alert('back to index');</script>");
// 	$sql = "drop table user";
// 	mysqli_query($conn,$sql);
	
// 	if(!mysqli_query($conn,$sql)){
// 		echo 'Error: '.$sql.'<br>'.mysqli_error($conn).'<hr>';
// 	}
	
	$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'id8610887_creditmanagementdatabase' AND  TABLE_NAME = 'user'";
	$r11 = mysqli_num_rows(mysqli_query($conn,$sql));
	
	if($r11 <= 0)
	{
    	$sql= "create table user(name varchar(30),email varchar(40),credit double(5,2));";
    
    	if(!mysqli_query($conn,$sql)){
    		echo 'Error: '.$sql.'<br>'.mysqli_error($conn).'<hr>';
    	}
    
    	$name=array('Anshul','Rohit','Aryan','Rajat','Ritwik','Amol','Shrey','Deep','Sumit','Arjun','Sinha');
    
    	for ($x=0;$x<11;$x++)
    	{ 
    		if(rand(10,500) > 250) $email=$name[$x].'@rediffmail.com';
    		else $email=$name[$x].'@yahoo.com';
    		$credit=rand(10,500)+(rand(1,3) == 1? 0.5 : -0.5);
    		$sql="insert into user values('$name[$x]','$email',$credit);";
    
    		if(!mysqli_query($conn,$sql)){
    			echo 'Error: '.$sql.'<br>'.mysqli_error($conn).'<hr>';
    		}
    	}
	}
 	echo ("<script LANGUAGE='JavaScript'>window.location.href='home.php';</script>"); 

?>