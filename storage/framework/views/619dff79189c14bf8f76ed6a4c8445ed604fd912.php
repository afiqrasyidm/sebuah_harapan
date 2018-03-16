<?php $__env->startSection('content'); ?>

<h3> Users : <?php echo e($users); ?> </h3>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>