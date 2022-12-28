<?php
session_start();
if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = base64_encode($_POST["password"]);
    $lat=$_COOKIE['lat'];
    $log=$_COOKIE['log'];
    $address=$_POST['address'];
    // $_SESSION['lat']=$lat;
    // $con = mysqli_connect("localhost", "root", "", "test");
    include "connection.php";
    include "Funtions.php";
    if (isset($con)) {
        $exist_user = "SELECT * FROM user_table WHERE username='$username' or email='$email'";
        // $user_exist_query="SELECT * FROM 'register_user'";
        $re = mysqli_query($con, $exist_user);
        $row = mysqli_fetch_array($re);
        if ($row>0) {
            if(($row['email'])==($email) and $row['username']==$username)
            {
                echo "
                <script>
                alert('$row[email]- Email already taken and $row[username]- username already taken.');
                window.location.href='index.php';
                </script>"; 
            }elseif($row["email"]==$email)
            {
                echo "<script>alert('$row[email] is alrady exist.');
                window.location.href='index.php';
                </script>";
            }
            else{
                echo "<script>alert('$row[username] is alrady exist.');
                window.location.href='index.php';</script>";
            }
           
        } 
        else 
        {

            $sql = "INSERT INTO `user_table`(`name`, `username`, `email`, `phone`, `password`,`lat`,`log`,`address`) VALUES ('$name','$username','$email','$phone','$password','$lat','$log','$address')";
            $rs = mysqli_query($con, $sql);
            if (isset($rs)) {
                echo "<script>alert('REGISTRATION SUCCESSFULLY'); 
                window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('error');</script>";
            }
        }
    } else 
    {
        echo "<script>alert('cannot connect to the database');</script>";
    }

    mysqli_close($con);
}

if(isset($_POST["login"]))
{
   
 
    $email_username=$_POST["email_username"];
    $lpassword=$_POST["lpassword"];
    // $con=mysqli_connect("localhost", "root", "", "test");
    include "connection.php";
    if(isset($con))
    {
        $exist_user = "SELECT * FROM user_table WHERE username='$email_username' or email='$email_username'";
        $re = mysqli_query($con, $exist_user);
        
        $row = mysqli_fetch_array($re);
       
        
            
        if(isset($row)){
            if(base64_decode($row["password"])==$lpassword)
            {
                session_start();
                $_SESSION['logedin']=true;
                $_SESSION['name']=$row['name'];
                $_SESSION['user_id']=$row['user_id'];
                $_COOKIE['user_id']=$row['user_id'];
                header("location: index.php");
            }else{
                echo"<script>alert('worng password');
                window.location.href='index.php';
                popup('login-popup');
                </script>";
            }
        }else{
            echo"<script>alert('user does not exist');
                window.location.href='index.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('cannot connect to the database');
        window.location.href='index.php';</script>"; 
    }
    mysqli_close($con);
}
