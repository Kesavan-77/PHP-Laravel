<!DOCTYPE html>
<html lang="en">
<?php require './manageCollectionLogic.php' ?>

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
        <hr />
    </header>
    <main>
        <div class="add-collections">
            <h3>Add Collections</h3>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="c-input">
                    <div>
                        <label>Enter collection name: </label><br>
                        <input type="text" name="c-name" placeholder="Enter collection name"><br>
                        <p><?php echo $cNameErr; ?></p>
                    </div>
                    <div>
                        <label>Description about collection: </label><br>
                        <input type="text" name="c-des" placeholder="Description about collection:"><br>
                        <p><?php echo $cDesErr ?></p>
                    </div>
                    <button type="submit" name="add-collection">Submit</button>
                </div>
            </form>
        </div>
        <div class="update-collections">
            <h3>Update Collections</h3>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="c-input">
                    <div>
                        <label for="collection">Collection:</label><br>
                        <select name="collection" id="collection">
                            <?php 
                            $sql = "SELECT collection_name FROM collections ORDER BY collection_name;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=".$row['collection_name'].">".$row['collection_name'] . "</option>";
                                }
                            } ?>
                        </select><br>
                        <p><?php echo "select one" ?></p>
                    </div>
                    <div>
                        <label>New collection name</label><br>
                        <input type="text" name="update-new" placeholder="Enter new name:"><br>
                        <p><?php echo $updateNameErr ?></p>
                    </div>
                    <button type="submit" name="update-collection">Submit</button>
                </div>
            </form>
        </div>
        <div class="detete-collections">
            <h3>Delete Collections</h3>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="c-input">
                    <div>
                        <label for="collection">Collection:</label><br>
                        <select name="deleteOption" id="collection">
                            <?php 
                            $sql = "SELECT collection_name FROM collections ORDER BY collection_name;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=".$row['collection_name'].">".$row['collection_name'] . "</option>";
                                }
                            } ?>
                        </select><br>
                    </div>
                    <button type="submit" name="delete-collection">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>