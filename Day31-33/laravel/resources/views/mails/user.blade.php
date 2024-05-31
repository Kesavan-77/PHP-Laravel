<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>mail sender</title>
</head>

<body class="container">
    <br><br>
    <form action="{{route('mail.send')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="Enter your mail ID">
        </div><br>
        <div class="form-group">
            <label for="exampleFormControlInput2">Subject</label>
            <input type="text" name="subject" class="form-control" id="exampleFormControlInput2"
                placeholder="Enter your subject">
        </div><br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Enter your message</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <button class="btn btn-primary" type="submit" onclick="loading()">
            <span class=" spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span>
            Send Mail
        </button>
    </form><br>
    @if (!empty($error))
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @elseif(!empty($success))
        <div class="alert alert-success" role="alert">
            {{ $success }}
        </div>
    @endif

</body>
<script>
    function loading() {
        document.getElementById('spinner').classList.add('spinner-border');
    }
</script>

</html>
