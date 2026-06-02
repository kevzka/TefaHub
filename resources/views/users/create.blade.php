<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("users.store") }}" method="POST">
        @csrf
        <p>name : <input type="text" name="name" id="" placeholder="Please enter name user"></p>
        <p>class : <input type="text" name="class" id="" placeholder="Please enter class user"></p>
        <p>email : <input type="text" name="email" id="" placeholder="Please enter email user"></p>
        <button type="submit">Tambahkan</button>
    </form>
</body>
</html>