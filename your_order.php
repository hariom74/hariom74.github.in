<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Order</title>
</head>
<style>
       div.orderboard{
        width: 94%;
        margin: 150px 0 15px 13px;
        overflow: auto;
        background: #fff;
        border-radius: 8px;
        margin-top: 25px;
        display: none;
        /* display: flex; */
        transition: 0.4s ease;
    }
</style>
<body>
<div class="orderboard" id="your_order">

            <?php
            if(isset($con)){
                $query = "SELECT * FROM order_product WHERE user_id=$_SESSION[user_id]";
                $re = mysqli_query($con, $query);
                $check_iteams=mysqli_num_rows($re)>0;
                if($check_iteams){
                    ?>
                        <table width="100%">
                        <thead>
                            <tr>
                                
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
                               
                         
                               <td class="people">
                                   <img src="uploads/<?php echo $product_info['image']; ?>" alt="">
                                   <div class="people-de">
                                       <h5><?php echo $row['product_name']; ?></h5>
                                       <p>hs2562520@gmail.com</p>
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
</body>
</html>