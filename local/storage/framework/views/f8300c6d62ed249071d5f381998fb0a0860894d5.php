<?php $__env->startComponent('mail::message'); ?>

  One last step!
  <br>

  <?php $__env->startComponent('mail::button', ['url' => $url]); ?>

    Click here to verify your account

  <?php echo $__env->renderComponent(); ?>
  <br>

  Thanks,
  <br>
  <?php echo e(config('app.name')); ?>


<?php echo $__env->renderComponent(); ?>