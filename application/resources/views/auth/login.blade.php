<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Sign in | DILG-BOHOL</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/images/img/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/img/favicons.ico') }}">
    <link href="{{ asset('/assets/vendor/semantic-ui/semantic.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/auth.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <img src="{{ asset('/assets/images/img/logo1.png') }}"
                    style="width: 100px; display:block; margin-left: auto; margin-right:auto; margin-bottom: 5px;"
                    alt="DILG">
                <p style="text-align:center; font-weight: 700; font-size: 22px;">Department of the Interior and Local
                    Government <br>
                    <span style="font-size: 15px;">Bohol Province</span>
                </p>
                <div class="auth-box">

                    <div class="content">
                        <div class="header">
                            <div class="logo align-center">
                                <p style="text-align:center; font-weight: 800; font-size: 20px;">Attendance Monitoring
                                    System</p>
                            </div>

                            <p class="lead" style="font-size: 15px;">{{ __('Sign in to your account') }}</p>
                        </div>
                        <form class="form-auth-small ui form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="fields">
                                <div class="sixteen wide field {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="color-white">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="" name="email"
                                        value="{{ old('email') }}"
                                        placeholder="{{ __('Enter your e-mail address') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="fields">
                                <div class="sixteen wide field {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="color-white">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="" name="password"
                                        placeholder="{{ __('Enter your password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="fields">
                                <div class="sixteen wide field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="color-white">{{ __('Remember me') }}</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ui blue button large fluid"
                                style="margin-bottom: 20px;">{{ __('SIGN IN') }}</button>
                        </form>
                    </div>
                </div>
                <p style="text-align:center; color:dimgray; font-weight: 300; margin-top: 2px;">&copy;DILG - Bohol
                    Province</p>
                <div class="dropup">
                    <button class="dropbtn">Developers</button>
                    <div class="dropup-content">

                        <a href="#">Vienna Rose Pepito</a>
                        <a href="#">Kenn Secusana</a>
                        <a href="#">Chadie Gil Augis</a>
                        <a href="#">Franklin Pogoy</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/vendor/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/semantic-ui/semantic.min.js') }}"></script>
    <script>
        $('.ui.checkbox').checkbox('uncheck', 'toggle');
    </script>


</body>

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>



</html>

<style scoped>
    .bg {
        animation: slide 3s ease-in-out infinite alternate;
        background-image: linear-gradient(-60deg, rgb(192, 191, 191) 50%, white 50%);
        bottom: 0;
        left: -50%;
        opacity: .5;
        position: fixed;
        right: -50%;
        top: 0;
        z-index: -1;
    }

    .bg2 {
        animation-direction: alternate-reverse;
        animation-duration: 4s;
    }

    .bg3 {
        animation-duration: 5s;
    }

    @keyframes slide {
        0% {
            transform: translateX(-25%);
        }

        100% {
            transform: translateX(25%);
        }
    }


    .dropbtn {
        background-color: #3498DB;
        color: white;
        padding: 8px;
        font-size: 10px;
        border: none;
    }

    .dropup {
        position: absolute;
        left: 0;
        bottom: 0;
        height: 26px;
        color: white;
        text-align: center;
        margin: auto;
    }

    .dropup-content {
        display: none;
        position: absolute;
        min-width: 155px;
        bottom: 50px;
        z-index: 1;
        background-color: #3498DB;
    }

    .dropup-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropup-content a:hover {
        background-color: #ccc
    }

    .dropup:hover .dropup-content {
        display: block;
    }

    .dropup:hover .dropbtn {
        background-color: #2980B9;
    }
</style>
