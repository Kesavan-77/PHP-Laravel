<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .img-cont {
        position: relative;
    }

    .img-cont:hover {
        opacity: 0.7;
        cursor: pointer;
    }

    .tasks:hover {
        opacity: 1;
        cursor: pointer;
    }

    .tasks {
        opacity: 0;
        position: absolute;
        display:flex;
        gap:5px;
        z-index: 40;
        top: 50%;
        left: 30%;
    }
</style>

<body class="container">
    <div>
        <br>
        <form action='{{ route('gallery.post') }}' method='POST' enctype="multipart/form-data">
            @csrf
            <label class="form-label">Add your memories in collection</label>
            <input class="form-control" name="file" type="file" id="formFile"><br>
            <input type="submit" class="btn btn-primary mb-3">
        </form>
    </div><br>
    <hr>
    <h2>My gallery</h2><br>
    <div class="d-flex gap-2 flex-wrap ">
        @foreach ($files as $file)
            <div class="img-cont">
                <img src="{{ asset('storage/' . $file->getFilename()) }}" alt="Card image" height="300px">
                <div class="tasks">
                    <form action={{ route('gallery.download') }} method="POST" enctype="multipart/form-data">@csrf<button type="submit"
                            name='file' value='{{$file->getFilename()}}' class="btn btn-primary">Download</button></form>
                    <form action={{ route('gallery.delete') }} method="POST" enctype="multipart/form-data">@csrf<button type="submit"
                            name='file' value='{{$file->getFilename()}}' class="btn btn-danger">Delete</button></form>
                </div>
            </div>
        @endforeach
    </div>
</body>
