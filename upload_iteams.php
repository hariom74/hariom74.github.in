
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload_iteams</title>
    <link rel="stylesheet" href="main.css">

    <style>
        .product {
            justify-content: flex-start;
            align-items: flex-start;
            width: 90%;
            height: 500px;
            background: #fff;
            border-radius: 5px;
            margin-left: 5%;
            display: none;
            padding: 10px;
            overflow-y: scroll;

            transition: 0.4s ease;
            /* margin-right: 20px; */
        }
        ::-webkit-scrollbar{
            width: 5px;
            border-radius: 30px;
        }
        ::-webkit-scrollbar-thumb{
            background: #ddd;
        }
        ::-webkit-scrollbar-thumb:hover{
            background: #ccc;
        }
        ::-webkit-scrollbar-track{
            background: #f1f;
        }

        .product .categorie,
        .product_column .product_name,
        .qty,
        .unit,
        .priece,
        .upload_imgage {
            justify-content: space-between;
            align-items: center;
            width: 80%;
            height: auto;
            padding: 12px;
            border: 1px solid #d7dbd7e6;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 2px;
        }

        .dis {
            justify-content: space-between;
            align-items: center;
            width: 324px;
            height: 60px;
            padding: 12px;
            border: 1px solid #d7dbd7e6;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 2px;
        }

        .des textarea {
            width: 85%;
            height: auto;
        }

        .product .product_name,
        .categorie,
        .qty,
        .unit,
        .priece label {
            font-size: 23px;
            margin: 2px;

        }

        .product .categorie select,
        .unit select {
            height: 27px;
            width: 55%;
            margin-left: 5px;
        }

        .product_column {
            width: 50%;
            height: auto;
            margin-left: 5%;
            display: flex;
            /* justify-content: flex-start; */
            flex-direction: column;
            align-items: flex-start;
        }

        .product_name input,
        .qty input,
        .priece input {
            border: none;
            outline: none;
            font-size: 14px;

        }

        .product_img_column {
            width: 35%;
            height: auto;
            margin-left: 1%;
            margin-right: 1%;
            display: flex;
            /* justify-content: flex-start; */
            flex-direction: column;
            align-items: flex-start;
        }

        .product_img_column img {
            width: 95%;
            height: auto;
            padding: 10px;
        }

        .upload_btn {
            background-color: black;
            font-size: 25px;
            font-weight: bold;
            margin: 5px 3px;
            border-radius: 18px;
            padding: 9px 14px;
            cursor: pointer;
            color: rgb(215, 174, 174);
            display: none;
        }
        .upload_btn:hover{
            background-color: white;
            color: black;
            transition: 0.4s ease;
        }

        .add-categorie {
            cursor: pointer;
            border-bottom: 2px solid blue;
            color: rgb(15, 274, 74);

        }

        .delete-categorie {
            cursor: pointer;
            border-bottom: 2px solid blue;
            color: red;

        }
        .edit-categorie {
            cursor: pointer;
            border-bottom: 2px solid blue;
            color: blue;

        }
        .update_iteams span{
            font-size: 20px;
            margin-right: 10px;
        }

    </style>
</head>

<body>
<?php 
    include 'Funtions.php';
    ?>
