<?php $__env->startSection("title","Triple P"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container my-3">
        
        <h3 class="text-primary">Featured</h3>
        <div class="row">
            <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card mb-2 rounded-0">
                    <div class="card-header text-center"><?php echo e($product->name); ?></div>
                    <div class="card-body">
                        <img src="<?php echo e($product->image); ?>" alt="Image" width="100px" height="120px">
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <span>$<?php echo e($product->price); ?></span>
                            <button class="btn btn-warning btn-sm" onclick="addToCart(<?php echo e($product->id); ?>)">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <hr/>
        
        <h3 class="text-primary">Most Popular</h3>
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card mb-2 rounded-0">
                    <div class="card-header text-center"><?php echo e($product->name); ?></div>
                    <div class="card-body">
                        <img src="<?php echo e($product->image); ?>" alt="Image" width="100px" height="120px">
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <span>$<?php echo e($product->price); ?></span>
                            <button class="btn btn-warning btn-sm" onclick="addToCart(<?php echo e($product->id); ?>)">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row justify-content-center">
            <?php echo $pages; ?>

        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout/master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project1\resources\views/home.blade.php ENDPATH**/ ?>