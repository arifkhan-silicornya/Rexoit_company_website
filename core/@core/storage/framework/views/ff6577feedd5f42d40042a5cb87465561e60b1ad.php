<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(__('Request Quote From ')); ?> <?php echo e(get_static_option('site_'.get_default_language().'_title')); ?></title>
    <style>
        .mail-container {
            max-width: 650px;
            margin: 0 auto;
            text-align: center;
        }

        .mail-container .logo-wrapper {
            background-color: #111d5c;
            padding: 20px 0 20px;
        }
        table {
            margin: 0 auto;
        }
        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #111d5c;
            color: white;
        }
        footer {
            margin: 20px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="mail-container">
        <div class="logo-wrapper">
            <a href="<?php echo e(url('/')); ?>">
                <?php
                    $site_logo = get_attachment_image_by_id(get_static_option('site_white_logo'),"full",false);
                ?>
                <?php if(!empty($site_logo)): ?>
                    <img src="<?php echo e($site_logo['img_url']); ?>" alt="<?php echo e(get_static_option('site_'.get_user_lang().'_title')); ?>">
                <?php endif; ?>
            </a>
        </div>
        <p><?php echo e(__('You Have A Quote From')); ?> <?php echo e(get_static_option('site_'.get_default_language().'_title')); ?></p>
        <table>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $name = str_replace('-',' ',$key); ?>
                <tr>
                    <td><?php echo e(ucwords($name)); ?></td>
                    <td><?php echo e($field); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <footer>
            <?php echo render_footer_copyright_text(); ?>

        </footer>
    </div>
</body>
</html><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/mail/request-quote.blade.php ENDPATH**/ ?>