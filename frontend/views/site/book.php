<?php

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books List';
?>
<nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Books</a></li>
          <li class="breadcrumb-item active" aria-current="page">Books List</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->
      <div class="site-index">

    

<div class="body-content">

<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{summary}<div class="row">{items}</div>{pager}',
    'itemView' => '_books',
    'itemOptions' => [
        'class' => 'col-lg-4 col-md-6 mb-4 product-item'
    ],
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class
    ]
]) ?>

</div>
</div>