<?php
$con=mysqli_connect("localhost","root","","om");
if(mysqli_connect_errno()){
    echo"<script>alert('cannot connect to the database');
    window.location.href='index.php';</script>";
    
    // exit();
}else{
    // echo"<script>alert('connect to the database');</script>";
    
}

?>