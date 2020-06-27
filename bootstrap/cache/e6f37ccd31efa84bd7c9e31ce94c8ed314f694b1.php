<?php $__env->startSection("title","Register Form"); ?>
<?php $__env->startSection("content"); ?>
<div class="container my-3">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-info text-center mb-4"> Register</h3>
        <?php if(\App\Classes\SessionManager::has("error_message")): ?>
            <?php echo e(\App\Classes\SessionManager::flash("error_message")); ?>

        <?php endif; ?>
        <form action="/user/register" method="POST">
            <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control rounded-0" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control rounded-0" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control rounded-0" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control rounded-0" name="confirm_password" id="confirm_password" required>
            </div>
            <div class="row justify-content-between no-gutters">
                <strong class="text-muted">Already Member! <a href="/user/login">Please Login here!</a></strong>
                <span>
                    <button type="reset" class="btn btn-outline-primary btn-sm">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Register</button>
                </span>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout/master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project1\resources\views/user/register.blade.php ENDPATH**/ ?>