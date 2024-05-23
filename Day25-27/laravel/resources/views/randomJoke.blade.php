<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Bootstrap Shadow</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity=
"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <style>
        .box-shadow-hover:hover {
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.5),
                0 2px 10px 0 rgba(0, 0, 0, 1);
        }

        .pointer {
            cursor: pointer;
        }

        img {
            width: auto;
            max-height: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xl-4 my-3">
                <div class="card d-block h-100 box-shadow-hover pointer">
                    <div class="pt-3 h-75p align-items-center d-flex justify-content-center">
                        <h1>RANDOM JOKES</h1>
                    </div>

                    <div class="card-body p-4">
                        <hr />
                        <p>Joke number: {{$joke['id']}}</p>
                        <p>Joke: {{$joke['setup']}}, {{$joke['punchline']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's
        JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Include all compiled plugins (below),
            or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>
