<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('SMTP Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__("SMTP Settings")); ?></h4>
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-msg','data' => []]); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        <form action="<?php echo e(route('admin.general.smtp.settings')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="site_smtp_mail_mailer"><?php echo e(__('SMTP Driver')); ?></label>
                                <select name="site_smtp_mail_mailer" class="form-control">
                                    <option value="smtp" <?php if(get_static_option('site_smtp_mail_mailer') == 'smtp'): ?> selected <?php endif; ?>><?php echo e(__('SMTP')); ?></option>
                                    <option value="sendmail" <?php if(get_static_option('site_smtp_mail_mailer') == 'sendmail'): ?> selected <?php endif; ?>><?php echo e(__('SendMail')); ?></option>
                                    <option value="mailgun" <?php if(get_static_option('site_smtp_mail_mailer') == 'mailgun'): ?> selected <?php endif; ?>><?php echo e(__('Mailgun')); ?></option>
                                    <option value="postmark" <?php if(get_static_option('site_smtp_mail_mailer') == 'postmark'): ?> selected <?php endif; ?>><?php echo e(__('Postmark')); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_host"><?php echo e(__('SMTP Mail Host')); ?></label>
                                <input type="text" name="site_smtp_mail_host"  class="form-control" value="<?php echo e(get_static_option('site_smtp_mail_host')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_port"><?php echo e(__('SMTP Mail Port')); ?></label>
                                <select name="site_smtp_mail_port" class="form-control">
                                    <option value="587" <?php if(get_static_option('site_smtp_mail_port') == '587'): ?> selected <?php endif; ?>><?php echo e(__('587')); ?></option>
                                    <option value="465" <?php if(get_static_option('site_smtp_mail_port') == '465'): ?> selected <?php endif; ?>><?php echo e(__('465')); ?></option>
                                    <option value="25" <?php if(get_static_option('site_smtp_mail_port') == '25'): ?> selected <?php endif; ?>><?php echo e(__('25')); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_username"><?php echo e(__('SMTP Mail Username')); ?></label>
                                <input type="text" name="site_smtp_mail_username"  class="form-control" value="<?php echo e(get_static_option('site_smtp_mail_username')); ?>" id="site_smtp_mail_username">
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_password"><?php echo e(__('SMTP Mail Password')); ?></label>
                                <input type="password" name="site_smtp_mail_password"  class="form-control" value="<?php echo e(get_static_option('site_smtp_mail_password')); ?>" id="site_smtp_mail_password">
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_encryption"><?php echo e(__('SMTP Mail Encryption')); ?></label>
                                <select name="site_smtp_mail_encryption" class="form-control">
                                    <option value="none" <?php if(get_static_option('site_smtp_mail_encryption') == 'none'): ?> selected <?php endif; ?>><?php echo e(__('None')); ?></option>
                                    <option value="ssl" <?php if(get_static_option('site_smtp_mail_encryption') == 'ssl'): ?> selected <?php endif; ?>><?php echo e(__('SSL')); ?></option>
                                    <option value="tls" <?php if(get_static_option('site_smtp_mail_encryption') == 'tls'): ?> selected <?php endif; ?>><?php echo e(__('TLS')); ?></option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update SMTP Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/backend/general-settings/smtp-settings.blade.php ENDPATH**/ ?>