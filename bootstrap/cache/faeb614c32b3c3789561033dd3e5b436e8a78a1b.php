<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent("title"); ?></title>
    <link rel="Shortcut icon" href="<?php echo e(asset('images/ec.jpg')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
</head>
<body>
    <?php echo $__env->make("layout/navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent("content"); ?>
    
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    
    <?php echo $__env->yieldContent("script"); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\project1\resources\views/layout/master.blade.php ENDPATH**/ ?>