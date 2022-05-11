<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Key Features')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
    <link rel="stylesheet" type="text/css" //cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" //cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" //cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" //cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0 !important;
        }
        div.dataTables_wrapper div.dataTables_length select {
            width: 60px;
            display: inline-block;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(get_static_option('home_page_variant') == '04'): ?>
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title"><?php echo e(__('New Key Features Section Settings')); ?></h4>

                            <form action="<?php echo e(route('admin.keyfeature.section')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <ul class="nav nav-tabs"  role="tablist">
                                    <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?>" data-toggle="tab" href="#home-<?php echo e($lang->slug); ?>" role="tab"  aria-selected="true"><?php echo e($lang->name); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <div class="tab-content margin-top-30" >
                                    <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="home-<?php echo e($lang->slug); ?>" role="tabpanel" >
                                        <div class="form-group">
                                            <label for="home_01_<?php echo e($lang->slug); ?>_key_feature_section_title"><?php echo e(__('Title')); ?></label>
                                            <input type="text" class="form-control"  id="home_01_<?php echo e($lang->slug); ?>_key_feature_section_title"  name="home_01_<?php echo e($lang->slug); ?>_key_feature_section_title" value="<?php echo e(get_static_option('home_01_'.$lang->slug.'_key_feature_section_title')); ?>" placeholder="<?php echo e(__('Title')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="home_01_<?php echo e($lang->slug); ?>_key_feature_section_description"><?php echo e(__('Description')); ?></label>
                                            <textarea  id="home_01_<?php echo e($lang->slug); ?>_key_feature_section_description"  name="home_01_<?php echo e($lang->slug); ?>_key_feature_section_description" class="form-control max-height-120"  cols="30" rows="10" placeholder="<?php echo e(__('Description')); ?>"><?php echo e(get_static_option('home_01_'.$lang->slug.'_key_feature_section_description')); ?></textarea>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Key Features Items')); ?></h4>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php $a=0; ?>
                            <?php $__currentLoopData = $all_key_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($a == 0): ?> active <?php endif; ?>"  data-toggle="tab" href="#slider_tab_<?php echo e($key); ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo e(get_language_by_slug($key)); ?></a>
                                </li>
                                <?php $a++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            <?php $b=0; ?>
                            <?php $__currentLoopData = $all_key_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $key_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php if($b == 0): ?> show active <?php endif; ?>" id="slider_tab_<?php echo e($key); ?>" role="tabpanel" >
                                    <div class="table-wrap table-responsive">
                                        <table class="table table-default">
                                            <thead>
                                            <th><?php echo e(__('ID')); ?></th>
                                            <th><?php echo e(__('Icon')); ?></th>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Image')); ?></th>
                                            <th><?php echo e(__('Description')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $key_feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($data->id); ?></td>
                                                    <td><i class="<?php echo e($data->icon); ?>"></i></td>
                                                    <td><?php echo e($data->title); ?></td>
                                                    <td>
                                                        <?php
                                                            $key_feature_img = get_attachment_image_by_id($data->image,null,true);
                                                            $img_url = '';
                                                        ?>
                                                        <?php if(!empty($key_feature_img)): ?>
                                                            <div class="attachment-preview">
                                                                <div class="thumbnail">
                                                                    <div class="centered">
                                                                        <img class="avatar user-thumb" src="<?php echo e($key_feature_img['img_url']); ?>" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php  $img_url = $key_feature_img['img_url']; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($data->description); ?></td>
                                                    <td>
                                                        <a tabindex="0" class="btn btn-lg btn-danger btn-sm mb-3 mr-1"
                                                           role="button"
                                                           data-toggle="popover"
                                                           data-trigger="focus"
                                                           data-html="true"
                                                           title=""
                                                           data-content="
                                                           <h6><?php echo e(__('Are you sure to delete this key features item ?')); ?></h6>
                                                           <form method='post' action='<?php echo e(route('admin.keyfeatures.delete',$data->id)); ?>'>
                                                           <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                                                           <br>
                                                            <input type='submit' class='btn btn-danger btn-sm' value='<?php echo e(__('Yes,Please')); ?>'>
                                                            </form>
                                                       ">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                        <a href="#"
                                                           data-toggle="modal"
                                                           data-target="#key_features_item_edit_modal"
                                                           class="btn btn-lg btn-primary btn-sm mb-3 mr-1 key_features_edit_btn"
                                                           data-id="<?php echo e($data->id); ?>"
                                                           data-image="<?php echo e($img_url); ?>"
                                                           data-imageid="<?php echo e($data->image); ?>"
                                                           data-title="<?php echo e($data->title); ?>"
                                                           data-lang="<?php echo e($data->lang); ?>"
                                                           data-description="<?php echo e($data->description); ?>"
                                                           data-icon="<?php echo e($data->icon); ?>"
                                                        >
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php $b++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('New Key Features')); ?></h4>
                        <form action="<?php echo e(route('admin.keyfeatures')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="languages"><?php echo e(__('Languages')); ?></label>
                                <select name="lang" class="form-control" id="languages">
                                    <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title')); ?></label>
                                <input type="text" class="form-control"  id="title"  name="title" placeholder="<?php echo e(__('Title')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="icon" class="d-block"><?php echo e(__('Icon')); ?></label>
                                <div class="btn-group ">
                                    <button type="button" class="btn btn-primary iconpicker-component">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </button>
                                    <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                            data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu"></div>
                                </div>
                                <input type="hidden" class="form-control"  id="icon" value="fas fa-exclamation-triangle" name="icon">
                            </div>
                            <div class="form-group">
                                <label for="description"><?php echo e(__('Description')); ?></label>
                                <textarea  id="description"  name="description" class="form-control max-height-120" cols="30" rows="10" placeholder="<?php echo e(__('Description')); ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="image">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Key Feature Image" data-modaltitle="Upload Key Feature Image" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__('Upload Image')); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('recommended image size is 370x250 pixel')); ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Add  New Key Features')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="key_features_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Key Feature Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.keyfeatures.update')); ?>" id="key_featrues_edit_modal_form"  method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="key_features_id" value="">
                        <div class="form-group">
                            <label for="edit_languages"><?php echo e(__('Languages')); ?></label>
                            <select name="lang" class="form-control" id="edit_languages">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_title"><?php echo e(__('Title')); ?></label>
                            <input type="text" class="form-control"  id="edit_title" name="title" placeholder="<?php echo e(__('Title')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon" class="d-block"><?php echo e(__('Icon')); ?></label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control"  id="edit_icon" value="fas fa-exclamation-triangle" name="icon">
                        </div>
                        <div class="form-group">
                            <label for="edit_description"><?php echo e(__('Description')); ?></label>
                            <textarea  id="edit_description"  name="description" class="form-control max-height-120" cols="30" rows="10" placeholder="<?php echo e(__('Description')); ?>"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" name="image">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Key Feature Image" data-modaltitle="Upload Key Feature Image" data-toggle="modal" data-target="#media_upload_modal">
                                    <?php echo e(__('Upload Image')); ?>

                                </button>
                            </div>
                            <small><?php echo e(__('recommended image size is 370x250 pixel')); ?></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).ready(function () {
            $(document).on('click','.key_features_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var title = el.data('title');
                var icon = el.data('icon');
                var description = el.data('description');
                var form = $('#key_featrues_edit_modal_form');
                var image = el.data('image');
                var imageid = el.data('imageid');

                form.find('#key_features_id').val(id);
                form.find('#edit_title').val(title);
                form.find('#edit_icon').val(icon);
                form.find('#edit_description').val(description);
                form.find('#edit_languages option[value="'+el.data('lang')+'"]').attr('selected',true);
                form.find('.icp-dd').attr('data-selected',el.data('icon'));
                form.find('.iconpicker-component i').attr('class',el.data('icon'));
                form.find('#preview_image').attr('src',image);
                if(imageid != ''){
                    form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                    form.find('.media-upload-btn-wrapper input').val(imageid);
                    form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }
            });

            $('.icp-dd').iconpicker();
            $('.icp-dd').on('iconpickerSelected', function (e) {
                var selectedIcon = e.iconpickerValue;
                $(this).parent().parent().children('input').val(selectedIcon);
            });
        });
    </script>
    <!-- Start datatable js -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.table-wrap > table').DataTable( {
                "order": [[ 0, "desc" ]]
            } );


        } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/backend/pages/key-features.blade.php ENDPATH**/ ?>