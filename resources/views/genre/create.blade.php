<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New genre</title>
</head>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif
    <h1>New genre</h1>
    <form action="{{route('genre.store')}}" method="post">
        @csrf
        <label for="genre_name">Genre name: </label>
        <input type="text" name="genre_name" id="genre_name"> <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>