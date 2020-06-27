<?php $__env->startSection("title","Triple P"); ?>
<?php $__env->startSection("content"); ?>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
            <th>Total</th>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td><img src="<?php echo e($product->image); ?>" alt="" width="100px" height="100px"></td>
                <td><?php echo e($product->name); ?></td>
                <td>$<?php echo e($product->price); ?></td>
                <td>
                    <span>1</span>
                    <i class="bg-primary px-2 py-1 rounded text-white">+</i>
                    <i class="bg-primary px-2 py-1 rounded text-white">-</i>
                </td>
                <td>
                    <i class="fa fa-trash text-danger"></i>
                </td>
                <td>200</td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout/master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project1\resources\views//cart.blade.php ENDPATH**/ ?>