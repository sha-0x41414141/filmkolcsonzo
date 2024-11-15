<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent</title>
</head>
<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif
    <h1>Rent film</h1>
    <p>Film title: <b>{{$film->film_title}}</b></p>
    <p>Film director: <b>{{$film->film_director}}</b></p>
    <p>Genre: <b>{{$film->genre->genre_name}}</b></p>
    <p>Film year: <b>{{$film->film_year}}</b></p>
</body>
</html>