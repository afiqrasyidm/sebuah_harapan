<?php $__env->startSection('content'); ?>



<div class="row">
        <div class="col-lg-9">

          

            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thepost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <div class="media text-muted pt-3">
                        
                        <div class="pb-3 mb-0">
                            <a href="<?php echo e(route('show.single.post', ['id' => $thepost->id])); ?>" style="text-decoration: none;">
                                <h1> <?php echo e($thepost->title); ?> </h1>
                            </a>
							<p>oleh <?php echo e($thepost->name); ?> pada <?php echo e($thepost->created_at); ?></p>
							
                            <div class="text-left">
                                <a class="btn btn-md btn-outline-dark my-2 my-sm-0" href="<?php echo e(route('show.single.post', ['id' => $thepost->id])); ?>">Jawab</a>
                            </div>
                        </div>
                    </div> 
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </div>

      
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>