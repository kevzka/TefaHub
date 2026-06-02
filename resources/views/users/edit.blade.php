<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("users.update", $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p>name : <input type="text" name="name" id="" placeholder="Please enter name user" value="{{$user->name}}"></p>
        <p>class : <input type="text" name="class" id="" placeholder="Please enter class user" value="{{$user->class}}"></p>
        <p>email : <input type="text" name="email" id="" placeholder="Please enter email user" value="{{$user->email}}"></p>
        <button type="submit">Tambahkan</button>
    </form>
</body>
</html>