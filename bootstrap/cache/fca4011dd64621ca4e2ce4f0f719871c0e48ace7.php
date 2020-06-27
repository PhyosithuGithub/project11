<?php $__env->startSection("title","Admin Panel"); ?>
<?php $__env->startSection("content"); ?>
<div class="container my-3">
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make("layout/admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
            <h1>Welcome to Admin Panel</h1>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout/master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project1\resources\views/backend/admin.blade.php ENDPATH**/ ?>