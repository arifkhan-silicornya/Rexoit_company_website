<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url"  content="<?php echo e(route('frontend.blog.single',$blog_post->slug)); ?>" />
    <meta property="og:type"  content="article" />
    <meta property="og:title"  content="<?php echo e($blog_post->meta_title ?? $blog_post->title); ?>" />
    <?php echo render_og_meta_image_by_attachment_id($blog_post->image); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($blog_post->meta_description); ?>">
    <meta name="tags" content="<?php echo e($blog_post->meta_tags); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e($blog_post->meta_title ?? $blog_post->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e($blog_post->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('edit_link'); ?>
    <li><a href="<?php echo e(route('admin.blog.edit',$blog_post->id)); ?>"><i class="far fa-edit"></i> <?php echo e(__('Edit Blog')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(route('frontend.blog.category',['id' => $blog_post->blog_categories_id, 'any' => Str::slug(get_blog_category_by_id($blog_post->id))])); ?>"><?php echo e(get_blog_category_by_id($blog_post->id)); ?></a></li>
    <li><?php echo e($blog_post->title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-details-content-area padding-100 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-item">
                        <div class="thumb">
                            <?php echo render_image_markup_by_attachment_id($blog_post->image,'','large'); ?>

                        </div>
                        <div class="entry-content">
                            <ul class="post-meta">
                                <li><i class="fas fa-calendar"></i> <?php echo e(date_format($blog_post->created_at,'d M Y')); ?></li>
                                <li><i class="fas fa-user"></i> <?php echo e(render_blog_author($blog_post->author)); ?></li>
                                <li>
                                    <div class="cats">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo get_blog_category_by_id($blog_post->id,'link'); ?>

                                    </div>
                                </li>
                            </ul>
                           <div class="content-area">
                               <?php echo $blog_post->content; ?>

                           </div>
                        </div>
                        <div class="blog-details-footer"><!-- entry footer -->
                            <div class="left">
                                <ul class="tags">
                                    <li class="title"><?php echo e(get_static_option("blog_single_page_".$user_select_lang_slug."_tag_title")); ?></li>
                                    <?php
                                        $all_tags = explode(',',$blog_post->tags);
                                    ?>
                                    <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('frontend.blog.tags.page',['name' => Str::slug($tag)])); ?>"><?php echo e($tag); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="right">
                                <ul class="social-share">
                                    <li class="title"><?php echo e(get_static_option("blog_single_page_".$user_select_lang_slug."_share_title")); ?></li>
                                    <?php
                                        $post_img = get_attachment_image_by_id($blog_post->image,'large');
                                        $post_img = !empty($post_img['img_url']) ? $post_img['img_url'] : '';
                                    ?>

                                    <?php echo single_post_share(route('frontend.blog.single',$blog_post->slug),$blog_post->title,$post_img); ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if(count($all_related_blog) > 1): ?>
                    <div class="related-post-area margin-top-40">
                        <div class="section-title ">
                            <h4 class="title "><?php echo e(get_static_option('blog_single_page_'.$user_select_lang_slug.'_related_post_title')); ?></h4>
                            <div class="related-news-carousel margin-top-50">
                                <?php $__currentLoopData = $all_related_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($data->id === $blog_post->id): ?> <?php continue; ?> <?php endif; ?>
                                    <div class="single-blog-grid-01">
                                        <div class="thumb">
                                            <?php echo render_image_markup_by_attachment_id($data->image); ?>

                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="<?php echo e(route('frontend.blog.single',$data->slug)); ?>"><?php echo e($data->title); ?></a></h4>
                                            <ul class="post-meta">
                                                <li><a href="<?php echo e(route('frontend.blog.single',$data->slug)); ?>"><i class="fas fa-calendar"></i> <?php echo e(date_format($data->created_at,'d M y')); ?></a></li>
                                                <li><a href="<?php echo e(route('frontend.blog.single',$data->slug)); ?>"><i class="fas fa-user"></i> <?php echo e(render_blog_author($data->author)); ?></a></li>
                                                <li>
                                                    <div class="cats"><i class="fa fa-calendar"></i>
                                                        <?php echo get_blog_category_by_id($data->id,'link'); ?>

                                                    </div>
                                                </li>
                                            </ul>
                                            <p><?php echo e($data->excerpt); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="disqus-comment-area margin-top-40">
                        <div id="disqus_thread"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                   <?php echo $__env->make('frontend.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if(!empty(get_static_option('site_disqus_key'))): ?>
        <?php echo get_static_option('site_disqus_key'); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/blogs/blog-single.blade.php ENDPATH**/ ?>