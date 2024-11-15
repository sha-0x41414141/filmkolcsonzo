<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New film</title>
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
    <h1>New film</h1>

    <form action="{{route('films.create')}}" method="post">
        @csrf
        <label for="film_title">Film title: </label>
        <input type="text" name="film_title" id="film_title"> <br>
        <label for="film_director">Flim director: </label>
        <input type="text" name="film_director" id="film_director"> <br>
        <label for="genre_id">Genre: </label>
        <select name="genre_id" id="genre_id">
            @foreach($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
            @endforeach
        </select> <br>
        <label for="film_year">Film year: </label>
        <input type="number" min="0" name="film_year" id="film_year"> <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>