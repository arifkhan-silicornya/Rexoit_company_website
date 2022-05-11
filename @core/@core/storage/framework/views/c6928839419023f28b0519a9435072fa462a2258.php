<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="<?php echo e(route('admin.home')); ?>">
                <?php
                    $logo_type = 'site_logo';
                        if(!empty(get_static_option('site_admin_dark_mode'))){
                            $logo_type = 'site_white_logo';
                        }
                ?>
                <?php echo render_image_markup_by_attachment_id(get_static_option($logo_type)); ?>

            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="main_dropdown <?php echo e(active_menu('admin-home')); ?>">
                        <a href="<?php echo e(route('admin.home')); ?>"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span><?php echo e(__('dashboard')); ?></span>
                        </a>
                    </li>
                    <?php $__currentLoopData = $all_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main_menu => $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $all_sub_menus = (array) $sub_menu; ?>
                        <?php if( get_static_option('job_module_status') != 'on' && $main_menu == 'job_post_manage' ): ?>
                            <?php continue; ?>
                        <?php elseif(get_static_option('events_module_status') != 'on' && $main_menu == 'events_manage'): ?>
                            <?php continue; ?>
                        <?php elseif(get_static_option('product_module_status') != 'on' && $main_menu == 'products_manage'): ?>
                            <?php continue; ?>
                        <?php elseif(get_static_option('donations_module_status') != 'on' && $main_menu == 'donations_manage'): ?>
                            <?php continue; ?>
                        <?php elseif(get_static_option('knowledgebase_module_status') != 'on' && $main_menu == 'knowledgebase_manage'): ?>
                            <?php continue; ?>
                        <?php elseif(get_static_option('service_module_status') != 'on' && $main_menu == 'services'): ?>
                            <?php continue; ?>
                        <?php elseif(get_static_option('works_module_status') != 'on' && $main_menu == 'works'): ?>
                            <?php continue; ?>
                        <?php elseif(get_static_option('blog_module_status') != 'on' && $main_menu == 'blogs_manage'): ?>
                            <?php continue; ?>
                        <?php elseif(get_static_option('gig_module_status') != 'on' && $main_menu == 'gigs_manage'): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <?php if(count($all_sub_menus) > 1): ?>
                            <li class="main_dropdown <?php if(in_array(request()->route()->getName(),$all_sub_menus)): ?> active <?php endif; ?>">
                                <a href="javascript:void(0)"
                                   aria-expanded="true">
                                    <i class="ti-home"></i>
                                    <span><?php echo e(__(str_replace('_',' ',$main_menu))); ?></span>
                                </a>
                                <ul class="collapse">
                                    <?php $__currentLoopData = $sub_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_name => $route_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php if(request()->routeIs($route_name)): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route($route_name)); ?>"><?php echo e(__(str_replace('_',' ',substr($item_name,1,-1)))); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <?php
                                $firstProp = current( (Array) $sub_menu );
                            ?>
                            <li class="main_dropdown <?php if(request()->routeIs($firstProp)): ?> active <?php endif; ?>">
                                <a href="<?php echo e(route($firstProp)); ?>"
                                   aria-expanded="true">
                                    <i class="ti-file"></i>
                                    <span><?php echo e(__(str_replace('_',' ',$main_menu))); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/backend/partials/sidebar.blade.php ENDPATH**/ ?>