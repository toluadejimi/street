<?php $__env->startSection('panel'); ?>



<style>

    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:50px;
        right:40px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
      font-size:40px;
        box-shadow: 2px 2px 3px #999;
      z-index:100;
    }

</style>






    <div class="row gy-4">
        <div class="col-xxl-4 col-sm-6">
            <div class="card bg--primary has-link box--shadow2 overflow-hidden">
                <a class="item-link" href="<?php echo e(route('user.transactions')); ?>"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="la la-wallet f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white"><?php echo app('translator')->get('Balance'); ?></span>
                            <h2 class="text-white"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($widget['balance'])); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-4 col-sm-6 d-none d-lg-block">
            <div class="card bg--success has-link box--shadow2">
                <a class="item-link" href="<?php echo e(route('user.transactions')); ?>?remark=order"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="la la-money-bill f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white"><?php echo app('translator')->get('Total Spent'); ?></span>
                            <h2 class="text-white"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($widget['total_spent'])); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-4 col-sm-6 d-none d-lg-block">
            <div class="card bg--danger has-link box--shadow2">
                <a class="item-link" href="<?php echo e(route('user.transactions')); ?>"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="la la-exchange-alt f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white"><?php echo app('translator')->get('Total Transactions'); ?></span>
                            <h2 class="text-white"><?php echo e($widget['total_transaction']); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
    </div>





    </div>

    <div class="row gy-4 mt-2">

        <div class="col-xxl-4 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <a class="item-link" href="<?php echo e(route('user.voice')); ?>"></a>
                <i class="las la-phone-volume overlay-icon text-primary"></i>
                <div class="widget-two__icon b-radius--5 bg-success">
                    <i class="las la-phone-volume"></i>
                </div>
                <div class="widget-two__content">
                    <h3><?php echo app('translator')->get('Google Voice'); ?></h3>
                    <p><?php echo app('translator')->get('Buy instant google voice'); ?></p>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->

        <div class="col-xxl-4 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <a class="item-link" href="<?php echo e(route('user.instant')); ?>"></a>
                <i class="la la-signal overlay-icon text-secondary"></i>
                <div class="widget-two__icon b-radius--5 bg-secondary">
                    <i class="la la-signal"></i>
                </div>
                <div class="widget-two__content">
                    <h3><?php echo app('translator')->get('Social Media Boosting'); ?></h3>
                    <p><?php echo app('translator')->get('Get more followers, Likes, Subscribers, View etc'); ?></p>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->

        <div class="col-xxl-4 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <a class="item-link" href="<?php echo e(route('user.order.cancelled')); ?>"></a>
                <i class="las la-sms overlay-icon text--danger"></i>
                <div class="widget-two__icon b-radius--5 bg--danger">
                    <i class="las la-sms"></i>
                </div>
                <div class="widget-two__content">
                    <h3><?php echo app('translator')->get('Instant SMS Verification'); ?></h3>
                    <p><?php echo app('translator')->get('All countries and services available, on our instant sms verification'); ?></p>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->




    </div><!-- row end-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="<?php echo e($whatsapp_link); ?>" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/bplux/core/resources/views/templates/basic/user/dashboard.blade.php ENDPATH**/ ?>