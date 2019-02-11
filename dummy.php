<?php
    $msg = "NA";
    // session_start();
//echo ("<script LANGUAGE='JavaScript'>alert('dummy.php');</script>");?>
<?php
            
            include "connection.php";
            $to=$_GET['to'];
            $from=$_GET['from'];
            $amount=$_GET['amount'];

            $sql="select credit from user where name='$from';";
            $result= mysqli_query($conn,$sql);
            $result=mysqli_fetch_assoc($result);
            if($result['credit']<$amount)
            {
                
                // echo ("<script LANGUAGE='JavaScript'>
                //         alert('Insufficient funds to transfer');
                //         window.location.href='home.php';
                //         </script>");
                $msg = "Insufficient funds to transfer";
            
            }
            
            else
            {
                $sql="update user set credit=credit+'$amount' where name='$to';";
                mysqli_query($conn,$sql);
                $sql="update user set credit=credit-'$amount' where name='$from';";
                mysqli_query($conn,$sql);
               
                $message="Transferred ".$amount." credits to ".$to." from ".$from." account";
                $msg = $message;
                
            }
            
?>
<script>
    var x="<?php echo $message?>";
    // alert(x);
</script>


<?php
echo ("<script LANGUAGE='JavaScript'> window.location.href='home.php?mess="."\"".$msg."\"';</script>");
 ?>