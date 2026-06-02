<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("items.store") }}" method="POST">
        @csrf
        <p>name : <input type="text" name="name" id="" placeholder="Please enter name item"></p>
        <p>amount : <input type="number" name="amount" id="" placeholder="Please enter amamount item"></p>
        <p>status : <select name="status" id="">
            @foreach ($statuses as $status)
                <option value="{{$status}}">{{$status}}</option>
            @endforeach
        </select></p>
        <button type="submit">Tambahkan</button>
    </form>
</body>
</html>