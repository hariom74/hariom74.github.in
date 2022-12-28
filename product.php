<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
</head>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        
    }
    
    body{
        width: 100%;
        background-color: #e5e7eb;
        position: relative;
        display: flex;
    }
    #menu{
        /* display: initial; */
        background: black;
        width: 300px;
        height: 100%;
        position: fixed;
        left: 0;
        top: 0  ;
       
        
    }
    #menu .logo{
        display: flex;
        align-items: center;
        color: #fff;
        padding: 30px 0 0 30px;
    }
    #menu .logo img{
        width: 40px;
        margin-right: 15px;
    }
    #menu .items{
        margin-top: 40px;
    
    }
    
    #menu .items li{
        list-style: none;
        padding: 15px 0;
        margin: 0 -1px 0 25px;
        transition: 0.4s ease;
        
    
    }
    #menu .items #dashboard{
        background: #f3f4f6;
    }
    #menu .items li:hover{
        
        background: #253047;
        cursor: pointer;
    }
    
    #menu .items li:hover a{
        color: #f3f4f6;
    }
    #menu .items li{
        margin-bottom: 15px;
        border-left: 4px solid #fff ;
        padding-left: 5px;
    }
    #menu .items li a{
        text-decoration: none;
        color: rgb(134, 141, 151);
        font-weight: 300px;
        transition: 0.3s ease;
    
    }
    
    
    #interface{
        width: calc(100% - 300px);
        margin-left: 300px;
        position: relative;
       
    }
    
    #interface .items{
        display: none;
    }
    #interface .navigation{
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: fixed;
        background: #fff;
        padding: 15px 30px;
        border-bottom: 3px solid #594ef7;
        width: calc(100% - 300px);
    
    }
    
    #interface .navigation .n1{
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    #interface .navigation .n1 img{
        
        width: 30px;
        height: 30px;
        margin-right: 30px;
        cursor: pointer;
    
    }
    
    #interface .navigation .items{
        display: none;
    }
    .profile .profile_img{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        object-fit: cover;
        margin-left: 5px;
    }
    .profile .bell{
        width: 25px;
        height: 25px;
      
        margin-left: 5px;
    }
    .profile .home_icon{
        width: 25px;
        height: 25px;
        margin-bottom: 3px;
        margin-left: 5px;
        cursor: pointer;
    }
    
    #interface .navigation .search{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 10px 14px;
        border: 1px solid #d7dbd7e6;
        border-radius: 4px;
    }
    
    #interface .navigation .search input{
        border: none;
        outline: none;
        font-size: 14px;
    }
    
    #interface .navigation .search img{
        width: 30px;
        height: 30px;
        margin-right: 2px;
        
    
        
    }
    
    #hamburger_btn{
        display: none;
    }
    #interface .navigation .profile{
        display: flex;
        justify-content: flex-start;
    }
    
    .i-name{
        color: #444a53;
        padding: 30px 30px 0 30px;
        font-size: 24px;
        font-weight: 700;
        margin-top: 94px;
    }
    .val-box img{
        font-size: 25px;
        line-height: 60px;
        margin-right: 18px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        text-align: center;
        color: #fff;
        background: chartreuse;
    }
    .values{
        padding: 30px 30px 0 30px;
        display: flex; /* // flex */
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        transition: 0.4s ease;
    }
    .values .val-box{
        background: #fff;
        width: 235px; 
        padding: 16px 20px ;
        border-radius: 5px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        box-shadow: 5px 5px 30px 20px rgb(125, 124, 124);
        margin-bottom: 15px;
        
    }
    
    .values .val-box h3{
        font-size: 20px;
        font-weight: 700;
    }
    
    .values .val-box span{
        font-size: 15px;
        color: #7e8798;
    
    }
    
    .board{
        width: 94%;
        margin: 30px 0 30px 30px;
        overflow: auto;
        background: #fff;
        border-radius: 8px;
        margin-top: 50px;
        /* display: none; */
        display: initial;
        transition: 0.4s ease;
    }
    .board h1{
        margin-left: 40%;
        margin-top: 15%;
        display: flex;
    }
    .people img{
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
    }
    .board h5{
        font-weight: 600;
        font-size: 14px;
    }
    .board p{
        font-weight: 400;
        font-size: 13px;
        color: #787d8d;
    }
    .board .people{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: start;
    }
    
    table{
        border-collapse: collapse;
    }
    tr{
        border-bottom: 1px solid #eef0f3; 
    }
    thead td{
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 400;
        background: #F9FAFB;
        text-align: start;
        padding: 15px;
    
    }
    tbody tr td{
        padding: 10px 15px;
    }
    .active p{
        background: #d7fada;
        padding: 2px;
        display: inline-block;
        border-radius: 40px;
        color: #2b2b2b;
    }
    .edit a{
        text-decoration: none;
        font-size: 14px;
        color: #554cd1;
        font-weight: 600;
    }
    
    #interface .items li:hover{
        background: #eef0f3;
        /* background-color: red; */
    }
    
    @media (max-width: 769px){
        #menu {
            /* display: none; */
            width: 270px;
            position: fixed;
            left: -270px;
           
        }
    
        /* #hamburger_btn{
            display: initial;
        } */
    
        #interface {
            width: 100%;
            margin-left: 0px;
            display: inline-block;
        }
    
        #interface .navigation {
            width: 100%;
        }
    
        .values {
            padding: 30px 30px 0 30px;
            justify-content: flex-start;
        }
    
        .values .val-box {
            
            padding: 16px 20px;
            margin: 10px 20px 10px 0;
        }
    
        .board {
            width: 92%;
           padding: 0;
           overflow-x: auto;
    
            
        }
    
        table{
            width: 100%;
            border-collapse: collapse;
        }
    
        #interface .items{
            width: 100%;
            display: flex;
            flex-direction: row;
            margin-top: 85px;
            background: rgb(111, 104, 104);
            position: fixed;
            height: 30px;
            justify-content: flex-start;
            align-items: center;
            overflow:hidden;
            padding: 0;
            
        }
    
        #interface .items li{
            list-style: none;
            margin-left: 10px;
            height: 30px;
            padding-top: 2px;
            margin-bottom: -2px;
            
    
        }
        
    
        #interface .items li a{
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            color: white;
            
        }
    
        
    }
    
