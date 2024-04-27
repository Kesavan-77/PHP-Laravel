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
        <hr />
    </header>
    <main>
        <div class="add-product">
        <h3>Add Products</h3>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="p-input">
                    <div>
                        <label>Enter collection name: </label>
                        <input type="text" name="cp-name" placeholder="Enter collection name">
                    </div>
                    <div>
                        <label>Enter Product name: </label>
                        <input type="text" name="p-name" placeholder="Enter product name">
                    </div>
                    <div>
                        <label>Enter Image Url: </label>
                        <input type="text" name="p-image" placeholder="Enter image url">
                    </div>
                    <div>
                        <label>Enter product price in rupees: </label>
                        <input type="text" name="p-price" placeholder="Enter product price">
                    </div>
                    <div>
                        <label>Description about Product: </label>
                        <input type="text" name="p-des" placeholder="Description about product:">
                    </div>
                    <button type="submit" name="add-product">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>