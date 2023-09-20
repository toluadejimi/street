<?php
    $faqContent = getContent('faq.content', true);
    $faqElements = getContent('faq.element', null, false, true);
?>

<!-- faq-section start -->
<section class="faq-section ptb-80">
    <div class="container">
        <figure class="figure highlight-background highlight-background--lean-left">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1439px"
                height="480px">
                <defs>
                    <linearGradient id="PSgrad_4" x1="42.262%" x2="0%" y1="90.631%" y2="0%">
                        <stop offset="28%" stop-color="rgb(245,246,252)" stop-opacity="1" />
                        <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1" />
                    </linearGradient>

                </defs>
                <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                    d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                <path fill="url(#PSgrad_4)"
                    d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
            </svg>
        </figure>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-header">
                    <span class="sub-title"><?php echo e(__(@$faqContent->data_values->heading)); ?></span>
                    <h2 class="section-title"><?php echo e(__(@$faqContent->data_values->sub_heading)); ?></h2>
                    <span class="title-border"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mrb-30">
                <div class="faq-wrapper">

                    <?php $__empty_1 = true; $__currentLoopData = $faqElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="faq-item <?php echo e($loop->first ? 'active open' : ''); ?>">
                            <h3 class="faq-title"><span class="title"><?php echo e(__(@$item->data_values->question)); ?>

                                </span><span class="right-icon"></span></h3>
                            <div class="faq-content">
                                <p><?php echo e(__(@$item->data_values->answer)); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center">
                            <?php echo e(__($emptyMessage)); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-lg-6 mrb-30">
                <div class="faq-thumb">
                    <img src="<?php echo e(getImage('assets/images/frontend/faq/' . @$faqContent->data_values->image, '570x400')); ?>"
                        alt="<?php echo app('translator')->get('about'); ?>">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq-section end -->
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/bplux/core/resources/views/templates/basic/sections/faq.blade.php ENDPATH**/ ?>