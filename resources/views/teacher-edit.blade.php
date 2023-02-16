<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('update.teacher', $teacher->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <input type="text" name="name" placeholder="name" value="{{ $teacher->name }}"><br>
            <input type="email" name="email" placeholder="email" value="{{ $teacher->email }}"><br>
            <input type="phone" name="phone" placeholder="phone" value="{{ $teacher->phone }}"><br>
            <input type="password" name="password" placeholder="password"><br>
            <input type="password" name="password_confirmation" placeholder="password Confirmation"><br>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>