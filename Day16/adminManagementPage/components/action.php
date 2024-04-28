<?php
require './myDB.php';

session_start();

$admin_email = $_SESSION['admin_mail'];

$cookie_name = $email;

if (isset($_POST['action'])) {
    $sql = "SELECT * FROM products WHERE product_name!=''";

    if (isset($_POST['collection']) && !empty($_POST['collection'])) {
        $collection = implode("','", $_POST['collection']);
        $sql .= " AND collection_name IN ('$collection')";
        setcookie($cookie_name . "-collection", $collection, time() + (86400 * 30), "/");
    }

    if (isset($_POST['search']) && !empty($_POST['search'])) {
        $search = $_POST['search'];
        $sql .= " AND product_name LIKE '%$search%'";
        setcookie($cookie_name . "-search", $search, time() + (86400 * 30), "/");
    }

    if (isset($_POST['min_price'], $_POST['max-price']) && !empty($_POST['min-price']) && !empty($_POST['max_price'])){
        $min = $_POST['min_price'];
        $max = $_POST['max-price'];
        $sql .= " AND product_price >= '$min' AND product_price<='$max'";
    }
    

    $sort = '';

    if (isset($_POST['sort']) && !empty($_POST['sort'])) {
        $sort = implode("','", $_POST['sort']);

        switch ($sort) {
            case 'sort-price-low':
                $sql .= " ORDER BY product_price ASC";
                break;
            case 'sort-price-high':
                $sql .= " ORDER BY product_price DESC";
                break;
            case 'sort-name-asc':
                $sql .= " ORDER BY product_name ASC";
                break;
            case 'sort-name-desc':
                $sql .= " ORDER BY product_name DESC";
                break;
            default:
                break;
        }
        setcookie($cookie_name . "-sort", $sort, time() + (86400 * 30), "/");
    }

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product-thumbnail">
            <img src="' . $row['product_img'] . '" alt="product" height="250px" width="200px">
            <h2>' . $row['product_name'] . '</h2>
            <p>' . $row['collection_name'] . '</p>
            <h4>$' . $row['product_price'] . '</h4>
            </div>';
        }
    } else {
        echo '<p>No products available</p>';
    }
} else {

    $sql = "SELECT * FROM products WHERE product_name!=''";

    if ($_COOKIE[$cookie_name . "-collection"]) {
        $collection = $_COOKIE[$cookie_name . "-collection"];
        $sql .= " AND collection_name IN ('$collection')";
    }
    if ($_COOKIE[$cookie_name . "-search"]) {
        $search = $_COOKIE[$cookie_name . "-search"];
        $sql .= " AND product_name LIKE '%$search%'";
    }
    if ($_COOKIE[$cookie_name . "-sort"]) {
        $sort = $_COOKIE[$cookie_name . "-sort"];
        switch ($sort) {
            case 'sort-price-low':
                $sql .= " ORDER BY product_price ASC";
                break;
            case 'sort-price-high':
                $sql .= " ORDER BY product_price DESC";
                break;
            case 'sort-name-asc':
                $sql .= " ORDER BY product_name ASC";
                break;
            case 'sort-name-desc':
                $sql .= " ORDER BY product_name DESC";
                break;
            default:
                break;
        }
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product-thumbnail">
            <img src="' . $row['product_img'] . '" alt="product" height="250px" width="200px">
            <h2>' . $row['product_name'] . '</h2>
            <p>' . $row['collection_name'] . '</p>
            <h4>$' . $row['product_price'] . '</h4>
            </div>';
        }
    } else {
        echo '<p>No products available</p>';
    }
}
