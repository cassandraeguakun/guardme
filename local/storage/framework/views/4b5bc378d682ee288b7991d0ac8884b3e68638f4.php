<?php $__env->startSection('content'); ?>
<?php echo $__env->make('style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="headerbg">
  <div class="row">
    <div class="col-md-12" align="center">
      <h1><?php echo session('confirmation_title'); ?></h1>
    </div>
  </div>
</div>
<div class="height30"></div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="text-center" style="margin-top: 40px; margin-bottom: 40px;">
            <?php echo session('confirmation_message'); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>