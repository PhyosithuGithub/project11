<?php $__env->startSection("title","Product Home"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-3">
                <?php echo $__env->make("layout/admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-9">
                <?php if(\App\Classes\SessionManager::has("create_product_success")): ?>
                    <?php echo e(\App\Classes\SessionManager::flash("create_product_success")); ?>

                <?php endif; ?>
                <?php if(\App\Classes\SessionManager::has("delete_success")): ?>
                    <?php echo e(\App\Classes\SessionManager::flash("delete_success")); ?>

                <?php endif; ?>
                <?php if(\App\Classes\SessionManager::has("delete_fail")): ?>
                 <?php echo e(\App\Classes\SessionManager::flash("delete_fail")); ?>

                <?php endif; ?>
                
                <table class="table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->id); ?></td>
                                <td><img src="<?php echo e($product->image); ?>" alt="Image" style="max-width:80px; max-height:100px;"></td>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php echo e($product->price); ?></td>
                                <td>
                                    <a href="/admin/product/<?php echo e($product->id); ?>/edit"><i class="fa fa-edit text-warning"></i></a>
                                    <a href="/admin/product/<?php echo e($product->id); ?>/delete"><i class="fa fa-trash text-danger ml-2"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                
                <div class="mt-3 offset-md-2">
                    <?php echo $pages; ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout/master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project1\resources\views/backend/product/home.blade.php ENDPATH**/ ?>