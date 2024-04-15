<html>
    <head>
        <title>Bank account</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body class="container-sm">
        <br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Amount Deposit form</h1>
        <div class="mb-3">
            <label>Enter account number</label>
            <input type="number" name='acc_no' class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Enter your deposit amount</label>
            <input type="number" name='amount' class="form-control" required>
        </div>
        <button type="submit" name='deposit' class="btn btn-primary">Deposit</button>
    </form>
    <h4><?php require './deposit.php'; ?></h4>
    <br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Balance check</h1>
        <div class="mb-3">
            <label>Enter account number</label>
            <input type="number" name='acc_no_check' class="form-control" required>
        </div>
        <button type="submit" name='check' class="btn btn-success">check balance</button>
    </form>
    <h4><?php require './checkBalance.php' ?></h4>
    </body>
</html>