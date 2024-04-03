<html>
    <head>
        <title>File Uploads</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body class="container-sm">
        <br><br>
    <form action="./fileUploads.php" method="post" enctype="multipart/form-data">
        <h1>upload your file</h1>
        <div class="mb-3">
            <input type="file" name='file' class="form-control">
            <b>file-type: jpg,jpeg,png,pdf</b>
        </div>
        <?php
            include './upload.php';
        ?>
        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
    </form>
    </body>
</html>