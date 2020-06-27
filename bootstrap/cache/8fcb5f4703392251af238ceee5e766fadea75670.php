<?php $__env->startSection("title","Edit Product"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-3">
                <?php echo $__env->make("layout/admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-9">
                <?php echo $__env->make("layout/report_message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(\App\Classes\SessionManager::has("Token_error")): ?>
                    <?php echo e(\App\Classes\SessionManager::flash("Token_error")); ?>

                <?php endif; ?>
                
                <form action="/admin/product/<?php echo e($product->id); ?>/edit" class="table-bordered pb-5 px-5" method="POST" enctype="multipart/form-data">
                    <h3 class="text-center my-4 text-info">Edit Product</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($product->name); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="any" class="form-control" id="price" name="price" value="<?php echo e($product->price); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_id">Category</label>
                                <select name="cat_id" id="cat_id" class="form-control">
                                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cat->id); ?>" 
                                            <?php echo $cat->id == $product->id ? 'selected' :''; ?>
                                            ><?php echo e($cat->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_cat_id">Sub Category</label>
                                <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                    <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sub_cat->id); ?>"
                                            <?php echo $sub_cat->id == $product->id ? 'selected':''; ?>
                                            ><?php echo e($sub_cat->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file">Image</label>
                        <input type="file" class="form-control-file bg-dark text-white" id="file" name="file">
                    </div>
                    <input type="hidden" name="old_image" value="<?php echo e($product->image); ?>">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control"><?php echo e($product->description); ?></textarea>
                    </div>
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                    <div class="row justify-content-end no-gutters">
                        <button type="reset" class="btn btn-outline-primary btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm ml-3">Update</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout/master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project1\resources\views/backend/product/edit.blade.php ENDPATH**/ ?>