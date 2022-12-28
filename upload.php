<?php
if(isset($_POST['upload_btn'])){
    echo "<script>alert('hello.......');
             </script>";
}else{
    echo "<script>alert('You have to login.......');
             window.location.href='product.php';
             </script>";
}

?>
