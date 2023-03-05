<?php $__env->startSection('title'); ?> 
 Create file
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">
    Upload File
  </div>
  <div class="card-body"> 
    <form method="post" action="<?php echo e(route('file.store', $user->username)); ?>" id="uploadForm" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <?php echo method_field('post'); ?>
      <div class="mb-3">
        <label for="name" class="form-label">Filename</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="By defalut is current time" value="<?php echo e(old('name')); ?>">
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <small class="text-danger">
            <?php echo e($errors->first('name')); ?>

          </small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      
      <div class="mb-3">
        <label for="file" class="form-label">Uploader</label>
        <input class="form-control" name="file" type="file" id="uploadFile" accept=".jpg,.jpeg,.png,.bmp,.webp,.svg,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.mp3,.mp4,.avi,.mkv" >
        <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <small class="text-danger">
            <?php echo e($errors->first('file')); ?>

          </small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Set Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Optional" value="<?php echo e(old('password')); ?>">
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <small class="text-danger">
            <?php echo e($errors->first('password')); ?>

          </s>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <button type="submit" id="uploadBtn"  class="btn btn-info text-white">Add file</button>

    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /data/data/com.termux/files/home/ubuntu-fs/root/webdesign/htdocs/file-manager/resources/views/file/create.blade.php ENDPATH**/ ?>