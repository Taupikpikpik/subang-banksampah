<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login - Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('vendor/dashboard') }}/assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/css/style.css">
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="{{ asset('vendor/dashboard') }}/assets/img/logo.png"
                    alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Login to Continue</p>
                            <form action="{{ route('login.user') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/dashboard') }}/assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('vendor/dashboard') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/dashboard') }}/assets/js/script.js"></script>
</body>

</html>
