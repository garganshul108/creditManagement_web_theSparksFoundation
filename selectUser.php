<!doctype HTML5>
<html>
	<head>
		<title> Credit Management</title>
        <?php
        
            //getting the balance of the selected account
            // -----------------------------------------------------------------
            include "connection.php";
            $a=$_GET['button'];
            $sql="select credit from user where name='$a';";
            $result=mysqli_query($conn,$sql);
            $balance=mysqli_fetch_assoc($result);
            $balance=$balance['credit'];
        ?>
        <script>
            
            // -------------- form validtaion --------------------------------------------------------
            function validateForm(namee)
            {
                var x=document.forms[namee]['amount'].value;
                if(x==''||isNaN(x)||x<0){
                    alert("Enter a valid amount");
                    return false;}
            }

            //------------------click function for each button-------------------------------------------
            function clickFunction(button_id)
            {
                
                var elements=document.getElementsByClassName('click_button');
                for(var i=0;i<elements.length;i++)
                {
                    elements[i].nextElementSibling.style.display='none';
                }
                var element=document.getElementById(button_id).nextElementSibling;
                element.style.display="block";
            }
        </script>
    </head>
    

            <!-- ----------------start of body ------------------------------------------------------->
	<body>
		<header>
			<h3 align="center">Credit Management</h3>
        </header>
        
        <!-- ---------------------------main outer div of the box---------------------------------------- -->
		<div class='form'>
				<span class='select'>Who is getting paid?</span>
            <?php



            // ---------------------------------fetching user for to display-----------------------------------------
			$sql='select * from user';
			$results=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($results))
			{
            //----------------------------------checking for the payer and benificiary--------------------------------------    
                if(isset($_GET['button']))
                {
                    if($_GET['button']==$row['name'])
                     continue;
                }
            ?>
            
            <!-- --------------------------------div for each of the name box------------------------------------  -->
			<div class='item'>

                <!-- -----------------------------div first child ---------------------------------------------------- -->
                <button type="submit" class="click_button" id='<?php echo $row['name'].'button' ?>'  onclick="clickFunction(this.id)">
                        <span  style="text-align:left; width:45%; display:inline-block; float:left;"><?php echo $row['name']?></span>
                </button>
                    
                <!-- ----------------------------divs hidden form (second child)--------------------------------------------------------- -->
                <form style="display:none;" class="amount_form" name='<?php echo $row['name'].'form'?>' id='amount_form' action="dummy.php" method="GET" onsubmit="return validateForm(this.name)">
                    
                    <input type="hidden" name="balance" value="<?php echo $balance?>"/>
                    <input name='amount' type='text' placeholder="Enter amount here"/>
                    <input type="hidden" name="to" value="<?php echo $row['name']?>" />
                    <input type="hidden" name='from' value="<?php echo $_GET['button']?>"/>
                    <input type="submit" name="button"/>
                </form>   

			</div>
			<?php
			}
			?>
        </div>
        

	<link rel="stylesheet" type="text/css" href="display.css"/>
	</body>
</html>