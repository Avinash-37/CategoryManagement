<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $__env->yieldContent('title'); ?></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
        <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_CSS_PATH')); ?>style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_CSS_BOOTSTRAP_PATH')); ?>bootstrap.min.css">
        <script src="<?php echo e(env('APP_JS_BOOTSTRAP_PATH')); ?>jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo e(env('APP_JS_BOOTSTRAP_PATH')); ?>bootstrap.min.js"></script>
        
    </head>
    <body>

       <?php echo $__env->yieldContent('content'); ?>
       
 <script src="<?php echo e(env('APP_JS_PATH')); ?>functions.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\MylaravelTest\resources\views/header.blade.php ENDPATH**/ ?>