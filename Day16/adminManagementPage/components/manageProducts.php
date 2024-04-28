<!DOCTYPE html>
<html lang="en">
<?php require './manageProductLogic.php' ?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/style.css" type="text/css" />
    <title>Admin Management</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="nav-brand">
                <h1 class="brand">ShopZone</h1>
            </div>
            <nav>
                <ul>
                    <a href="./collections.php">
                        <li>Collections</li>
                    </a>
                    <a href="./manageCollections.php">
                        <li>Manage Collections</li>
                    </a>
                    <a href="./manageProducts.php">
                        <li>Manage Products</li>
                    </a>
                </ul>
            </nav>
            <div class="cart-user">
                <div class="cart">
                    <img src="../assets/icon-cart.svg" alt="cart" height="30px" width="30px" onclick="showCart()" />
                </div>
                <div class="user">
                    <img src="../assets/image-avatar.png" alt="user" height="50px" width="50px" />
                </div>
            </div>
        </div>
        <hr/>
    </header>
    <main>
        <div class="add-product">
            <h3>Add Products</h3>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="p-input">
                    <div>
                        <label>Enter collection name: </label><br>
                        <select name="addCollection" id="collection">
                            <?php
                            $sql = "SELECT collection_name FROM products ORDER BY collection_name;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=" . $row['collection_name'] . ">" . $row['collection_name'] . "</option>";
                                }
                            } ?>
                        </select><br>
                    </div>
                    <div>
                        <label>Enter Product name: </label><br>
                        <input type="text" name="p-name" placeholder="Enter product name" value="<?php if (isset($productName)) echo $productName; ?>"><br>
                        <p><?php echo $pnameErr ?></p>
                    </div>
                    <div>
                        <label>Enter Product ID: </label><br>
                        <input type="text" name="p-id" placeholder="Enter product id" value="<?php if (isset($productID)) echo $productID; ?>"><br>
                        <p><?php echo $pIDErr ?></p>
                    </div>
                    <div>
                        <label>Enter Image Url: </label><br>
                        <input type="text" name="p-image" placeholder="Enter image url" value="<?php if (isset($productImage)) echo $productImage; ?>"><br>
                        <p><?php echo $pImageErr ?></p>
                    </div>
                    <div>
                        <label>Enter product price in rupees: </label><br>
                        <input type="text" name="p-price" placeholder="Enter product price" value="<?php if (isset($productPrice)) echo $productPrice; ?>"><br>
                        <p><?php echo $pPriceErr ?></p>
                    </div>
                    <div>
                        <label>Enter product quantity: </label><br>
                        <input type="text" name="p-quantity" placeholder="Enter product price" value="<?php if (isset($productQuantity)) echo $productQuantity; ?>"><br>
                        <p><?php echo $pQuantityErr ?></p>
                    </div>
                    <div>
                        <label>Description about Product: </label><br>
                        <input type="text" name="p-des" placeholder="Description about product:" value="<?php if (isset($productDescription)) echo $productDescription; ?>"><br>
                        <p><?php echo $pDesErr ?></p>
                    </div>
                    <button type="submit" name="add-product">Submit</button>
                </div>
            </form>
        </div>
        <div class="update-product">
            <h3>Update Products</h3>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="p-input">
                    <div>
                        <label>Enter collection name: </label><br>
                        <select name="updateCollection" id="collection" aria-placeholder="select">
                            <?php
                            $sql = "SELECT collection_name FROM products ORDER BY collection_name;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=" . $row['collection_name'] . ">" . $row['collection_name'] . "</option>";
                                }
                            } ?>
                        </select><br>
                    </div>
                    <div>
                        <label>Enter Product ID: </label><br>
                        <select name="up-id" id="product_id">
                            <?php
                            $sql = "SELECT product_id FROM products ORDER BY product_id";
                            $result = mysqli_query($conn, $sql);
                            
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['product_id'] . "'>" . $row['product_id'] . "</option>";
                                }
                            } else {
                                echo "<option value='no records found'>no records found</option>";
                            } ?>
                        </select><br>
                        <p><?php echo $uProductIDErr ?></p>
                    </div>

                    <div>
                        <label>Enter Product name: </label><br>
                        <input type="text" name="up-name" placeholder="Enter product name"><br>
                        <p><?php echo $pnameErr ?></p>
                    </div>
                    <div>
                        <label>Enter Image Url: </label><br>
                        <input type="text" name="up-image" placeholder="Enter image url"><br>
                        <p><?php echo $pImageErr ?></p>
                    </div>
                    <div>
                        <label>Enter product price in rupees: </label><br>
                        <input type="text" name="up-price" placeholder="Enter product price"><br>
                        <p><?php echo $pPriceErr ?></p>
                    </div>
                    <div>
                        <label>Enter product quantity: </label><br>
                        <input type="text" name="up-quantity" placeholder="Enter product price"><br>
                        <p><?php echo $pQuantityErr ?></p>
                    </div>
                    <div>
                        <label>Description about Product: </label><br>
                        <input type="text" name="up-des" placeholder="Description about product:"><br>
                        <p><?php echo $pDesErr ?></p>
                    </div>
                    <button type="submit" name="update-product">Submit</button>
                </div>
            </form>
        </div>
        <div class="delete-product">
            <h3>delete Products</h3>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="p-input">
                    <div>
                        <label>Enter collection name: </label><br>
                        <select name="deleteCollection" id="collection">
                            <?php
                            $sql = "SELECT collection_name FROM products ORDER BY collection_name;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=" . $row['collection_name'] . ">" . $row['collection_name'] . "</option>";
                                }
                            } ?>
                        </select><br>
                    </div>
                    <div>
                        <label>Enter Product ID: </label><br>
                        <select name="dp-id" id="product_id">
                            <?php
                            $sql = "SELECT product_id FROM products ORDER BY product_id";
                            $result = mysqli_query($conn, $sql);
                            
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['product_id'] . "'>" . $row['product_id'] . "</option>";
                                }
                            } else {
                                echo "<option value='no records found'>no records found</option>";
                            } ?>
                        </select><br>
                    </div>
                    <button type="submit" name="delete-product">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>


</html>