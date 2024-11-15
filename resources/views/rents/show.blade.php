<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentals</title>
</head>
<style>
    td, th{
        padding: 15px;
    }
    table, td, th{
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
    table{
        margin: auto;
    }
</style>
<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif
    <h1 style="text-align: center;">Rentals</h1>
    <h3>Search:</h3>
    <form action="{{route('rents.show')}}" method="get">
        <label for="film_title">Film title:</label>
        <input type="text" name="film_title" id="film_title" value="{{request('film_title')}}">
        <label for="film_director">Film director:</label>
        <input type="text" name="film_director" id="film_director" value="{{request('film_director')}}">
        <label for="genre_name">Genre:</label>
        <input type="text" name="genre_name" id="genre_name" value="{{request('genre_name')}}">
        <label for="rent_start">Rent start:</label>
        <input type="date" name="rent_start" id="rent_start" value="{{request('rent_start')}}">
        <label for="rent_end">Rent end:</label>
        <input type="date" name="rent_end" id="rent_end" value="{{request('rent_end')}}">
        <button type="submit">Search</button>
        <a href="{{route('rents.show')}}">Reset</a>
    </form><br>
    <table>
        <tr>
            <th>Film title</th>
            <th>Film director</th>
            <th>Genre</th>
            <th>Rent start</th>
            <th>Rent end</th>
        </tr>
        @foreach($rents as $rent)
            <tr>
                <td>{{$rent->film->film_title}}</td>
                <td>{{$rent->film->film_director}}</td>
                <td>{{$rent->film->genre->genre_name}}</td>
                <td>{{$rent->rent_start}}</td>
                <td>{{$rent->rent_end}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>