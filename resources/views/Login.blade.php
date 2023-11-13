<?php
$statuswork = 2;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>แจ้งปัญหา</title>
    <link rel="stylesheet" href="{{ asset('/css/welcome.css') }} ">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ Route('welcome') }}">หน้าแรก</a></li>
            <li><a href="{{ Route('problem') }}">แจ้งปัญหา</a></li>
            <li><a href="{{ Route('Login') }}" class="active">เข้าสู่ระบบ</a></li>
        </ul>
    </div>

    <div class="card-login">
        @if(isset($error))
        <div class="alert-text" align="center">ID หรือ Password ไม่ถูกต้อง</div>
        @endif
        <form action="{{ Route('checklogin') }}" method="post">
            @csrf
            <table>
                <tr>
                    <td align="right"><label for="">ID : </label></td>
                    <td><input type="text" name="Username" id=""></td>
                </tr>
                <tr>
                    <td><label for="">Password : </label></td>
                    <td><input type="password" name="Password" id=""></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><button class="btn-Login" type="submit">Login</button></td>
                </tr>
            </table>
        </form>

    </div>
</body>
</html>