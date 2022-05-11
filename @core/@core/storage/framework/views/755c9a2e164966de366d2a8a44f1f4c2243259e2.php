<?php $__env->startSection('site-title'); ?>
    <?php echo e($job->meta_title ?? $job->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e($job->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e($job->title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($job->meta_tags); ?>">
    <meta name="tags" content="<?php echo e($job->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('edit_link'); ?>
    <li><a href="<?php echo e(route('admin.jobs.edit',$job->id)); ?>"><i class="far fa-edit"></i> <?php echo e(__('Edit Job Post')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-job-details">
                        <ul class="job-meta-list">
                            <?php if(!empty($job->job_context)): ?>
                            <li>
                                <div class="single-job-meta-block">
                                    <h4 class="title"> <?php echo e(__('Job Context')); ?></h4>
                                    <p><?php echo e($job->job_context); ?></p>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php if(!empty($job->job_responsibility)): ?>
                            <li>
                                <div class="single-job-meta-block">
                                    <h4 class="title"><?php echo e(__('Job Responsibility')); ?></h4>
                                    <ul class="job-details-list">
                                        <?php $job_res = explode("/",$job->job_responsibility); ?>
                                        <?php $__currentLoopData = $job_res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($data); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php if(!empty($job->education_requirement)): ?>
                                <li>
                                    <div class="single-job-meta-block">
                                        <h4 class="title"> <?php echo e(__('Educational Requirement')); ?></h4>
                                        <ul class="job-details-list">
                                            <?php $job_res = explode("\n",$job->education_requirement); ?>
                                            <?php $__currentLoopData = $job_res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($data); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($job->experience_requirement)): ?>
                                <li>
                                    <div class="single-job-meta-block">
                                        <h4 class="title"> <?php echo e(__('Experience Requirement')); ?></h4>
                                        <ul class="job-details-list">
                                            <?php $job_res = explode("\n",$job->experience_requirement); ?>
                                            <?php $__currentLoopData = $job_res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($data); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($job->additional_requirement)): ?>
                            <li>
                                <div class="single-job-meta-block">
                                    <h4 class="title"> <?php echo e(__('Additional Requirement')); ?></h4>
                                    <ul class="job-details-list">
                                        <?php $job_res = explode("\n",$job->additional_requirement); ?>
                                        <?php $__currentLoopData = $job_res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($data); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php if(!empty($job->other_benefits)): ?>
                                <li>
                                    <div class="single-job-meta-block">
                                        <h4 class="title"> <?php echo e(__('Others Benefits')); ?></h4>
                                        <ul class="job-details-list">
                                            <?php $job_res = explode("\n",$job->other_benefits); ?>
                                            <?php $__currentLoopData = $job_res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($data); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <div class="apply-procedure">
                            <?php if(time() >= strtotime($job->deadline)): ?>
                                <div class="alert alert-danger margin-top-30"><?php echo e(__('Dead Line Expired')); ?></div>
                            <?php else: ?>
                                <a class="boxed-btn margin-top-30" href="<?php echo e(route('frontend.jobs.apply',$job->id)); ?>"><?php echo e(__('Apply To the job')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                            <div class="widget job_information">
                                <h2 class="widget-title"><?php echo e(__('Jobs Information')); ?></h2>
                                <ul class="job-information-list">
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="fas fa-briefcase"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><?php echo e(__('Company Name')); ?></h4>
                                                <span class="details"><?php echo e($job->company_name); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="fas fa-tags"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><?php echo e(__('Job Category')); ?></h4>
                                                <span class="details"><?php echo e($job->category->title); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><?php echo e(__('Job Position')); ?></h4>
                                                <span class="details"><?php echo e($job->position); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="far fa-folder"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><?php echo e(__('Job Type')); ?></h4>
                                                <span class="details"><?php echo e(str_replace('_',' ',$job->employment_status)); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="fas fa-wallet"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><?php echo e(__('Salary')); ?></h4>
                                                <span class="details"><?php echo e($job->salary); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><?php echo e(__('Location')); ?></h4>
                                                <span class="details"><?php echo e($job->job_location); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="far fa-calendar-alt"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><?php echo e(__('Deadline')); ?></h4>
                                                <span class="details"><?php echo e(date('d M Y',strtotime($job->deadline))); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        <div class="widget widget_nav_menu">
                            <h2 class="widget-title"><?php echo e(get_static_option('site_jobs_category_'.get_user_lang().'_title')); ?></h2>
                            <ul>
                                <?php $__currentLoopData = $all_job_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('frontend.jobs.category',['id' => $data->id,'any'=> Str::slug($data->title,'-')])); ?>"><?php echo e(ucfirst($data->title)); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/jobs/jobs-single.blade.php ENDPATH**/ ?>