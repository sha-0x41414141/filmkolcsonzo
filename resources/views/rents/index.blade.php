<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rented</title>
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
    <h1 style="text-align:center">Rented</h1>
    <table>
        <tr>
            <th>Film title</th>
            <th>Film director</th>
            <th>Rent start</th>
            <th>Rent end</th>
        </tr>
        @foreach($rents as $rent)
            <tr>
                <td>{{$rent->film->film_title}}</td>
                <td>{{$rent->film->film_director}}</td>
                <td>{{$rent->film->rent_start}}</td>
                <td><button type="submit"></button></td>
            </tr>
        @endforeach
    </table>
</body>
</html>