<?php

/* @var $this yii\web\View */

$this->title = 'Backend';
?>
<div class="site-index">

<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body text-white bg-danger rounded-3 shadow-sm">
      <div class="card-header">Total Books <?php echo $tb ?></div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body text-white bg-primary rounded-3 shadow-sm">
      <div class="card-header">Total Librarys <?php echo $tl ?></div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body text-white bg-success rounded-3 shadow-sm">
      <div class="card-header"><i class="fas fa-user"></i> Total Authors <?php echo $tu ?></div>
      </div>
    </div>
  </div>
</div>


</div>
