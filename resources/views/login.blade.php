<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>

<form method="POST" action="{{url('user/loginStore')}} ">
    @csrf
    <label>
        <span>账号：</span>
        <input type="text" name="username" placeholder="请输入账号..."></input>
    </label>
    <br>
    <label>
        <span>密码：</span>
        <input type="password" name="password" placeholder="请输入密码..."></input>
    </label>

    <label>
        <br>
        <input type="submit">
    </label>
</form>

<script>
    function login($request){

    }
</script>

</body>

</html>


<style>
    label {
        /*border: 1px solid*/
    }
</style>
