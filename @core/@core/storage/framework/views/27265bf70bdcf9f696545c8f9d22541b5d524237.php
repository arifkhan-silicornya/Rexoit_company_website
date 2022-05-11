<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Header Slider')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
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

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('All Header Slider')); ?></h4>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php $a=0; ?>
                            <?php $__currentLoopData = $all_header_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li class="nav-item">
                                <a class="nav-link <?php if($a == 0): ?> active <?php endif; ?>"  data-toggle="tab" href="#slider_tab_<?php echo e($key); ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo e(get_language_by_slug($key)); ?></a>
                            </li>
                                <?php $a++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            <?php $b=0; ?>
                            <?php $__currentLoopData = $all_header_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php if($b == 0): ?> show active <?php endif; ?>" id="slider_tab_<?php echo e($key); ?>" role="tabpanel" >
                               <div class="table-wrap table-responsive">
                                   <table class="table table-default">
                                       <thead>
                                       <th><?php echo e(__('ID')); ?></th>
                                       <th><?php echo e(__('Image')); ?></th>
                                       <th><?php echo e(__('Title')); ?></th>
                                       <th><?php echo e(__('Description')); ?></th>
                                       <th><?php echo e(__('Language')); ?></th>
                                       <th><?php echo e(__('Action')); ?></th>
                                       </thead>
                                       <tbody>
                                       <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <?php $img_url =''; ?>
                                           <tr>
                                               <td><?php echo e($data->id); ?></td>
                                               <td>
                                                   <?php
                                                       $header_bg_img = get_attachment_image_by_id($data->image,null,true);
                                                       $img_url = '';
                                                   ?>
                                                   <?php if(!empty($header_bg_img)): ?>
                                                       <div class="attachment-preview">
                                                           <div class="thumbnail">
                                                               <div class="centered">
                                                                   <img class="avatar user-thumb" src="<?php echo e($header_bg_img['img_url']); ?>" alt="">
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <?php  $img_url = $header_bg_img['img_url']; ?>
                                                   <?php endif; ?>
                                               </td>
                                               <td><?php echo e($data->title); ?></td>
                                               <td><?php echo e($data->description); ?></td>
                                               <td><?php echo e(get_language_by_slug($data->lang)); ?></td>
                                               <td>
                                                   <a tabindex="0" class="btn btn-lg btn-danger btn-sm mb-3 mr-1"
                                                      role="button"
                                                      data-toggle="popover"
                                                      data-trigger="focus"
                                                      data-html="true"
                                                      title=""
                                                      data-content="
                                               <h6>Are you sure to delete this header slider item?</h6>
                                               <form method='post' action='<?php echo e(route('admin.header.delete',$data->id)); ?>'>
                                               <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                                               <br>
                                                <input type='submit' class='btn btn-danger btn-sm' value='Yes,Delete'>
                                                </form>
                                                ">
                                                       <i class="ti-trash"></i>
                                                   </a>
                                                   <a href="#"
                                                      data-toggle="modal"
                                                      data-target="#header_slider_item_edit_modal"
                                                      class="btn btn-lg btn-primary btn-sm mb-3 mr-1 header_slider_edit_btn"
                                                      data-id="<?php echo e($data->id); ?>"
                                                      data-title="<?php echo e($data->title); ?>"
                                                      data-imageid="<?php echo e($data->image); ?>"
                                                      data-image="<?php echo e($img_url); ?>"
                                                      data-lang="<?php echo e($data->lang); ?>"
                                                      data-description="<?php echo e($data->description); ?>"
                                                      data-btn_01_status="<?php echo e($data->btn_01_status); ?>"
                                                      data-btn_01_text="<?php echo e($data->btn_01_text); ?>"
                                                      data-btn_01_url="<?php echo e($data->btn_01_url); ?>"
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
                        <h4 class="header-title"><?php echo e(__('New Header Slider')); ?></h4>
                        <form action="<?php echo e(route('admin.header')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="language"><h6><strong><?php echo e(__('Languages')); ?></strong></h6></label>
                                <select name="lang" id="language" class="form-control">
                                    <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->slug); ?>"><?php echo e($data->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small><?php echo e(__("select language for make this text multilingual")); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title')); ?></label>
                                <input type="text" class="form-control"  id="title"  name="title" placeholder="<?php echo e(__('Title')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="description"><?php echo e(__('Description')); ?></label>
                                <textarea class="form-control max-height-150"  id="description"  name="description" placeholder="<?php echo e(__('Description')); ?>" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="btn_01_status"><?php echo e(__('Button Show/Hide')); ?></label>
                                <label class="switch">
                                    <input type="checkbox" name="btn_01_status" id="btn_01_status">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="btn_01_text"><?php echo e(__('Button Text')); ?></label>
                                <input type="text" class="form-control"  id="btn_01_text"  name="btn_01_text" placeholder="<?php echo e(__('Button Text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="btn_01_url"><?php echo e(__('Button URL')); ?></label>
                                <input type="text" class="form-control"  id="btn_01_url"  name="btn_01_url" placeholder="<?php echo e(__('Button URL')); ?>">
                            </div>

                            <div class="form-group">
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="image">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Slider Background" data-modaltitle="Upload Slider Background" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__('Upload Image')); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('recommended image size is 1920x900 pixel')); ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Add  New Slider')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="header_slider_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Header Slider Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.header.update')); ?>" id="header_slider_edit_modal_form"  method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="header_slider_id" value="">
                        <div class="form-group">
                            <label for="edit_language"><h6><strong><?php echo e(__('Languages')); ?></strong></h6></label>
                            <select name="lang" id="edit_language" class="form-control">
                                <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->slug); ?>"><?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <small><?php echo e(__("select language for make this text multilingual")); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_title"><?php echo e(__('Title')); ?></label>
                            <input type="text" class="form-control"  id="edit_title"  name="title" placeholder="<?php echo e(__('Title')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_description"><?php echo e(__('Description')); ?></label>
                            <textarea class="form-control max-height-150"  id="edit_description"  name="description" placeholder="<?php echo e(__('Description')); ?>" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_btn_01_status"><?php echo e(__('Button Show/Hide')); ?></label>
                            <label class="switch">
                                <input type="checkbox" name="btn_01_status" id="edit_btn_01_status">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="edit_btn_01_text"><?php echo e(__('Button Text')); ?></label>
                            <input type="text" class="form-control"  id="edit_btn_01_text"  name="btn_01_text" placeholder="<?php echo e(__('Button Text')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_btn_01_url"><?php echo e(__('Button URL')); ?></label>
                            <input type="text" class="form-control"  id="edit_btn_01_url"  name="btn_01_url" placeholder="<?php echo e(__('Button URL')); ?>">
                        </div>
                        <div class="form-group">
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" id="edit_image" name="image" value="">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Slider Background" data-modaltitle="Upload Slider Background" data-imgid="<?php echo e(auth()->user()->image); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                    <?php echo e(__('Upload Image')); ?>

                                </button>
                            </div>
                            <small><?php echo e(__('recommended image size is 1920x900 pixel')); ?></small>
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
            $(document).on('click','.header_slider_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var action = el.data('action');
                var image = el.data('image');
                var imageid = el.data('imageid');
                var form = $('#header_slider_edit_modal_form');

                form.attr('action',action);
                form.find('#header_slider_id').val(id);
                form.find('#edit_title').val(el.data('title'));
                form.find('#edit_description').val(el.data('description'));
                form.find('#edit_btn_01_text').val(el.data('btn_01_text'));
                form.find('#edit_btn_01_url').val(el.data('btn_01_url'));
                form.find('#edit_language option[value='+el.data("lang")+']').attr('selected',true);//lang

                if(imageid != ''){
                    form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                    form.find('.media-upload-btn-wrapper input').val(imageid);
                    form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }

                if(el.data('btn_01_status') != ''){
                    $('#edit_btn_01_status').prop('checked',true);
                }
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

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/backend/pages/home/header.blade.php ENDPATH**/ ?>