<?php $__env->startSection("title","Category Create"); ?>

<?php $__env->startSection("content"); ?>
<div class="container my-3">
    <div class="col-md-8 offset-md-2">
        <h2 class="text-center mb-2">Category Create</h2>
    <form action="<?php echo e(routeLinking('admin/category/create')); ?>" method="POST">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <button class="btn btn-primary">Create</button>
    </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make("layout/master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project1\resources\views/backend/create.blade.php ENDPATH**/ ?>