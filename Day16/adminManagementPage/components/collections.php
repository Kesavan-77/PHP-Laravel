<!DOCTYPE html>
<html lang="en">
<?php require './myDB.php' ?>

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
        <div class="display-collection">
            <div class="filter-section">
                <div class="filter-collection">
                    <h2>Select by collection</h2>
                    <hr>
                    <ul class="filter-collection-list">
                        <?php
                        $sql = "SELECT * FROM collections ORDER BY collection_name";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="options">
                                    <input type="checkbox" name="collection-value" value="<?php echo $row['collection_name']; ?>">
                                    <label><?php echo $row['collection_name']; ?></label>
                                </div><br>

                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div><br>
                <div class="filter-sort">
                    <h2>Select by sort</h2>
                    <hr>
                    <ul class="filter-sort-list">
                        <div class="options">
                            <input type="radio" name="collection" id="sort" value="sort-price">
                            <label for="sort">sort by price (low to high)</label><br>
                        </div><br>
                        <div class="options">
                            <input type="radio" name="collection" id="sort" value="sort-price">
                            <label for="sort">sort by price (high to low)</label><br>
                        </div><br>
                        <div class="options">
                            <input type="radio" name="collection" id="sort" value="sort-price">
                            <label for="sort">sort by name (A-Z)</label><br>
                        </div><br>
                        <div class="options">
                            <input type="radio" name="collection" id="sort" value="sort-price">
                            <label for="sort">sort by name (Z-A)</label><br>
                            <div>
                    </ul>
                </div><br>
                <div class="filter-price">
                    <h2>Select by sort</h2>
                    <hr>
                    <ul class="filter-price-list">
                        <div class="double_range_slider_box">
                            <div class="double_range_slider">
                                <span class="range_track" id="range_track"></span>

                                <label for="price">Minimum price</label><br>
                                <input type="range" class="min" min="0" max="100" value="0" step="0" /><br><br>
                                <label for="price">Maximum price</label><br>
                                <input type="range" class="max" min="0" max="100" value="20" step="0" />

                                <div class="minvalue"></div>
                                <div class="maxvalue"></div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="display-section">
                <?php
                $sql = "SELECT * FROM products";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="product-thumbnail">
                        <img src="<?php echo $row['product_img']; ?>" alt='product' height='200px' width='200px'>
                        <h2><?php echo $row['product_name'] ?></h2>
                        <p><?php echo $row['collection_name'] ?></p>
                        <h4>$<?php echo $row['product_price'] ?></h4>
                        </div>
                    <?php
                    }
                } 
                ?>
            </div>
        </div>
    </main>
</body>

</html>