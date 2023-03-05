<?php $__env->startSection('title'); ?> 
 Rename file
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">
    Rename File
  </div>
  <div class="card-body"> 
    <form method="post" action="<?php echo e(route('file.update',['username' => $user->username, 'file' => $file->id])); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <?php echo method_field('put'); ?>
      <div class="mb-3">
        <label for="name" class="form-label">Filename</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="By defalut is current time" value="<?php echo e($file->name); ?>">
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="text-danger">
            <?php echo e($errors->first('name')); ?>

          </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      
      <button type="submit" id="uploadBtn" class="btn btn-info text-white">Rename</button>

    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /data/data/com.termux/files/home/ubuntu-fs/root/webdesign/htdocs/file-manager/resources/views/file/edit.blade.php ENDPATH**/ ?>