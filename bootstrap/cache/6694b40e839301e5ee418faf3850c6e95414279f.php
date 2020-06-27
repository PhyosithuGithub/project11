<?php if(isset($errors)): ?>
    <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo e($error); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(isset($success)): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo e($success); ?></strong>
    <button class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x</span>
    </button>
  </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\project1\resources\views/layout/report_message.blade.php ENDPATH**/ ?>