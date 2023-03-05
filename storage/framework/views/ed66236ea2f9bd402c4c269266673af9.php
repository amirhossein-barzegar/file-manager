<?php $__env->startSection('content'); ?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('file.index',$user->username)); ?>"><?php echo e('@'.$user->username); ?></a></li>
    <li class="breadcrumb-item active text-truncate" aria-current="page"><?php echo e($file->full_name); ?></li>
  </ol>
</nav>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center text-truncate">
    <span><i class="<?php echo e($file->icon); ?> px-1"></i><?php echo e($file->full_name); ?></span>
    <span class="text-muted"><?php echo e($file->size); ?></span>
  </div>
  <div class="card-body"> 
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('file.download', ['file' => $file, 'user' => $user])->html();
} elseif ($_instance->childHasBeenRendered('EbzrYCf')) {
    $componentId = $_instance->getRenderedChildComponentId('EbzrYCf');
    $componentTag = $_instance->getRenderedChildComponentTagName('EbzrYCf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('EbzrYCf');
} else {
    $response = \Livewire\Livewire::mount('file.download', ['file' => $file, 'user' => $user]);
    $html = $response->html();
    $_instance->logRenderedChild('EbzrYCf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  $(document).ready(function() {
    $('#showTime').val()-=2;
    setTimeout(() => {
      alert('download now');
    }, 10000);
  });
  function copyPassword(this) {
    var copyText = document.getElementById("passwordCopy");
    copyText.select();
    document.execCommand("copy", false);
    this.val('copied!');
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /data/data/com.termux/files/home/ubuntu-fs/root/webdesign/htdocs/file-manager/resources/views/file/show.blade.php ENDPATH**/ ?>