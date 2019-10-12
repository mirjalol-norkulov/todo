<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo</title>
</head>
<body>
<form action="{{ route('auth.logout') }}" method="post">
    {{ csrf_field() }}
    <button type="submit">Logout</button>
</form>
</body>
</html>
