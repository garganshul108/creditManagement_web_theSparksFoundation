<!doctype HTML5>
<?php
    // session_start();
    // if(isset($_SESSION["mess"]))
    // {
    //     $m = $_SESSION["mess"];
    //     unset($_SESSION["mess"]);
    //     echo ("<script LANGUAGE='JavaScript'>alert('.$m.');</script>");
    // }
    // session_destroy();
    
    if(isset($_GET["mess"]))
    {
        $m = $_GET["mess"];
        unset($_GET["mess"]);
        // echo ("<script LANGUAGE='JavaScript'>alert(".$m.");</script>");
        ?>
        <div id="top">
            <h3><?php echo $m; ?></h2>
        </div>
        <?php
    }
?>
<html>
    <?php //echo ("<script LANGUAGE='JavaScript'>alert('home.php');</script>");?>
	<head>
		<title> the Sparks Foundation | Credit Management</title>

		
		<?php
			// setting up the connection with DB
			// connection file
			// file consists of username, password and database
			include 'connection.php';
		?>											
		
	</head>
	<script>
	</script>
	<body onload="setTimeout(function(){document.getElementById('top').style.display='none';}, 4000);">
		<header>
			<h3 align="center">Credit Management</h3>
		</header>
		
		<form class='form' name='user_form' action='selectUser.php' method="GET">
				<span class='select'>Who is Paying?</span>
			
			<?php

			//fetching user data from the database
// 			echo "inhere";
			$sql='select * from user';												
			$results = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($results))
			{
			?>

			<!-- //printing divs iteratively	 -->
			<div class='item'>
				<button type="submit" name='button' value='<?php echo $row['name']?>' >
					<span  style="text-align:left; width:45%; display:inline-block;"><?php echo $row['name']?></span>
					<span style="text-align:right; width:45%; display:inline-block;"><?php echo $row['credit']?></span>
				</button>
			</div>
			
			<?php
			}
			?>
		</form>
	<link rel="stylesheet" type="text/css" href="display.css"/>
	<div id="refdiv" ><button id="refresh" onclick="window.location.href='refresh.php';">Refresh</button></div>
	</body>

</html>