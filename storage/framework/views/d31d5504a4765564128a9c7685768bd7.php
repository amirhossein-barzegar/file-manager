<?php $__env->startSection('title'); ?> 
 Create file
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e('@'.$user->username); ?></li>
  </ol>
</nav>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    Uploaded files
    <?php if(Gate::allows('user-owner',$user->username)): ?>
    <a href="<?php echo e(route('file.create',$user->username)); ?>" class="btn btn-sm btn-primary">Upload new one</a>
    <?php endif; ?>
  </div>
  <div class="card-body"> 
    <ul class="list-group list-group-flush border rounded">
      <?php $__empty_1 = true; $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <li class="nav-item list-group-item d-flex flex-column align-items-center">
        <div class="d-flex align-items-center justify-content-between w-100">
          <div class="d-flex align-items-center">
            <i class="<?php echo e($file->icon); ?> px-2"></i>
            <a href="<?php echo e(route('file.show', ['username' => $user->username, 'file' => $file->link])); ?>" class="nav-link text-truncate flex-shrink-1" style="max-width: 160px;">
              <?php echo e($file->full_name); ?>

            </a>
          </div>
          <div class="d-flex gap-1">
            <a href="<?php echo e(route('file.show',['username' => $user->username, 'file' => $file->link])); ?>" class="btn btn-sm btn-success" >
              <i class="fa fa-download"></i>
            </a>
            <?php if(Gate::allows('user-owner',$user->username)): ?>
            <a href="<?php echo e(route('file.edit',['username' => $user->username, 'file' => $file->id])); ?>" class="btn btn-sm btn-info text-white">
              <i class="fa fa-pencil"></i>
            </a>
            <form method="post" action="<?php echo e(route('file.destroy',['username' => $user->username, 'file' => $file->id])); ?>" class="d-inline">
              <?php echo csrf_field(); ?>
              <?php echo method_field('delete'); ?>
              <button class="btn btn-sm btn-danger">
                <i class="fa fa-close"></i>
              </button>
            </form>
            <?php endif; ?>
          </div>
        </div>
        <div class="align-self-end">
          <small class="text-muted text-right"><?php echo e($file->size); ?></small>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <li class="nav-item list-group-item d-flex flex-column align-items-center">
        <small class="text-danger">Is empty for now</small>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  // function handleEdit(id) {
  //   $.get( `/file/${id}/edit`,function(data,status) {
  //     $('#editName').val(data.name);
  //     $('#editId').val(data.id);
  //   });
  // }

  // function handleUpdate() {
  //   let id = $('#editId').val()
  //   $.post( `/file/${id}`, {
  //     name: $('#editName').val(),
  //   },function(data) {
  //     console.log(data);
  //   });
  // }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /data/data/com.termux/files/home/ubuntu-fs/root/webdesign/htdocs/file-manager/resources/views/file/index.blade.php ENDPATH**/ ?>