<?php
    require('connection.php');
    $sql = "drop table user;";
    if(!mysqli_query($conn,$sql)){
        echo 'Error: '.$sql.'<br>'.mysqli_error($conn).'<hr>';
    }
    echo ("<script LANGUAGE='JavaScript'>window.location.href='index.php';</script>"); 
?>