<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product_def</title>
    
</head>
<style>
    body {
    width: 100%;
    background-color: #fff;
    position: relative;
    
}


div.main-container {
    left: 0;
    top: 0;
    display: flex;
    /* flex-direction: row; */
    align-items: flex-start;
    justify-content: flex-start;
    flex-flow: wrap;
    margin-top: 90px
}
div.product-box{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    height: auto;
    width: auto;
    background: #fff;
    border: 2px solid #f4f3f3;
    margin-left: 20px;
    border-radius: 5px;
    margin: 20px 0px 10px 50px ;
   
}



div.product-box img {
    height: 350px;
    width: 310px;
    margin: 12px 20px 40px 20px;
    border: 2p-x solid #ff8;
}

div.buy-cart {
    height: auto;
    width: 95%;
    /* background: red; */
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    /* border: 2px solid #e5e7eb; */
    margin: 5px 20px 5px 20px;
}

div.buy-cart button {
            background-color: black;
            font-size: 25px;
            font-weight: bold;
            margin: 5px 3px;
            margin-bottom: 10px;
            border-radius: 18px;
            padding: 9px 14px;
            cursor: pointer;
            color: rgb(215, 174, 174);
            display: initial;
        }
div.buy-cart button:hover{
            background-color: white;
            color: black;
            transition: 0.10s ease;
        }

div.product-info{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: space-between;
    height: auto;
    width: 570px;
    background: #fff;
    border: 2px solid #f4f3f3;
    /* margin-left: 20px; */
    border-radius: 5px;
    margin: 20px 0px 10px 10px ;
    padding: 10px;
}

table{
        border-collapse: collapse;
    }
    tr{
        border-bottom: 1px solid #eef0f3; 
    }
    td{
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 400;
        background: #F9FAFB;
        text-align: start;
        padding: 15px;
    
    }
    tr td{
        padding: 10px 15px;
        
    }
    #saller_info{
        background: #d7fada;
    }

div.saller label{
    font-size: 25px;
    margin: 5px;
    cursor: pointer;
}
div.saller_info{
    display: none;
}
div.saller label:hover{
    color: red;
    font-size: 28px;
}
div.button{

    background-color: black;
    font-size: 25px;
    font-weight: bold;
    margin: 5px 3px;
    margin-bottom: 10px;
    border-radius: 18px;
    padding: 9px 14px;
    cursor: pointer;
    color: rgb(215, 174, 174);
    display: initial;

}
div.button:hover{
    background-color: #eef0f3;
    color: black;
    border: 2px solid #f4f3f3;
    
}


