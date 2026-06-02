<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>user :<select name="user_id" id="">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $loan->user->id ? 'selected' : '' }}>
                        {{ $user->name }}</option>
                @endforeach
            </select></p>
        <p>item :<select name="item_id" id="">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $loan->item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select></p>
        <p>loan_date <input type="date" name="loan_date" value="{{ date('Y-m-d', strtotime($loan->loan_date)) }}">
        </p>
        <p>return_date <input type="date" name="return_date"
                value="{{ date('Y-m-d', strtotime($loan->return_date)) }}"></p>
        <p>status :<select name="status" id="">
                @foreach ($statuses as $status)
                    <option value="{{ $status }}" {{ $status == $loan->status ? 'selected' : '' }}>
                        {{ $status }}</option>
                @endforeach
            </select></p>
        <button type="submit">Tambahkan</button>
    </form>
</body>

</html>
