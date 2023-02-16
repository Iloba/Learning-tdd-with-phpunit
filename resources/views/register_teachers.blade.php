<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <form action="{{ route('register.teacher') }}" method="POST">
        @csrf
        <div>
            <input type="text" name="name" placeholder="name"><br>
            <input type="email" name="email" placeholder="email"><br>
            <input type="phone" name="phone" placeholder="phone"><br>
            <input type="password" name="password" placeholder="password"><br>
            <input type="password" name="password_confirmation" placeholder="password Confirmation"><br>
            <button type="submit">Register</button>
        </div>
    </form>


    <br> <br>

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>
                        <a href="{{ route('edit.teacher', $teacher->id) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <p>No Registrations</p>
            @endforelse
        </tbody>
    </table>
</body>

</html>
