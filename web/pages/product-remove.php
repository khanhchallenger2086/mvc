<?php
    include 'core/core-product.php';

    if (!isset($_GET['ma'])) {
        header('location:index.php?click=products');
    } 
    
    $obj_product = new product();
    $obj_product->product_remove_img($_GET['ma'])->product_remove($_GET['ma']);
?>