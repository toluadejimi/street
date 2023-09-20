<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-4 mb-30">
            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary align-items-center">
                        <div class="avatar avatar--lg">
                            <img src="<?php echo e(getImage(getFilePath('userProfile') . '/' . $user->image, getFileSize('userProfile'))); ?>"
                                alt="<?php echo app('translator')->get('Image'); ?>">
                        </div>
                        <div class="ps-3">
                            <h4 class="text--white"><?php echo e(__($user->fullname)); ?></h4>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Name'); ?>
                            <span class="fw-bold"><?php echo e(__($user->fullname)); ?></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('username'); ?>
                            <span class="fw-bold"><?php echo e(__($user->username)); ?></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Email'); ?>
                            <span class="fw-bold"><?php echo e($user->email); ?></span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title  border-bottom"><?php echo app('translator')->get('Profile Information'); ?></h5>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview"
                                                    style="background-image: url(<?php echo e(getImage(getFilePath('userProfile') . '/' . $user->image, getFileSize('userProfile'))); ?>)">
                                                    <button type="button" class="remove-image"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image"
                                                    id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success"><?php echo app('translator')->get('Upload Image'); ?></label>
                                                <small class="mt-2  "><?php echo app('translator')->get('Supported files'); ?>: <b><?php echo app('translator')->get('jpeg'); ?>,
                                                        <?php echo app('translator')->get('jpg'); ?>.</b> <?php echo app('translator')->get('Image will be resized into 350x350px'); ?> </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('First Name'); ?></label>
                                    <input class="form-control" type="text" name="firstname"
                                        value="<?php echo e($user->firstname); ?>" required>
                                </div>

                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Last Name'); ?></label>
                                    <input class="form-control" type="text" name="lastname" value="<?php echo e($user->lastname); ?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Email'); ?></label>
                                    <input class="form-control" type="email" name="email" value="<?php echo e($user->email); ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Address'); ?></label>
                                    <input type="text" class="form-control" name="address"
                                        value="<?php echo e($user->address->address); ?>">
                                </div>
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('State'); ?></label>
                                    <input type="text" class="form-control" name="state"
                                        value="<?php echo e($user->address->state); ?>">
                                </div>
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Zip Code'); ?></label>
                                    <input type="text" class="form-control" name="zip"
                                        value="<?php echo e($user->address->zip); ?>">
                                </div>

                                <div class="form-group">
                                    <label><?php echo app('translator')->get('City'); ?></label>
                                    <input type="text" class="form-control" name="city"
                                        value="<?php echo e($user->address->city); ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn--primary h-45 w-100"><?php echo app('translator')->get('Submit'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

    <?php $__env->startPush('breadcrumb-plugins'); ?>

        <a href="<?php echo e(route('user.change.password')); ?>" class="btn btn-sm btn-outline--primary"><i
                class="las la-key"></i><?php echo app('translator')->get('Password Setting'); ?></a>

    <?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/bplux/core/resources/views/templates/basic/user/profile_setting.blade.php ENDPATH**/ ?>