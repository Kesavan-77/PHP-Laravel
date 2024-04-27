<?php

$db_serverName = "localhost";
$db_username = "kesavan";
$db_password = "Kesavan@1234";

$conn = mysqli_connect($db_serverName, $db_username, $db_password);

$sql = "CREATE DATABASE IF NOT EXISTS admin_manager";
$database = mysqli_query($conn, $sql);

$sql = "USE admin_manager";
$use = mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS admin_details(
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(20),
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20)
)";
$create_table = mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS collections (
    collection_name VARCHAR(20) NOT NULL,
    collection_description VARCHAR(100)
)";        
$create_table = mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS products (
    collection_name VARCHAR(20) NOT NULL,
    product_name VARCHAR(20),
    product_img VARCHAR(100), 
    product_price VARCHAR(20),
    p_description VARCHAR(200)
)";        
$create_table = mysqli_query($conn, $sql);
?>

