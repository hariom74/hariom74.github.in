<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="getLogLet();">
<div class="popup-container" id="login-popup">
        <div class="popup">
            <form action="login_register.php" method="POST">
                <h2>
                    <span style="color: #75cfb8;">LOGIN</span>
                    <button type="reset" onclick="popup('login-popup');">X</button>
                </h2>
                <input type="text" placeholder="E-mail or Username" name="email_username" id="email_username" required>
                <input type="password" placeholder="password" name="lpassword" required>
                <button type="submit" class="loginbtn" name="login">LOGIN</button>
            </form>
        </div>
    </div>

    <div class="popup-container" id="register-popup">
        <div class="popup">
            <form method="POST" action="login_register.php" class="myform">
                <!-- <input type="text" name="lat">
                <input type="text" name="log"> -->
                <h2>
                    <span style="color: #fa9579;">REGISTER</span>
                    <button type="reset" onclick="popup('register-popup');">X</button>
                </h2>
                <input type="text" placeholder="Name" name="name" style="border-bottom: 2px solid #fa9579;" required>
                <input type="text" placeholder="Username" name="username" style="border-bottom: 2px solid #fa9579;" required>
                <input type="email" placeholder="E-mail" name="email" style="border-bottom: 2px solid #fa9579;" required>
                <input type="text" placeholder="Phone" name="phone" style="border-bottom: 2px solid #fa9579;" required>
                <input type="text" placeholder="Address" name="address" style="border-bottom: 2px solid #fa9579;" required>
                <input type="password" placeholder="Create password" name="password" style="border-bottom: 2px solid #fa9579;" required >


                <button type="submit" class="registerbtn" name="register" style="background-color: #fa9579;">SUBMIT</button>
            </form>
        </div>

    </div>
   
</body>


</html>