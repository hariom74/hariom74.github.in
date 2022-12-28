<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
    include 'Funtions.php';
    ?>
<body onload="">
    <button onclick="logLat()">Click me</button>
    <p id="location"></p>
   
    <?php
    
        // $lat = $_COOKIE['lat'];
        // $log = $_COOKIE['log'];

        // echo $lat."<br>".$log;
        // setcookie($_COOKIE['log'],"",time()-3600);
        ?>

        <script>
        // document.cookie="log=; max-age=0";
        // document.cookie="lat=; max-age=0";
    </script>
    <?php
        echo $lat."<br>".$log;
        $t=1234;
        $t1=7295;
        $t3=7870;
        $t4='rahul';
        echo base64_encode($t4);
    ?>
 
</body>
</html>