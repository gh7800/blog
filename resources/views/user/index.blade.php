<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User列表</title>

    <script src="../../js/layui/css/layui.css"></script>
    <script src="../../js/layui/layui.js"></script>

    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
{{--    <script src="public/js/app.js"></script>--}}
{{--    <script src="node_modules/jquery/src/jquery.js"></script>--}}

</head>

<body>
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
            <td><a href="/user/edit/{{$v->id}}">修改</a>|<a href="javascript:" onclick="deleteUser(this,{{$v->id}})">删除</a>
            </td>
        </tr>
    @endforeach

    <style>
        table, tr, td {
            border: 1px solid black;
        }
    </style>

</table>

<script>
    // console.log($.fn.jquery)
    function deleteUser(obj,id) {
        // layer.confirm('确定要删除吗', {
        //     btn: ['确定', '取消']
        // }, function () {
            $.get('/user/del/' + id, function (data) {
                console.log(data)
                if(data.status === 0){
                    $(obj).parents('tr').remove();//移除行
                    // layer.msg(data.message,{icon:1})
                }else{
                    // layer.msg(data.message,{icon:6})
                }
            })
        // }, function () {
        //     console.log('取消')
        // })
    }
</script>

</body>

</html>
