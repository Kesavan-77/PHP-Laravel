<?php

require './myDB.php';

if(isset($_POST['add-product'])){
    $collectionName = $_POST['addCollection'];
    $productName = $_POST['p-name'];
    $productID = $_POST['p-id'];
    $productImage = $_POST['p-image'];
    $productPrice = $_POST['p-price'];
    $productQuantity = $_POST['p-quantity'];
    $productDescription = $_POST['p-des'];

    $cNameErr = 'max 10 characters';
    $pnameErr = 'max 20 characters';
    $pImageErr = '';
    $pPriceErr = '';
    $pDesErr = 'max 200 characters';
    $pQuantityErr = '';

    $validate = true;

    // Validation
    if(strlen(trim($productName)) <= 0){
        $pnameErr = "Enter a valid name";
        $validate = false;
    }
    if (!filter_var($productImage, FILTER_VALIDATE_URL)){
        $pImageErr = "Enter a valid URL";
        $validate = false;
    }
    if(intval($productPrice) < 0){
        $pPriceErr = "Enter a valid price";
        $validate = false;
    }
    if(intval($productQuantity) < 0){
        $pQuantityErr = "Enter a valid Quantity";
        $validate = false;
    }
    if(strlen(trim($productDescription)) <= 0 || strlen(trim($productDescription)) > 200){
        $pDesErr = "Enter a valid Description (1-200 characters)";
        $validate = false;
    }

    if($validate){
        $insert = "INSERT INTO products (
        collection_name,
        product_name,
        product_id,
        product_img, 
        product_price,
        product_quantity,
        product_description) VALUES ('$collectionName', '$productName', '$productID', '$productImage', '$productPrice', '$productQuantity', '$productDescription')";
        $result = mysqli_query($conn, $insert);
    }
}
?>
