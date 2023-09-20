<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($general->siteName($pageTitle ?? '')); ?></title>

    <link type="image/png" href="<?php echo e(getImage(getFilePath('logoIcon') . '/favicon.png')); ?>" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/viseradmin/css/vendor/bootstrap-toggle.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/global/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/global/css/line-awesome.min.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('style-lib'); ?>
    <link href="<?php echo e(asset('assets/viseradmin/css/vendor/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/viseradmin/css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset($activeTemplateTrue . 'css/custom.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>

    <style>
        .integration-fixed {
            position: fixed;
            z-index: 10000000
        }

        .integration-fixed__top-left {
            top: 0;
            left: 0
        }

        .integration-fixed__top-right {
            top: 0;
            right: 0
        }

        .integration-fixed__bottom-left {
            bottom: 0;
            left: 0
        }

        .integration-fixed__bottom-right {
            bottom: 0;
            right: 0
        }
    </style>


    
    <?php echo $__env->yieldContent('content'); ?>
    <script src="<?php echo e(asset('assets/global/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/viseradmin/js/vendor/bootstrap-toggle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/viseradmin/js/vendor/jquery.slimscroll.min.js')); ?>"></script>
    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('script-lib'); ?>
    <script src="<?php echo e(asset('assets/viseradmin/js/nicEdit.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/viseradmin/js/vendor/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/viseradmin/js/app.js')); ?>"></script>
    
    <script>
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });
        (function($) {
            $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
                $('.nicEdit-main').focus();
            });
        })(jQuery);
    </script>

    <?php echo $__env->yieldPushContent('script'); ?>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/templates/basic/layouts/master.blade.php ENDPATH**/ ?>