</style>
<body>
<?php 
        if (isset($_SESSION['logedin'])) {
      
            include 'Funtions.php';
            include 'connection.php';
       
            ?>
            <section id="menu" class="menu">
               <div class="logo">
                    <img src="images/logo.png" alt="">
                    <h2>OPRAO</h2>
                </div>
                <div class="items">
                    <li onclick="dashboard();" id="dashboard"><a href="#" >Dashboard</a></li>
                    <li onclick="your_order();" id="your-order"><a href="#" >Your Order</a></li>
                    <li onclick="upload_img();" id="upload_img"><a href="#">Upload Product</a></li>
                    
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Dashboard</a></li>
                </div>
            </section>
        
            <section id="interface">
                <div class="navigation">
                    <div class="n1">
                        <!-- <img src="icon/hamburger.png" class="hamburger" id="hamburger_btn"  alt="" onclick="menu();"> -->
                        <div class="search">
                            <img src="icon/search.svg" alt="">
                            <input type="text" placeholder="Search...">
                        </div>
                    </div>
                    <div class="profile">
                        <!-- <img src="icon/home.png" alt=""> -->
                        <img src="icon/icons8-home-24.png" class="home_icon" alt="" onclick="home();">
                        <img src="icon/bell.svg" alt="" class="bell">
                        <img src="images/hariom.jpg" alt="" class="profile_img">
                    </div>
                    
                </div>
                <div class="items">
                    <li onclick="dashboard();" id="dashboard"><a href="#">Dashboard</a></li>
                    <li onclick="your_order();" id="your-order"><a href="#" >Your Order</a></li>
                    <li onclick="upload_img();" id="upload_img"><a href="#">Upload Product</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Dashboard</a></li>
                    
                </div>
                <h3 class="i-name" id="i-name">Dashboard</h3>
                <div class="values" id="values">
                    <div class="val-box" id="val-box">
                        <img src="icon/users-solid.svg" alt="">
                        <div>
                            <h3>7,897</h3>
                        <span>new user</span>
                        </div>
                    </div>
        
                    <div class="val-box" id="val-box">
                        <img src="icon/users-solid.svg" alt="">
                        <div>
                            <h3>7,897</h3>
                        <span>new user</span>
                        </div>
                    </div>
        
                    <div class="val-box" id="val-box">
                        <img src="icon/users-solid.svg" alt="">
                        <div>
                            <h3>7,897</h3>
                        <span>new user</span>
                        </div>
                    </div>
                    <div class="val-box" id="val-box">
                        <img src="icon/users-solid.svg" alt="">
                        <div>
                            <h3>7,897</h3>
                        <span>New user</span>
                        </div>
                    </div>
                </div>
        
                <div class="board" id="board">
                    
            <?php
            if(isset($con)){
                $query = "SELECT * FROM order_product WHERE saller_id=$_SESSION[user_id]";
                $re = mysqli_query($con, $query);
                $check_iteams=mysqli_num_rows($re)>0;
                if($check_iteams){
                    ?>
                        <table width="100%">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Product name</td>
                                <td>Qty</td>
                                <td>Amount</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    while($row = mysqli_fetch_array($re)){
                        $product_query="SELECT * FROM product WHERE product_id=$row[product_id]";
                        $rs=mysqli_query($con,$product_query);
                        $product_check=mysqli_num_rows($rs)>0;
                        // echo "<script>alert($row[user_id]);</script>";
                        if($product_check){
                            $product_info=mysqli_fetch_array($rs);
                            $product_img=$product_info['image'];
                        }
                        $user_info="SELECT * FROM user_table WHERE user_id=$row[user_id]";
                        $rs = mysqli_query($con, $user_info);
                        $check_iteams=mysqli_num_rows($rs)>0;
                        if(isset($check_iteams)){
                            $user_info=mysqli_fetch_array($rs);
                            
                        }
                        ?>
                             <tr>
                               
                               <td class="people-des">
                                   <h5><?php echo $user_info['name']; ?></h5>
                                   <p></p>
                               </td>
                               <td class="people">
                                   <img src="uploads/<?php echo $product_info['image']; ?>" alt="">
                                   <div class="people-de">
                                       <h5><?php echo $row['product_name']; ?></h5>
                                       <p><?php echo $product_info['description']; ?></p>
                                   </div>
                               </td>
                               <td class="active"><p><?php echo $row['qty']." ". $product_info['unit']; ?></p></td>
                               <td class="role"><p><?php echo $row['price']; ?></p></td>
                               <td><a href="#" class="edit"><a>Cancel</a></td>
                           </tr>
                           
                        <?php
                        
                    }
                    ?>
                    </tbody>
                       </table>
                       <?php
                }else{
                ?>
               
             <h1 id="notfound" style="color: red;">No any order</h1>
                <?php
            }
        }
        
        ?>                          
                </div>
        
                <?php
                include 'upload_iteams.php';
                include 'your_order.php';
                ?>
            </section>
        <?php 
        
        
        
        }else{
             echo "<script>alert('You have to login.......');
             window.location.href='index.php';</script>";
            }
?> 
   
   
</body>
</html>