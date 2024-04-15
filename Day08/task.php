<html>
    <body>
        <form method="POST" action=''>
            <input type="text" name="name">
            <button type="submit" name="button">Submit</button>
        </form>
    </body>
    <?php
        if(isset($_POST['button'])){
            $name = $_POST['name'];
            echo "<h3> $name </h3>";
        }
    ?>
</html>