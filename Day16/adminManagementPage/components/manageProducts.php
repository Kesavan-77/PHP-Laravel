<!DOCTYPE html>
<html lang="en">
<?php require './manageProductLogic.php';

session_start();

if (!$_SESSION['admin_mail']) {
    header("location: /main.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: /main.php");
}

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/style.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                <p>Welcome <?php echo $_SESSION['name']; ?></p>
                <div class="user">
                    <img src="../assets/image-avatar.png" alt="user" height="50px" width="50px" />
                </div>
                <form method="POST" action="" class="logout">
                    <button type="submit" name="logout" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
        <hr />
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
                            $sql = "SELECT collection_name FROM collections ORDER BY collection_name;";
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
                        <select name="updateCollection" id="update-collection">
                            <?php
                            $sql = "SELECT collection_name FROM collections ORDER BY collection_name";
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
                        <select name="up-id" id="update_product_id">
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
                    </div>
                    <div>
                        <label>Enter Image Url: </label><br>
                        <input type="text" name="up-image" placeholder="Enter image url"><br>
                    </div>
                    <div>
                        <label>Enter product price in rupees: </label><br>
                        <input type="text" name="up-price" placeholder="Enter product price"><br>
                    </div>
                    <div>
                        <label>Enter product quantity: </label><br>
                        <input type="text" name="up-quantity" placeholder="Enter product price"><br>
                    </div>
                    <div>
                        <label>Description about Product: </label><br>
                        <input type="text" name="up-des" placeholder="Description about product:"><br>
                        
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
                        <select name="deleteCollection" id="delete-collection" class="collection-dropdown">
                            <?php
                            $sql = "SELECT collection_name FROM collections ORDER BY collection_name;";
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
                        <select name="dp-id" id="delete_product_id">
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
<script>
    $(function() {
        $('#update-collection').change(function() {
            var update = 'data';
            var updateCollection = $(this).val();


            $.ajax({
                url: 'action.php',
                method: 'POST',
                data: {
                    update: update,
                    updateCollection: updateCollection
                },
                success: function(response) {
                    $('#update_product_id').html(response);
                }
            });
        })

        $('#delete-collection').change(function() {
            var update = 'data';
            var deleteCollection = $(this).val();
            $.ajax({
                url: 'action.php',
                method: 'POST',
                data: {
                    update: update,
                    deleteCollection: deleteCollection
                },
                success: function(response) {
                    $('#delete_product_id').html(response);
                }
            });
        })

    })
</script>

</html>