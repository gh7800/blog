<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User列表</title>

    <script src="../../js/layui/css/layui.css"></script>
    <script src="../../js/layui/layui.js"></script>
</head>

<body>

<form>
    @csrf
    <table>
        <tr>
            <td>id</td>
            <td>用户名</td>
            <td>密码</td>
            <td>操作</td>
        </tr>
        @foreach($user as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->username}}</td>
                <td>{{$v->password}}</td>
                <td><a href="/user/edit/{{$v->id}}">修改</a>|<a href="javascript:;" onclick="deleteUser()">删除</a></td>
            </tr>
        @endforeach
    </table>
    <style>
        table, tr, td {
            border: 1px solid black;
        }
    </style>

    <script>
        function deleteUser() {
            layer.alert('------')
        }
    </script>
</form>

</body>

</html>
