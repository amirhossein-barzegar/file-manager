<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">
    Register Account
  </div>
  <div class="card-body">
    <form method="post" action="<?php echo e(route('register')); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('post'); ?>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" value="<?php echo e(old('username')); ?>" autofocus>
        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <small class="text-danger">
            <?php echo e($errors->first('username')); ?>

          </small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
       
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" value="<?php echo e(old('password')); ?>">
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <small class="text-danger">
            <?php echo e($errors->first('password')); ?>

          </small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
       
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>">
      </div>
      <button type="submit" class="btn btn-warning">Register</button>
    </form>
    <div class="py-2">
      Do you have any account? <a class="link" href="<?php echo e(route('login')); ?>">Login here!</a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /data/data/com.termux/files/home/ubuntu-fs/root/webdesign/htdocs/file-manager/resources/views/user/register.blade.php ENDPATH**/ ?>