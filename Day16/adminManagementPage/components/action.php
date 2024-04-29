<?php
require './myDB.php';

session_start();

$admin_email = $_SESSION['admin_mail'];

$cookie_name = str_replace("@gmail.com", "",$admin_email);

if (isset($_POST['update'])) {

    if (isset($_POST['updateCollection'])) {
        $updateCollection = $_POST['updateCollection'];

        $sql = "SELECT product_id FROM products where collection_name = '$updateCollection' ORDER BY product_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['product_id'] . "'>" . $row['product_id'] . "</option>";
            }
        } else {
            echo "<option value='no records found'>no records found</option>";
        }
    }

    if (isset($_POST['deleteCollection'])) {

        $deleteCollection = $_POST['deleteCollection'];
        $sql = "SELECT product_id FROM products where collection_name = '$deleteCollection' ORDER BY product_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['product_id'] . "'>" . $row['product_id'] . "</option>";
            }
        } else {
            echo "<option value='no records found'>no records found</option>";
        }
    }
}

if (isset($_POST['action'])) {
    $sql = "SELECT * FROM products WHERE product_name!=''";

    setcookie($cookie_name . "-startValue", $startValue, time() - 3600, "/");
    setcookie($cookie_name . "-endValue", $endValue, time() - 3600, "/");

    if (isset($_POST['startValue']) && isset($_POST['endValue'])) {
        $startValue = $_POST['startValue'];
        $endValue = $_POST['endValue'];

        setcookie($cookie_name . "-startValue", $startValue, time() + (86400 * 30), "/");
        setcookie($cookie_name . "-endValue", $endValue, time() + (86400 * 30), "/");

        $sql .= " AND product_price BETWEEN $startValue AND $endValue";
    }

    setcookie($cookie_name . "-collection", $collection, time() - 3600, "/");
    if (isset($_POST['collection']) && !empty($_POST['collection'])) {
        $collection = implode("','", $_POST['collection']);
        $sql .= " AND collection_name IN ('$collection')";
        setcookie($cookie_name . "-collection", $collection, time() + (86400 * 30), "/");
    }

    setcookie($cookie_name . "-search", $search, time() - 3600, "/");
    if (isset($_POST['search']) && !empty($_POST['search'])) {
        $search = $_POST['search'];
        $sql .= " AND product_name LIKE '%$search%'";
        setcookie($cookie_name . "-search", $search, time() + (86400 * 30), "/");
    }

    $sort = '';
    setcookie($cookie_name . "-sort", $sort, time() - 3600, "/");
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

    if ($result && mysqli_num_rows($result) > 0) {
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
else {

    $sql = "SELECT * FROM products WHERE product_name!=''";
    $startValue = 0;
    $endValue = 100000;
    if (isset($_COOKIE[$cookie_name . '-startValue'])) {
        $startValue = $_COOKIE[$cookie_name . '-startValue'];
    }
    if (isset($_COOKIE[$cookie_name . '-endValue'])) {
        $endValue = $_COOKIE[$cookie_name . '-endValue'];
    }
    
    if (isset($_COOKIE[$cookie_name . "-collection"])) {
        $collection = $_COOKIE[$cookie_name . "-collection"];
        $sql .= " AND collection_name IN ('$collection')";
    }
    if (isset($_COOKIE[$cookie_name . "-search"])) {
        $search = $_COOKIE[$cookie_name . "-search"];
        $sql .= " AND product_name LIKE '%$search%'";
    }
    if (isset($_COOKIE[$cookie_name . "-sort"])) {
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