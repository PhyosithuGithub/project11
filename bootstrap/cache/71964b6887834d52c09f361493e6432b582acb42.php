;
<?php $__env->startSection("title","Payment"); ?>
<?php $__env->startSection("content"); ?>
<div class="container my-5">
    <h1 class="text-success bm-font-45">Your Payment is successfully!</h1>
    <a href="/">Back to Home</a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script>
    localStorage.removeItem("products");
    localStorage.removeItem("items");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout/master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project1\resources\views/payment.blade.php ENDPATH**/ ?>