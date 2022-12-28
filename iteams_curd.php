<?php
session_start();
if(isset($_POST['delbtn'])){
    $categorie_delete=$_POST['categorie'];
    include "connection.php";
    if(isset($con)){
            $sql= "DELETE FROM `categories` WHERE `categories_name`='$categorie_delete'";
            // $re=mysqli_query($con,$sql);
            $del=mysqli_query($con,$sql);
            if(isset($del)){
                echo "<script>alert('Iteam delete succusssfuly...');
                window.location.href='product.php';
                upload_img();
            </script>";
            // header("Location: product.php");
            
            }else{
                echo "<script>alert('Iteam not delete succusssfuly. please try angain...');
                window.location.href='product.php';
                upload_img();
            </script>";
            }
            
    }else{
        echo "<script>alert('cannot connect to the database');
            upload_img();
            </script>";
    }
}

if(isset($_POST['submit']) && isset($_POST['categorie'])){
    $categorie_name=$_POST['categorie'];
    
    $img_name=$_FILES['iteams_img']['name'];
    $img_size=$_FILES['iteams_img']['size'];
    $tmp_img_name=$_FILES['iteams_img']['tmp_name'];
    $error=$_FILES['iteams_img']['error'];

    if($error == 0){
        if($img_size>125000){
            echo "<script>
            alert('Sorry, your file is too large.');
            upload_img();</script>";
        }else{
            $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc=strtolower($img_ex);
            $allowed_exs=array("jpg","jpeg","png");

            if(in_array($img_ex_lc,$allowed_exs)){
                $new_img_name=uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path='iteams_img/'.$new_img_name;
                $_SESSION['img_upload_path']=$img_upload_path;
                move_uploaded_file($tmp_img_name,$img_upload_path);
                
                include "connection.php";

                if(isset($con)){
                    $exist_user = "SELECT * FROM categories WHERE categories_name='$categorie_name'";
                    // $user_exist_query="SELECT * FROM 'register_user'";
                    $re = mysqli_query($con, $exist_user);
                    $row = mysqli_fetch_array($re);
                    if ($row>0) {
                        echo "<script>
                            alert('Iteam already exist.....');
                            window.location.href='product.php';
                            popup('add-categorie');
                            
                            </script>";
                    }else{
                        $sql="INSERT INTO `categories` (`categories_name`,`images`) VALUES ('$categorie_name','$new_img_name')";
                        $r=mysqli_query($con,$sql);
                        if (isset($r)) {
                            echo "<script>alert('CATEGORIE ADDED SUCCESSFULLY'); 
                            window.location.href='product.php';
                            upload_img();</script>";
                        } else {
                            echo "<script>alert('error');
                            window.location.href='product.php';
                            popup('add-categorie');
                            </script>";
                        }
                    }

            
                }else{
                    echo "<script>alert('cannot connect to the database');
                                upload_img();
                                </script>";
                }

            }else{
                echo "<script>
        alert('This file is not allowed.....');
        popup('add-categorie');
        
        </script>";
            }
        }
    }else{
        echo "<script>
        alert('Please fill the box.....');
        popup('add-categorie');
        
        </script>";
    }
   
}

if(isset($_POST['upload_btn']) && isset($_FILES['upload_img'])){
    
   
    $img_name=$_FILES['upload_img']['name'];
    $img_size=$_FILES['upload_img']['size'];
    $tmp_img_name=$_FILES['upload_img']['tmp_name'];
    $error=$_FILES['upload_img']['error'];

    if($error == 0){
        if($img_size>125000){
            echo "<script>
            alert('Sorry, your file is too large.');
            upload_img();</script>";
        }else{
            $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc=strtolower($img_ex);
            $allowed_exs=array("jpg","jpeg","png");

            if(in_array($img_ex_lc,$allowed_exs)){
                $new_img_name=uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path='uploads/'.$new_img_name;
                $_SESSION['img_upload_path']=$img_upload_path;
                move_uploaded_file($tmp_img_name,$img_upload_path);
                echo "<script>
                upload_img();
                alert('$_SESSION[img_upload_path]');
                document.getElementById('cu_iteam').src='$_SESSION[img_upload_path]';
                </script>";
                include "connection.php";
                
                if (isset($con)) {
                    $product_name=$_POST['product_name'];
                    $unit=$_POST['unit'];
                    $qty=$_POST['qty'];
                    $priece=$_POST['priece'];
                    $dis=$_POST['dis'];
                    $categories_name=$_POST['categorie'];
                    $user_id=$_SESSION['user_id'];
                    echo "<script>alert($user_id); 
                            ;</script>";
                    $query = "SELECT * FROM categories WHERE categories_name='$categories_name' ";
                    $re = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($re);
                    if($row>0){
                        $categories_id=$row['categorie_id'];
                       
                        $sql = "INSERT INTO `product`(`user_id`, `categorie_id`, `product_name`, `price`, `qty`,`unit`,`image`,`description`) VALUES ('$user_id','$categories_id','$product_name','$priece','$qty','$unit','$new_img_name','$dis')";
                        $rs = mysqli_query($con, $sql);
                        if (isset($rs)) {
                            echo "<script>alert('ITEAMS UPLOAD SUCCESSFULLY'); 
                            window.location.href='product.php';
                            upload_img();</script>";
                        } else {
                            echo "<script>alert('error');
                            window.location.href='product.php';
                            upload_img();
                            </script>";
                        }

                        echo "<script>
                        upload_img();
                        alert('$unit $qty $priece $categories_id $_SESSION[name]  $_SESSION[user_id] ');
                        window.location.href='product.php';
                        </script>";

                    }
                }else{
                    echo "<script>alert('cannot connect to the database');
                    window.location.href='product.php';
                    upload_img();
                    </script>";
                }

            }else{
                echo "<script>
        alert('This file is not allowed.....');
        window.location.href='product.php';
        upload_img();
        
        </script>";
            }
        }
    }else{
        echo "<script>
        alert('Please fill the box.....');
        window.location.href='product.php?upload_img()';
        
        </script>";
    }
}
?>