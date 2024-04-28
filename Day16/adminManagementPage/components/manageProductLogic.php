<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require './myDB.php';

$cNameErr = 'max 10 characters';
$pnameErr = 'max 20 characters';
$pImageErr = '';
$pPriceErr = '';
$pIDErr = '';
$pDesErr = 'max 200 characters';
$pQuantityErr = '';

if(isset($_POST['add-product'])){
    $collectionName = $_POST['addCollection'];
    $productName = $_POST['p-name'];
    $productID = $_POST['p-id'];
    $productImage = $_POST['p-image'];
    $productPrice = $_POST['p-price'];
    $productPrice = trim($productPrice);
    $productQuantity = $_POST['p-quantity'];
    $productDescription = $_POST['p-des'];

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
    if(!is_numeric($productID) || $productID < 0){
        $pIDErr = "Enter a valid ID";
        $validate = false;
    }
    if(!is_numeric($productPrice) || !($productPrice >= 0)){
        $pPriceErr = "Enter a valid price";
        $validate = false;
    }
    if(!is_numeric($productQuantity) || !($productQuantity >= 0)){
        $pQuantityErr = "Enter a valid Quantity";
        $validate = false;
    }
    if(strlen(trim($productDescription)) <= 0 || strlen(trim($productDescription)) > 200){
        $pDesErr = "Enter a valid Description (1-200 characters)";
        $validate = false;
    }

    $sql = "SELECT product_id FROM products where product_id='$productID'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        $pIDErr = "product id already exist";
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
        if($result){
            header("location: dashboard.php");
        }
    }
}

$uProductIDErr = '';

if(isset($_POST['update-product'])){
    $uCollectionName = $_POST['updateCollection'];
    $uProductName = $_POST['up-name'];
    $uProductID = $_POST['up-id'];
    $uProductImage = $_POST['up-image'];
    $uProductPrice = $_POST['up-price'];
    $uProductPrice = trim($uProductPrice);
    $uProductQuantity = $_POST['up-quantity'];
    $uProductDescription = $_POST['up-des'];

    $validate = true;


    if(strlen(trim($uProductName)) > 0){

        $sql = "SELECT * FROM products where product_id='$uProductID' and collection_name = '$uCollectionName' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $sql = "UPDATE products SET product_name = ' $uProductName' WHERE product_id = '$uProductID' and collection_name = '$uCollectionName' ";
            $res = mysqli_query($conn, $sql);
        }else{
            $uProductIDErr = "does not have id number in the selected collection";
        }
    }

    if (filter_var($uProductImage, FILTER_VALIDATE_URL)){
        $sql = "SELECT * FROM products where product_id='$uProductID' and collection_name = '$uCollectionName' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $sql = "UPDATE products SET  product_img = ' $uProductImage' WHERE product_id = '$uProductID' and collection_name = '$uCollectionName' ";
            $res = mysqli_query($conn, $sql);
        }else{
            $uProductIDErr = "does not have id number in the selected collection";
        }
    }

    if(is_numeric($uProductPrice) && ($uProductPrice > 0)){
        $sql = "SELECT * FROM products where product_id='$uProductID' and collection_name = '$uCollectionName' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $sql = "UPDATE products SET  product_price = '$uProductPrice' WHERE product_id = '$uProductID' and collection_name = '$uCollectionName' ";
            $res = mysqli_query($conn, $sql);
        }else{
            $uProductIDErr = "does not have id number in the selected collection";
        }
    }

    if(is_numeric($uProductQuantity) || ($uProductQuantity >= 0)){
        $sql = "SELECT * FROM products where product_id='$uProductID' and collection_name = '$uCollectionName' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $sql = "UPDATE products SET  product_quantity = '$uProductQuantity' WHERE product_id = '$uProductID' and collection_name = '$uCollectionName' ";
            $res = mysqli_query($conn, $sql);
        }else{
            $uProductIDErr = "does not have id number in the selected collection";
        }
    }
    if(strlen(trim($uProductDescription)) >= 1 && strlen(trim($uProductDescription)) <= 200){
        $sql = "SELECT * FROM products where product_id='$uProductID' and collection_name = '$uCollectionName' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $sql = "UPDATE products SET  product_description = '$uProductDescription' WHERE product_id = '$uProductID' and collection_name = '$uCollectionName' ";
            $res = mysqli_query($conn, $sql);
        }else{
            $uProductIDErr = "does not have id number in the selected collection";
        }
    }

}

if(isset($_POST['delete-product'])){
    
    $dCollectionName = $_POST['deleteCollection'];
    $dProductID = $_POST['dp-id'];

    $sql = "DELETE FROM products WHERE product_id = '$dProductID' and collection_name = '$dCollectionName' ";
    $result = mysqli_query($conn, $sql);


}
?>
