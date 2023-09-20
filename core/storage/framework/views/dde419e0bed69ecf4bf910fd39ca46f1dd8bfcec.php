<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="<?php echo e(url('')); ?>/assets/image/png" href="<?php echo e(url('')); ?>/assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>


                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if(session()->has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('message')); ?>

                </div>
                <?php endif; ?>
                <?php if(session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session()->get('error')); ?>

                </div>
                <?php endif; ?>



                <section class="register-section ptb-80">
                    <div class="register-element-one">
                        <img src="<?php echo e(asset($activeTemplateTrue . 'images/round.png')); ?>" alt="<?php echo app('translator')->get('shape'); ?>">
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
                                        <form action="<?php echo e(route('user.verify.email')); ?>" method="POST" class="submit-form">
                                            <?php echo csrf_field(); ?>
                                            <p class="verification-text"><?php echo app('translator')->get('A 6 digit verification code sent to your email address'); ?>:
                                                <?php echo e(showEmailAddress(auth()->user()->email)); ?></p>


                                            <?php echo $__env->make($activeTemplate . 'partials.verification_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                            <div class="mb-3">
                                                <button type="submit" class="btn--base-verify w-100"><?php echo app('translator')->get('verify'); ?></button>
                                            </div>

                                            <div class="mb-3">
                                                <p>
                                                    <?php echo app('translator')->get('If you don\'t get any code'); ?>, <a href="<?php echo e(route('user.send.verify.code', 'email')); ?>"
                                                        class="text--base">
                                                        <?php echo app('translator')->get('Try again'); ?></a>
                                                </p>


                                                <p class="text--base"><?php echo app('translator')->get('If verification code not found in Inbox, Check your spam folder.'); ?></p>


                                                <?php if($errors->has('resend')): ?>
                                                    <small class="text-danger d-block"><?php echo e($errors->first('resend')); ?></small>
                                                <?php endif; ?>
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
	<script src="<?php echo e(url('')); ?>/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(url('')); ?>/assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(url('')); ?>/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo e(url('')); ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(url('')); ?>/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo e(url('')); ?>/assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(url('')); ?>/assets/vendor/countdowntime/countdowntime.js"></script>
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



<?php echo $__env->make($activeTemplate . 'layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/bplux/core/resources/views/templates/basic/user/auth/authorization/email.blade.php ENDPATH**/ ?>