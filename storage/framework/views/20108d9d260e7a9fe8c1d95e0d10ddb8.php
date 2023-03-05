<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo e(route('home')); ?>">File Manager</a>
      <button class="btn btn-outline-danger ms-auto me-2" data-bs-toggle="modal" data-bs-target="#searchModal">
        <i class="fa fa-search"></i>
      </button>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo e(route('home')); ?>">Home</a>
            </li>
            <?php if(auth()->guard()->check()): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
            </li>
            <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
            </li>
            <?php endif; ?>
        </ul>
      </div>
  </div>
</nav>


<!-- Search Form -->
<div>
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="searchModalLabel">
                      Search Files & Users
                  </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="d-flex gap-2">
                    <input type="text" autocomplete="off" class="form-control flex-grow-1" placeholder="search ..." id="searchInput">
                    <select class="form-select flex-shrink-1" aria-label="Default select example" style="width:100px" id="searchType">
                      <option value="inFiles" selected>In Files</option>
                      <option value="inUsers">In Users</option>
                    </select>
                  </div>
                  <ul class="list-group mt-2" id="SearchUl">
                      
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>
<?php /**PATH /data/data/com.termux/files/home/ubuntu-fs/root/webdesign/htdocs/file-manager/resources/views/layouts/header.blade.php ENDPATH**/ ?>