<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>database_check</title>
</head>
<body>
    <center>
    <form action="" method="POST">
                <h2>
                    <span>LOGIN</span>
                </h2>
                <input type="text" placeholder="E-mail or Username" name="email_username">
                <input type="password" placeholder="password" name="password">
                <button type="submit" class="loginbtn" name="login">LOGIN</button>
            </form>
    </center>
    <?php
    $uname=$_POST["email_username"];
    $pass=$_POST["password"];
    if(isset("login"))
    {
        print_r($uname);
    }
    ?>
</body>
</html>