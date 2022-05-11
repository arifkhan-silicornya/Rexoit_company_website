<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Works')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap">
                        <h4 class="header-title"><?php echo e(__('Edit work')); ?></h4>
                            <a href="<?php echo e(route('admin.work')); ?>" class="btn btn-primary btn-xs"><i class="fas fa-angle-double-left"></i> <?php echo e(__('All Works')); ?></a>
                        </div>
                        <form action="<?php echo e(route('admin.work.update')); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo e($work_item->id); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="language"><?php echo e(__('Language')); ?></label>
                                <select name="lang" id="language" class="form-control">
                                    <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($language->slug); ?>"><?php echo e($language->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title')); ?></label>
                                <input type="text" class="form-control"  id="title"  name="title" value="<?php echo e($work_item->title); ?>">
                            </div>
                            <div class="form-group">
                                <label for="slug"><?php echo e(__('Slug')); ?></label>
                                <input type="text" class="form-control"  name="slug" value="<?php echo e($work_item->slug); ?>">
                            </div>
                            <div class="form-group">
                                <label for="description"><?php echo e(__('Description')); ?></label>
                                <input type="hidden" name="description" id="description" value="<?php echo e($work_item->description); ?>">
                                <div class="summernote"><?php echo $work_item->description; ?></div>
                            </div>
                            <div class="form-group">
                                <label for="clients"><?php echo e(__('Clients')); ?></label>
                                <input type="text" class="form-control"  id="clients"  name="clients" value="<?php echo e($work_item->clients); ?>">
                            </div>
                            <div class="form-group">
                                <label for="start_date"><?php echo e(__('Start Date')); ?></label>
                                <input type="date" class="form-control"  id="start_date"  name="start_date" value="<?php echo e($work_item->start_date); ?>">
                            </div>
                            <div class="form-group">
                                <label for="end_date"><?php echo e(__('End Date')); ?></label>
                                <input type="date" class="form-control"  id="end_date"  name="end_date" value="<?php echo e($work_item->end_date); ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories_id"><?php echo e(__('Category')); ?></label>
                                <select name="categories_id[]" multiple id="category" class="form-control nice-select wide">
                                    <option value=""><?php echo e(__('Select Category')); ?></option>

                                    <?php $__currentLoopData = $works_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(in_array($data->id,$work_item->categories_id)): ?> selected <?php endif; ?> value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meta_title"><?php echo e(__('Meta Title')); ?></label>
                                <input type="text" name="meta_title"  class="form-control" value="<?php echo e($work_item->meta_title); ?>">
                            </div>
                            <div class="form-group">
                                <label for="meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                                <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" value="<?php echo e($work_item->meta_tags); ?>">
                            </div>
                            <div class="form-group">
                                <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                                <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"><?php echo e($work_item->meta_description); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image"><?php echo e(__('Image')); ?></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php echo render_attachment_preview($work_item->image,'',true); ?>

                                    </div>
                                    <input type="hidden" name="image" value="<?php echo e($work_item->image); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Work Image" data-modaltitle="Upload Work Image" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__('Upload Image')); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="image"><?php echo e(__('Gallery')); ?></label>
                                <div class="media-upload-btn-wrapper gallery">
                                    <div class="img-wrap">
                                        <?php echo render_attachment_gallery_preview($work_item->gallery); ?>

                                    </div>
                                    <input type="hidden" name="gallery" value="<?php echo e($work_item->gallery); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="Select Image" data-modaltitle="Upload Image" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__('Upload Image')); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="status"><?php echo e(__('Status')); ?></label>
                                <select name="status" id="status" class="form-control">
                                    <option <?php if($work_item->status == 'publish'): ?> selected <?php endif; ?> value="publish"><?php echo e(__('Publish')); ?></option>
                                    <option <?php if($work_item->status == 'draft'): ?> selected <?php endif; ?> value="draft"><?php echo e(__('Draft')); ?></option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update work')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <script src="<?php echo e(asset('//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {

            $('.summernote').summernote({
                height: 250,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });

            if($('.nice-select').length > 0){
                $('.nice-select').niceSelect();
            }


            $(document).on('change','#language',function (e) {
                e.preventDefault();
                var selectedLang = $(this).val();
                $.ajax({
                    url : "<?php echo e(route('admin.work.category.by.slug')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        lang: selectedLang
                    },
                    success:function (data) {
                        $('#category').html('');
                        $.each(data,function (index,value) {
                            $('#category').append('<option value="'+value.id+'">'+value.name+'</option>');
                            $('.nice-select').niceSelect('update');
                        });
                    }
                });
            });

        });
    </script>

    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/backend/pages/works/work-edit.blade.php ENDPATH**/ ?>