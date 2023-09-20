<div class="sidebar bg--dark">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar__main-logo"><img
                    src="<?php echo e(getImage(getFilePath('logoIcon') . '/logo.png')); ?>" alt="<?php echo app('translator')->get('image'); ?>"></a>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item <?php echo e(menuActive('admin.dashboard')); ?>">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Dashboard'); ?></span>
                    </a>
                </li>
                
                <li class="sidebar-menu-item <?php echo e(menuActive('admin.category.index')); ?>">
                    <a href="<?php echo e(route('admin.category.index')); ?>" class="nav-link ">
                        <i class="menu-icon las la-bars"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Category'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.service.index')); ?>">
                    <a href="<?php echo e(route('admin.service.index')); ?>" class="nav-link ">
                        <i class="menu-icon las la-briefcase"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Services'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.orders*', 3)); ?>">
                        <i class="menu-icon las la-file-invoice"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Manage Orders'); ?></span>

                        <?php if($pendingOrders > 0 || $processingOrders > 0): ?>
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.orders*', 2)); ?>">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.orders.index')); ?> ">
                                <a href="<?php echo e(route('admin.orders.index')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('All Orders'); ?></span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.orders.pending')); ?>">
                                <a href="<?php echo e(route('admin.orders.pending')); ?>" class="nav-link ">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Pending Orders'); ?></span>
                                    <?php if($pendingOrders): ?>
                                        <span class="menu-badge pill bg--danger ms-auto"><?php echo e($pendingOrders); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.orders.processing')); ?>  ">
                                <a href="<?php echo e(route('admin.orders.processing')); ?>" class="nav-link  ">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Processing Orders'); ?></span>
                                    <?php if($processingOrders): ?>
                                        <span class="menu-badge pill bg--danger ms-auto"><?php echo e($processingOrders); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>

                            <li class="sidebar-menu-item  <?php echo e(menuActive('admin.orders.completed')); ?>">
                                <a href="<?php echo e(route('admin.orders.completed')); ?>" class="nav-link ">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Completed Orders'); ?></span>

                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.orders.cancelled')); ?> ">
                                <a href="<?php echo e(route('admin.orders.cancelled')); ?>" class="nav-link ">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Cancelled Orders'); ?></span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item  <?php echo e(menuActive('admin.orders.refunded')); ?>">
                                <a href="<?php echo e(route('admin.orders.refunded')); ?>" class="nav-link ">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Refunded Orders'); ?></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.users*', 3)); ?>">
                        <i class="menu-icon las la-users"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Manage Users'); ?></span>

                        <?php if($bannedUsersCount > 0 || $emailUnverifiedUsersCount > 0 || $mobileUnverifiedUsersCount > 0): ?>
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.users*', 2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.active')); ?> ">
                                <a href="<?php echo e(route('admin.users.active')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Active Users'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.banned')); ?> ">
                                <a href="<?php echo e(route('admin.users.banned')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Banned Users'); ?></span>
                                    <?php if($bannedUsersCount): ?>
                                        <span class="menu-badge pill bg--danger ms-auto"><?php echo e($bannedUsersCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>

                            <li class="sidebar-menu-item  <?php echo e(menuActive('admin.users.email.unverified')); ?>">
                                <a href="<?php echo e(route('admin.users.email.unverified')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Email Unverified'); ?></span>

                                    <?php if($emailUnverifiedUsersCount): ?>
                                        <span
                                            class="menu-badge pill bg--danger ms-auto"><?php echo e($emailUnverifiedUsersCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.mobile.unverified')); ?>">
                                <a href="<?php echo e(route('admin.users.mobile.unverified')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Mobile Unverified'); ?></span>
                                    <?php if($mobileUnverifiedUsersCount): ?>
                                        <span
                                            class="menu-badge pill bg--danger ms-auto"><?php echo e($mobileUnverifiedUsersCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>


                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.with.balance')); ?>">
                                <a href="<?php echo e(route('admin.users.with.balance')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('With Balance'); ?></span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.all')); ?> ">
                                <a href="<?php echo e(route('admin.users.all')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('All Users'); ?></span>
                                </a>
                            </li>


                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.notification.all')); ?>">
                                <a href="<?php echo e(route('admin.users.notification.all')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Notification to All'); ?></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.gateway*', 2)); ?> ">
                        <ul>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.gateway.automatic.*')); ?> ">
                                <a href="<?php echo e(route('admin.gateway.automatic.index')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Automatic Gateways'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.gateway.manual.*')); ?> ">
                                <a href="<?php echo e(route('admin.gateway.manual.index')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Manual Gateways'); ?></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.deposit*', 3)); ?>">
                        <i class="menu-icon las la-file-invoice-dollar"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Deposits'); ?></span>
                        <?php if(0 < $pendingDepositsCount): ?>
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.deposit*', 2)); ?> ">
                        <ul>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.pending')); ?> ">
                                <a href="<?php echo e(route('admin.deposit.pending')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Pending Deposits'); ?></span>
                                    <?php if($pendingDepositsCount): ?>
                                        <span
                                            class="menu-badge pill bg--danger ms-auto"><?php echo e($pendingDepositsCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.approved')); ?> ">
                                <a href="<?php echo e(route('admin.deposit.approved')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Approved Deposits'); ?></span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.successful')); ?> ">
                                <a href="<?php echo e(route('admin.deposit.successful')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Successful Deposits'); ?></span>
                                </a>
                            </li>


                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.rejected')); ?> ">
                                <a href="<?php echo e(route('admin.deposit.rejected')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Rejected Deposits'); ?></span>
                                </a>
                            </li>


                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.initiated')); ?> ">

                                <a href="<?php echo e(route('admin.deposit.initiated')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Initiated Deposits'); ?></span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.list')); ?> ">
                                <a href="<?php echo e(route('admin.deposit.list')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('All Deposits'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.ticket*', 3)); ?>">
                        <i class="menu-icon la la-ticket"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Support Ticket'); ?> </span>
                        <?php if(0 < $pendingTicketCount): ?>
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.ticket*', 2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.pending')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.pending')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Pending Ticket'); ?></span>
                                    <?php if($pendingTicketCount): ?>
                                        <span
                                            class="menu-badge pill bg--danger ms-auto"><?php echo e($pendingTicketCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.closed')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.closed')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Closed Ticket'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.answered')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.answered')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Answered Ticket'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.index')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.index')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('All Ticket'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.report*', 3)); ?>">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Report'); ?> </span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.report*', 2)); ?> ">
                        <ul>
                            <li
                                class="sidebar-menu-item <?php echo e(menuActive(['admin.report.transaction', 'admin.report.transaction.search'])); ?>">
                                <a href="<?php echo e(route('admin.report.transaction')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Transaction Log'); ?></span>
                                </a>
                            </li>

                            <li
                                class="sidebar-menu-item <?php echo e(menuActive(['admin.report.login.history', 'admin.report.login.ipHistory'])); ?>">
                                <a href="<?php echo e(route('admin.report.login.history')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Login History'); ?></span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.report.notification.history')); ?>">
                                <a href="<?php echo e(route('admin.report.notification.history')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Notification History'); ?></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="sidebar-menu-item  <?php echo e(menuActive('admin.subscriber.*')); ?>">
                    <a href="<?php echo e(route('admin.subscriber.index')); ?>" class="nav-link"
                        data-default-url="<?php echo e(route('admin.subscriber.index')); ?>">
                        <i class="menu-icon las la-thumbs-up"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Subscribers'); ?> </span>
                    </a>
                </li>


                <li class="sidebar__menu-header"><?php echo app('translator')->get('Settings'); ?></li>
                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.index')); ?>">
                    <a href="<?php echo e(route('admin.setting.index')); ?>" class="nav-link">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title"><?php echo app('translator')->get('General Setting'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.system.configuration')); ?>">
                    <a href="<?php echo e(route('admin.setting.system.configuration')); ?>" class="nav-link">
                        <i class="menu-icon las la-cog"></i>
                        <span class="menu-title"><?php echo app('translator')->get('System Configuration'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.logo.icon')); ?>">
                    <a href="<?php echo e(route('admin.setting.logo.icon')); ?>" class="nav-link">
                        <i class="menu-icon las la-images"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Logo & Favicon'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.extensions.index')); ?>">
                    
                </li>

                <li class="sidebar-menu-item  <?php echo e(menuActive(['admin.language.manage', 'admin.language.key'])); ?>">
                    
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.seo')); ?>">
                    <a href="<?php echo e(route('admin.seo')); ?>" class="nav-link">
                        <i class="menu-icon las la-globe"></i>
                        <span class="menu-title"><?php echo app('translator')->get('SEO Manager'); ?></span>
                    </a>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.setting.notification*', 3)); ?>">
                        <i class="menu-icon las la-bell"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Notification Setting'); ?></span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.setting.notification*', 2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.notification.global')); ?> ">
                                <a href="<?php echo e(route('admin.setting.notification.global')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Global Template'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.notification.email')); ?> ">
                                <a href="<?php echo e(route('admin.setting.notification.email')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Email Setting'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.notification.sms')); ?> ">
                                <a href="<?php echo e(route('admin.setting.notification.sms')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('SMS Setting'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.notification.templates')); ?> ">
                                <a href="<?php echo e(route('admin.setting.notification.templates')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Notification Templates'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar__menu-header"><?php echo app('translator')->get('Frontend Manager'); ?></li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.frontend.templates')); ?>">
                    
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.frontend.manage.*')); ?>">
                    <a href="<?php echo e(route('admin.frontend.manage.pages')); ?>" class="nav-link ">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Manage Pages'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.frontend.sections*', 3)); ?>">
                        <i class="menu-icon la la-puzzle-piece"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Manage Section'); ?></span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.frontend.sections*', 2)); ?> ">
                        <ul>
                            <?php
                                $lastSegment = collect(request()->segments())->last();
                            ?>
                            <?php $__currentLoopData = getPageSections(true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $secs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($secs['builder']): ?>
                                    <li class="sidebar-menu-item  <?php if($lastSegment == $k): ?> active <?php endif; ?> ">
                                        <a href="<?php echo e(route('admin.frontend.sections', $k)); ?>" class="nav-link">
                                            <i class="menu-icon las la-dot-circle"></i>
                                            <span class="menu-title"><?php echo e(__($secs['name'])); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </li>

                <li class="sidebar__menu-header"><?php echo app('translator')->get('Extra'); ?></li>


                <li class="sidebar-menu-item <?php echo e(menuActive('admin.maintenance.mode')); ?>">
                    <a href="<?php echo e(route('admin.maintenance.mode')); ?>" class="nav-link">
                        <i class="menu-icon las la-robot"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Maintenance Mode'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.cookie')); ?>">
                    <a href="<?php echo e(route('admin.setting.cookie')); ?>" class="nav-link">
                        <i class="menu-icon las la-cookie-bite"></i>
                        <span class="menu-title"><?php echo app('translator')->get('GDPR Cookie'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.system*', 3)); ?>">
                        <i class="menu-icon la la-server"></i>
                        <span class="menu-title"><?php echo app('translator')->get('System'); ?></span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.system*', 2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.system.info')); ?> ">
                                <a href="<?php echo e(route('admin.system.info')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Application'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.system.server.info')); ?> ">
                                <a href="<?php echo e(route('admin.system.server.info')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Server'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.system.optimize')); ?> ">
                                <a href="<?php echo e(route('admin.system.optimize')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Cache'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.custom.css')); ?>">
                    
                </li>

                <li class="sidebar-menu-item  <?php echo e(menuActive('admin.request.report')); ?>">
                    
                </li>
            </ul>
            <div class="text-center mb-3 text-uppercase">
                <span class="text--primary"><?php echo e(__(systemDetails()['name'])); ?></span>
                <span class="text--success"><?php echo app('translator')->get('V'); ?><?php echo e(systemDetails()['version']); ?> </span>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->

<?php $__env->startPush('script'); ?>
    <script>
        if ($('li').hasClass('active')) {
            $('#sidebar__menuWrapper').animate({
                scrollTop: eval($(".active").offset().top - 320)
            }, 500);
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/smm/core/resources/views/admin/partials/sidenav.blade.php ENDPATH**/ ?>