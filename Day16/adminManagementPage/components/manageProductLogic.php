<?php

if(isset($_POST['add-product'])){
    require './myDB.php';
    $collectionName = $_POST['c-name'];
    $productName = $_POST['p-name'];
    $productImage = $_POST['p-image'];
    $productPrice = $_POST['p-price'];
    $productDescription = $_POST['p-des'];

    $cNameErr = 'max 10 characters';
    $pnameErr = 'max 20 characters';
    $pImageErr = '';
    $pPriceErr = '';
    $pDesErr = 'max 200 characters';

    $validate = true;

    if(strlen(trim($collectionName))<=0){
        $cNameErr = "Provide valid name";
        $validate = false;
    }
    if(strlen(trim($productName))<=0){
        $pnameErr = "Enter a valid name";
        $validate = false;
        $pDesErr = "Enter a valid description";
    }
    if(strlen(trim($productImage))<=0){
        $pImageErr = "Enter a valid url";
        $validate = false;
    }
    if(strlen(trim($productPrice))<=0){
        $pPriceErr = "Enter a valid price";
        $validate = false;
    }
    if(strlen(trim($productDescription))<=0 || strlen(trim($productDescription))>200){
        $pPriceErr = "Enter a valid Description";
        $validate = false;
    }

    if($validate){
        $insert = "INSERT INTO products (
        collection_name,
        product_name,
        product_img, 
        product_price,
        p_description) values('$productName', '$productImage', '$productPrice', '$productDescription')";
        $insert_value = mysqli_query($conn, $insert);
    }
}

?>