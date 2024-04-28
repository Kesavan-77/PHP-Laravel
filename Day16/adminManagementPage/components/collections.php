<!DOCTYPE html>
<html lang="en">
<?php require './myDB.php';

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
                    <li><a href="./collections.php">Collections</a></li>
                    <li><a href="./manageCollections.php">Manage Collections</a></li>
                    <li><a href="./manageProducts.php">Manage Products</a></li>
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
        <div class="display-collection">
            <div class="filter-section">
                <h2>Search product</h2>
                <div class="filter-search">
                    <hr>
                    <label>Search product</label>
                    <input type="text" class="search-check search" placeholder="search product">
                </div><br>
                <div class="filter-collection">
                    <h2>Select by collection</h2>
                    <hr>
                    <ul class="filter-collection-list">
                        <?php
                        $sql = "SELECT collection_name FROM collections ORDER BY collection_name";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="options">
                                    <input type="checkbox" name="collection-value" class="product-check collection-check" value="<?php echo $row['collection_name']; ?>">
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
                            <input type="radio" name="sort" class="product-check sort" value="sort-price-low">
                            <label for="sort">sort by price (low to high)</label><br>
                        </div><br>
                        <div class="options">
                            <input type="radio" name="sort" class="product-check sort" value="sort-price-high">
                            <label for="sort">sort by price (high to low)</label><br>
                        </div><br>
                        <div class="options">
                            <input type="radio" name="sort" class="product-check sort" value="sort-name-asc">
                            <label for="sort">sort by name (A-Z)</label><br>
                        </div><br>
                        <div class="options">
                            <input type="radio" name="sort" class="product-check sort" value="sort-name-desc">
                            <label for="sort">sort by name (Z-A)</label><br>
                        </div><br>
                    </ul>
                </div><br>
                <div class="filter-price">
                    <h2>Select by price</h2>
                    <hr>
                    <ul class="filter-price-list">
                        <label for="price">0-100000</label><br><br>
                        <input type="range" id="points" name="points" min="0" max="100000" value="0">
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
                            <img src="<?php echo $row['product_img']; ?>" alt='product' height='250px' width='200px'>
                            <h2><?php echo $row['product_name'] ?></h2>
                            <p>Category: <?php echo $row['collection_name'] ?></p>
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
<script>
    $(function() {
        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {},
            success: function(response) {
                $('.display-section').html(response);
            }
        });

        $('.product-check').change(function() {
            var action = 'data';
            var collection = get_filter_data('collection-check');
            var sort = get_filter_data('sort');
            var search = $('.search').val();
            var min_price = $('#price_range_min').val();
            var max_price = $('#price_range_max').val();

            $.ajax({
                url: 'action.php',
                method: 'POST',
                data: {
                    action: action,
                    collection: collection,
                    sort: sort,
                    search: search,
                    min_price: min_price,
                    max_price: max_price
                },
                success: function(response) {
                    $('.display-section').html(response);
                }
            });
        });

        $('.search').keyup(function() {
            var action = 'data';
            var search = $('.search').val();

            $.ajax({
                url: 'action.php',
                method: 'POST',
                data: {
                    action: action,
                    search: search,
                },
                success: function(response) {
                    $('.display-section').html(response);
                }
            });
        });

        function get_filter_data(className) {
            var filterData = [];
            $('.' + className + ':checked').each(function() {
                filterData.push($(this).val());
            });
            return filterData;
        }
    });
</script>

</html>