<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Document</title>
</head>

<body >

<form action="{{url('/user/update')}}" method="post">
    @csrf
    <table>
        <tr>
            <input type="hidden" name="id" value="{{$user->id}}">
            <td>用户名</td>
            <td><input type="text" name="username" value="{{$user->username}}"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="修改"></td>
        </tr>

    </table>
</form>

</body>

</html>
