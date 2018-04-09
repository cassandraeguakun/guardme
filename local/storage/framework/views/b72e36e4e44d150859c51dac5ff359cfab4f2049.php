<?php if(session('error')): ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo e(session('error')); ?>

      </div>
    </div>
  </div>
<?php endif; ?>