</style>
<body>
<?php 
    include 'Funtions.php';
    include 'connection.php';
    include 'header.php';
    include 'login_register_popup.php';

    // if (isset($_SESSION['logedin'])) {
    //     // echo "<h1 style='text-align: center; margin-top:200px'>WELCOME TO THIS WEBSITE - $_SESSION[name]  $_SESSION[user_id]</h1> ";      
    // }else{
    //      echo "<script>alert('You have to login.......');
    //      window.location.href='index.php';</script>";
    // }
    $product_id="";
    $km="";
    if(isset($_GET['product_id'])){
        $product_id=base64_decode($_GET['product_id']);
        // echo "<script>alert('$product_id');</script>";
        $km=base64_decode($_GET['km']);
        // echo $km;
        $query = "SELECT * FROM product WHERE product_id='$product_id'";
        $re = mysqli_query($con, $query);
        $row = mysqli_fetch_array($re);
        $user_id=$row['user_id'];

    //     echo "
    // <script>
    // alert('$row[product_id] $row[categorie_id] $row[user_id] $row[prodcut_name] $row[price] $row[qty] $row[description] ok');
    
    // </script>"; 
    $query1="SELECT * FROM user_table WHERE user_id='$user_id'";
    $re1=mysqli_query($con,$query1);
    $row_user=mysqli_fetch_array($re1);
    }else{
        echo "<script>alert('not working..');</script>";
    }
    
    ?>


  <div class="main-container">
        <div class="product-box">
            <img src="uploads/<?php echo $row['image']; ?>" alt="">
           

        </div>
       <form action="" method="POST">
        <div class="product-info">
                    <span><h1><?php echo $row['product_name']; ?></h1></span>
                    <p><?php echo $row['description']; ?></p>
                    <div class="price">
                    <!-- ₹ 486<span> /Kg</span>
                        <span>  </span> -->
                    <table>
                        <tr><td>Price</td> <td id="price" name="price"><?php echo "₹".$row['price']." /".strtolower($row['unit']); ?></td></tr>
                        <tr><td>Avilable Qty.</td> <td><?php echo $row['qty']." ".ucwords($row['unit']); ?></td></tr>
                        <tr><td>Enter Qty.</td> <td><input type="number" onchange="total_price(<?php Print($row['price']); ?>)" id="qty" name="qty" required></td></tr>
                        <tr><td>Total Price</td> <td><input type="text" id="total_p" name="total_p" readonly></td></tr>
                    </table>
                    </div>
                    <div class="saller">
                        <label for="" onclick="showSallerDetails()">Saller Deatils</label>
                        <div class="saller_info" id="saller-info">
                            <table>
                                <tr>
                                    <td id="saller_info">Saller name</td>
                                    <td><?php echo $row_user['name']; ?></td>
                                </tr>
                                <tr>
                                    <td id="saller_info">Phone</td>
                                    <td><?php echo $row_user['phone']; ?></td>
                                </tr>
                                <tr>
                                    <td id="saller_info">Address</td>
                                    <td>vill-sono,ps+po-sono,dist-jamui,bihar,811314</td>
                                </tr>
                                <tr>
                                    <td id="saller_info">Distance</td>
                                    <td><?php echo round($km,2); ?> Km</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="buy-cart">
            <button type="submit" id="Addcart_btn" name="Addcart_btn" class="Addcart_btn" disabled>Add cart</button>

            <div class="button" id="Buy_btn" name="Buy_btn" onclick="popup('ordercnf');">Buy</div>
          
            <!-- <button type="submit" id="Buy_btn" name="Buy_btn" class="Buy_btn">Buy</button> -->
            </div>

    </div>
    <div class="popup-container" id="ordercnf">
                         <div class="popup">
                    
                        <h2>
                            <span style="color: #75cfb8;">Conform Order</span>
                            <button type="reset" onclick="popup('ordercnf');">X</button>
                        </h2>
                
                <button type="submit" class="conform" name="cnf">conform</button>
               
        </div>
    </div>
    </form>
  </div>

 
   
  <script>

  
    
    function total_price(a){
        var b=document.getElementById('qty').value;
        var total_price=a*b;
        document.getElementById('total_p').value=total_price;
       
    }
 
   
  </script>

</body>
</html>

<?php
 if(isset($_POST['cnf'])){
    
    if(isset($_SESSION['logedin'])){
        $total_price=$_POST['total_p'];
        $saller_id=$row['user_id'];
        $user_id=$_SESSION['user_id'];
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $qty=$_POST['qty'];
        $datetime=date('d-m-y h:i:s');

        if(isset($con)){
            $sql = "INSERT INTO `order_product`(`saller_id`, `user_id`, `product_id`, `qty`, `price`,`status`,`datetime`,`product_name`) VALUES ('$saller_id','$user_id','$product_id','$qty','$total_price',0,'$datetime','$product_name')";
            $rs = mysqli_query($con, $sql);
            echo "<script>
            alert('Successfull........');
            </script>";

        }else{
            echo "<script>alert('cannot connect to the database');</script>";
        }

    }else{
        echo "<script>
        alert('you have to login........');
    
    //window.location.href='index.php';
    </script>";
    }
  
}


?>