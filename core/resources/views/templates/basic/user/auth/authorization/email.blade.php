@extends($activeTemplate . 'layouts.front')
{{-- @section('content')
    <section class="register-section ptb-80">
        <div class="register-element-one">
            <img src="{{ asset($activeTemplateTrue . 'images/round.png') }}" alt="@lang('shape')">
        </div>
        <div class="container">
            <figure class="figure highlight-background highlight-background--lean-left">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1439px"
                    height="480px">
                    <defs>
                        <linearGradient id="PSgrad_1" x1="42.262%" x2="0%" y1="90.631%" y2="0%">
                            <stop offset="28%" stop-color="rgb(245,246,252)" stop-opacity="1" />
                            <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1" />
                        </linearGradient>

                    </defs>
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                        d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                    <path fill="url(#PSgrad_1)"
                        d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                </svg>
            </figure>
            <div class="container ">
                <div class="d-flex justify-content-center">
                    <div class="verification-code-wrapper verify-form">
                        <div class="verification-area">
                            <form action="{{ route('user.verify.email') }}" method="POST" class="submit-form">
                                @csrf
                                <p class="verification-text">@lang('A 6 digit verification code sent to your email address'):
                                    {{ showEmailAddress(auth()->user()->email) }}</p>


                                @include($activeTemplate . 'partials.verification_code')

                                <div class="mb-3">
                                    <button type="submit" class="btn--base-verify w-100">@lang('verify')</button>
                                </div>

                                <div class="mb-3">
                                    <p>
                                        @lang('If you don\'t get any code'), <a href="{{ route('user.send.verify.code', 'email') }}"
                                            class="text--base">
                                            @lang('Try again')</a>
                                    </p>


                                    <p class="text--base">@lang('If verification code not found in Inbox, Check your spam folder.')</p>


                                    @if ($errors->has('resend'))
                                        <small class="text-danger d-block">{{ $errors->first('resend') }}</small>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style') --}}





<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="{{ url('') }}/assets/image/png" href="{{ url('') }}/assets/images/icons/favicon.ico"/>
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



                <section class="register-section ptb-80">
                    <div class="register-element-one">
                        <img src="{{ asset($activeTemplateTrue . 'images/round.png') }}" alt="@lang('shape')">
                    </div>
                    <div class="container">
                        <figure class="figure highlight-background highlight-background--lean-left">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1439px"
                                height="480px">
                                <defs>
                                    <linearGradient id="PSgrad_1" x1="42.262%" x2="0%" y1="90.631%" y2="0%">
                                        <stop offset="28%" stop-color="rgb(245,246,252)" stop-opacity="1" />
                                        <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1" />
                                    </linearGradient>

                                </defs>
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                    d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                                <path fill="url(#PSgrad_1)"
                                    d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                            </svg>
                        </figure>
                        <div class="container ">
                            <div class="d-flex justify-content-center">
                                <div class="verification-code-wrapper verify-form">
                                    <div class="verification-area">
                                        <form action="{{ route('user.verify.email') }}" method="POST" class="submit-form">
                                            @csrf
                                            <p class="verification-text">@lang('A 6 digit verification code sent to your email address'):
                                                {{ showEmailAddress(auth()->user()->email) }}</p>


                                            @include($activeTemplate . 'partials.verification_code')

                                            <div class="mb-3">
                                                <button type="submit" class="btn--base-verify w-100">@lang('verify')</button>
                                            </div>

                                            <div class="mb-3">
                                                <p>
                                                    @lang('If you don\'t get any code'), <a href="{{ route('user.send.verify.code', 'email') }}"
                                                        class="text--base">
                                                        @lang('Try again')</a>
                                                </p>


                                                <p class="text--base">@lang('If verification code not found in Inbox, Check your spam folder.')</p>


                                                @if ($errors->has('resend'))
                                                    <small class="text-danger d-block">{{ $errors->first('resend') }}</small>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>







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

    <style>
        .verification-code-wrapper {
            z-index: 100;
        }

        .verify-form {
            background-color: #edeff4;
        }
    </style>

</body>
</html>


