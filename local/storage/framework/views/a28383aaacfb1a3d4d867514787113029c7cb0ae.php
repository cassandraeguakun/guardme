<?php $__env->startComponent('mail::message'); ?>

  You have requested to change your current email address to this email address
  <br>

  <?php $__env->startComponent('mail::button', ['url' => $url]); ?>

    Click here to verify your new email address

  <?php echo $__env->renderComponent(); ?>
  <br>

  Thanks,
  <br>
  <?php echo e(config('app.name')); ?>


<?php echo $__env->renderComponent(); ?>