<?php 
        if (isset($_SESSION['logedin'])) {
            
        }else{
             echo "<script>alert('You have to login.......');
             window.location.href='index.php';</script>";
        }
        ?>
    <form action="iteams_curd.php" method="POST" enctype="multipart/form-data">
    
    <div class="product" id="product">
        <div class="product_column">
        <div class="update_iteams">
            <span onclick="popup('add-categorie');" class="add-categorie">Add categorie</span>
            <span onclick="popup('edit-categorie');" class="edit-categorie">Edit categorie</span>
            <span onclick="popup('delete-categorie');" class="delete-categorie">Delete categorie</span>
        </div>
            <div class="categorie">
            
                    <label for="categorie">Categories: </label>
                    <select name="categorie" id="categorie">
                        <?php
                            include "connection.php";
                             $query = "SELECT * FROM categories";
                             $re = mysqli_query($con, $query);
                             $check_categories=mysqli_num_rows($re)>0;
                             if($check_categories){
                                    while($row = mysqli_fetch_array($re)){
                                        $test=$row['categories_name'];   
                                             echo "
                                             <option value='$test'>$test</option>
                                             
                                             ";
                                    }
                             }
                            // else{
                            //     echo "
                            //     <script>alert('Data not found......')</script>
                            //     ";

                            //  }
                        ?>
                     
                    </select>
           
            </div>

            <div class="product_name">
                
                    <label for="product_name">Product: </label>
                    <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>
                
            </div>

            <div class="unit">
               
                    <label for="unit">Unit: </label>
                    <select name="unit" id="unit" name="unit">
                        <option value="Kg">Kg</option>
                        <option value="Piece">Piece</option>
                        <option value="Ltr">Ltr</option>

                    </select>
                
            </div>
            <div class="qty">
                
                    <label for="qty">Quantity: </label>
                    <input type="text" id="qty" name="qty" placeholder="Enter quantity" required>
                
            </div>

            <div class="priece">
              
                    <label for="priece">Priece: </label>
                    <input type="number" id="priece" name="priece" placeholder="Enter priece" required>
                
            </div>

            <div class="upload_imgage">
                
                    <input type="file" name="upload_img"  required>
              
            </div>
            <div class="des">
             
                    <textarea id="dis" name="dis" rows="4" cols="35">Enter description about product....
    </textarea>
                

            </div>
        </div>

        <div class="product_img_column">
            <img src="" alt="" id="cu_iteam">

        </div>



    </div>
    <center><button type="submit" id="upload_btn" name="upload_btn" class="upload_btn">Upload</button></center>
    
    </form>

    <!-- // popup-container for add items from database -->

    <div class="popup-container" id="add-categorie">
        <div class="popup">
            <form action="iteams_curd.php" method="POST" enctype="multipart/form-data">
                <h2>
                    <span style="color: #75cfb8;">Add categorie</span>
                    <button type="reset" onclick="popup('add-categorie');">X</button>
                </h2>
                <input type="text" placeholder="Categorie name" name="categorie" id="categorie" required>
                <label for="">Please upload a clear image</label>
                <input type="file" name="iteams_img" required>
                <button type="submit" class="catebtn" name="submit">SUBMIT</button>
            </form>
        </div>
    </div>

    <!-- // popup-container for edit items from database -->
    <div class="popup-container" id="edit-categorie">
        <div class="popup">
            <form action="iteams_curd.php" method="POST" enctype="multipart/form-data">
                <h2>
                    <span style="color: #75cfb8;">Edit categorie</span>
                    <button type="reset" onclick="popup('edit-categorie');">X</button>
                </h2>
                <input type="text" placeholder="Categorie name" name="categorie" id="categorie" required>
                <label for="">Please upload a clear image</label>
                <input type="file" name="iteams_img" required>
                <button type="submit" class="catebtn" name="submit">SUBMIT</button>
            </form>
        </div>
    </div>
    <!-- // popup-container for delete items from database -->

    <div class="popup-container" id="delete-categorie">
        <div class="popup">
            <form action="iteams_curd.php" method="POST">
                <h2>
                    <span style="color: #75cfb8;">Delete categorie</span>
                    <button type="reset" onclick="popup('delete-categorie');">X</button>
                </h2>
                <label for="">Select iteam</label>
                <select name="categorie" id="categorie" class="categorie" required>
                <?php
                            include "connection.php";
                             $query = "SELECT * FROM categories";
                             $re = mysqli_query($con, $query);
                             $check_categories=mysqli_num_rows($re)>0;
                             if($check_categories){
                                    while($row = mysqli_fetch_array($re)){
                                        $test=$row['categories_name'];   
                                             echo "
                                             <option value='$test'>$test</option>
                                             
                                             ";
                                    }
                             }
                             ?>
                </select>
                
                    <span style="color:red;" id="iteam_not_avilable"></span>
                    <script>
                        var t=document.getElementById('categorie').value;
                    if(t==null || t==''){
                        document.getElementById('iteam_not_aviable').innerHTML='Not abhilable';
                    }
                    </script>
                
                <button type="submit" class="delbtn" name="delbtn">Delete</button>
            </form>
        </div>
    </div>




</body>

</html>