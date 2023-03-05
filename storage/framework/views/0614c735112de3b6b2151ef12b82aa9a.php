<?php $__env->startSection('content'); ?>
            <div class="card">
              <div class="card-body">
              <?php if(auth()->user()): ?>
                <h5 class="card-title">Manage your files</h5>
                <p class="card-text">You are logged in</p>
                <a href="<?php echo e(route('file.create',auth()->user()->username)); ?>" class="btn btn-info">Upload new File</a>
                <a href="<?php echo e(route('file.index',auth()->user()->username)); ?>" class="btn btn-warning">See Uploaded Files</a>
              <?php else: ?>
                <h5 class="card-title">Manage your files</h5>
                <p class="card-text">For better experience please login your account:</p>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-info">Login</a>
                <a href="<?php echo e(route('register')); ?>" class="btn btn-warning">Register</a>
              <?php endif; ?>
              <div class="mt-4">
                <h5>See other users files</h5>
                <div class="row">
                  <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <div class="col-6 my-2">
                    <div class="card">
                      <a href="<?php echo e(route('file.index',$user->username)); ?>" class="card-header nav-link">
                        <?php echo e($user->username); ?>

                      </a>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"> 
                          <?php switch(count($user->files)):
                            case (0): ?> <span class="text-danger">Empty</span> <?php break; ?>
                            <?php case (1): ?> <span class="text-info">Have one file</span> <?php break; ?>
                            <?php default: ?> <span class="text-info">Have <?php echo e(count($user->files)); ?> files</span> <?php break; ?>
                          <?php endswitch; ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <div class="text-muted">No user found.</div>
                  <?php endif; ?>
                  
                </div>
              </div>
              </div>
            
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /data/data/com.termux/files/home/ubuntu-fs/root/webdesign/htdocs/file-manager/resources/views/welcome.blade.php ENDPATH**/ ?>