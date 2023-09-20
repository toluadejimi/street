<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="{{ url('') }}/assets/image/png" href="{{ url('') }}/assets/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif


                <form class="login100-form validate-form" method="POST" action="{{ route('user.register') }}">
                    @csrf

                    <span class="login100-form-title p-b-26">
                        Join us on BPlux
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>


                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input type="text" class="input100 checkUser" name="username" value="{{ old('username') }}"
                            required>
                        <span class="focus-input100" data-placeholder="Enter username"></span>
                        <small class="text--danger usernameExist"></small>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input type="email" class="input100 checkUser"
                         name="email" value="{{ old('email') }}" required>
                        <span class="focus-input100" data-placeholder="Enter Email"></span>
                    </div>


                    <div class="wrap-input100 validate-input" >
                        <input type="password" class="input100" name="password"
                        required>
                        <span class="focus-input100" data-placeholder="Enter Password"></span>
                    </div>


                    <div class="wrap-input100 validate-input" >
                        <input type="password" class="input100" name="password_confirmation"
                        required>
                        <span class="focus-input100" data-placeholder="Confirm Password"></span>
                    </div>



                    @if ($general->agree)
                    <div class="form-group form-checkbox mb-3">
                        <input type="checkbox" id="agree" @checked(old('agree')) name="agree" required>
                        <label for="agree">@lang('I agree with')</label>
                        <span class="text--base">
                            <a href="terms">Terms and Condition </a>
                        </span>
                    </div>
                    @endif


                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Register
                            </button>
                        </div>
                    </div>

                </form>

                <div class="text-center p-t-115">
                    <span class="txt1">
                        Already had an account?
                    </span>

                    <a class="txt2" href="{{ route('user.login') }}">
                        Login
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ url('') }}/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('') }}/assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('') }}/assets/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ url('') }}/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('') }}/assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('') }}/assets/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>


    <script>
        "use strict";
        (function($) {
            @if ($mobileCode)
                $(`option[data-code={{ $mobileCode }}]`).attr('selected', '');
            @endif
            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            $('.checkUser').on('focusout', function(e) {
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>

</body>

</html>
