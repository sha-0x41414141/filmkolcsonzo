<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
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
    <h1 style="text-align: center">Films</h1>
    <table>
        <tr>
            <th>Film title</th>
            <th>Film director</th>
            <th>Film year</th>
            <th>Rent</th>
            <th>Delete</th>
        </tr>
        @foreach($films as $film)
            <tr>
                <form action="{{route('films.show', $film->id)}}" methdo="post">
                    @csrf
                    <td>{{$film->film_title}}</td>
                    <td>{{$film->film_director}}</td>
                    <td>{{$film->film_year}}</td>
                    <td><button type="submit">Rent</button></td>
                </form>
                <form action="{{route('films.delete', $film->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <td><button type>Delete</button></td>
                </form>
            </tr>
        @endforeach
    </table>
</body>
</html>