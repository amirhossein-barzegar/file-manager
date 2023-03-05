<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <?php echo \Livewire\Livewire::styles(); ?>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome CDN -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js','resources/scss/app.scss']); ?>
    </head>
    <body>
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
          </div>
        </div>
        
        <!-- Jquery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

        <!-- Jquery Form CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <?php echo \Livewire\Livewire::scripts(); ?>

        <?php echo $__env->yieldContent('scripts'); ?>
        <?php $__env->startSection('scripts'); ?>
        <script src="//cdn.jsdelivr.net/npm/eruda"></script>
        <script>eruda.init();</script>
        <script>
          // Ajax Search
$(document).ready(function() {
  $('#searchInput').on('keydown', function() {
    $.get('<?php echo e(route("search")); ?>',{
      _token: $('meta[name="csrf-token"]').attr('content'),
      searchInput: $(this).val(),
      searchType: $("#searchType").val()
    }, function (data) {
      let searchList = "";
      if (data.files.length > 0) {
        let resultFiles = data.files;
        for(let result in resultFiles) {
          searchList += `
          <li class="list-group-item">
            <a href="/${resultFiles[result].user.username}/file/${resultFiles[result].link}
            " class="nav-link d-flex justify-content-between align-items-center">
            <span>
              ${resultFiles[result].full_name}
            </span>  
            <small class="text-muted">
              ${resultFiles[result].size}
            </small> 
            </a>  
          </li>`;
        }
      } if (data.users.length > 0) {
        let resultUsers = data.users;
        for(let result in resultUsers) {
          searchList += `
          <li class="list-group-item">
            <a href="/${resultUsers[result].username}/file/" class="nav-link d-flex justify-content-between align-items-center">
              <span>${'<span class="px-1">@</span>'+resultUsers[result].username}</span>  
                ${resultUsers[result].files.length ? (resultUsers[result].files.length > 1 ? '<small class="text-info">Have '+resultUsers[result].files.length+' files</small>' : '<small class="text-info">Have one file</small>') :'<small class="text-danger">Empty</small>'}
            </a>  
          </li>`;
        }
      }
      if (searchList == "") {
        searchList += `
          <li class="list-group-item text-danger">
              Nothing was found!  
          </li>`; 
      }
      $('#SearchUl').html(searchList);
    });
  });
});
        </script>
    </body>
</html>
<?php /**PATH /data/data/com.termux/files/home/ubuntu-fs/root/webdesign/htdocs/file-manager/resources/views/layouts/app.blade.php ENDPATH**/ ?>