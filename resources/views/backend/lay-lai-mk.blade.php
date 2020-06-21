<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Forgot Password | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset("backend/plugins/bootstrap/css/bootstrap.css")}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset("backend/plugins/node-waves/waves.css")}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset("backend/plugins/animate-css/animate.css")}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset("backend/css/style.css")}}" rel="stylesheet">
</head>

<body class="fp-page">
<div class="fp-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin<b></b></a>
        <small>Admin Davi's Bugers - Trungpv398 Design</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="forgot_password" method="POST">
                @csrf
                <div class="msg">
                    Nhập địa chỉ email của bạn mà bạn đã sử dụng để đăng ký. Chúng tôi sẽ gửi cho bạn một email với
                    tên người dùng của bạn và một liên kết để đặt lại mật khẩu của bạn.
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                    </div>
                </div>

                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">LẤY LẠI MẬT KHẨU</button>

                <div class="row m-t-20 m-b--5 align-center">
                    <a href="{{route("login-admin")}}">Đăng Nhập!</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{asset("backend/plugins/jquery/jquery.min.js")}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset("backend/plugins/bootstrap/js/bootstrap.js")}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset("backend/plugins/node-waves/waves.js")}}"></script>

<!-- Validation Plugin Js -->
<script src="{{asset("backend/plugins/jquery-validation/jquery.validate.js")}}"></script>

<!-- Custom Js -->
<script src="{{asset("backend/js/admin.js")}}"></script>
<script src="{{asset("backend/js/pages/examples/sign-up.js")}}"></script>
</body>

</html>
