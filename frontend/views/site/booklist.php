<?php

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */
/** @var $library \common\models\Library */

$this->title = $model->name;
?>
<div class="site-index">

    

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h2 class="display-4 fw-normal "><?php echo $model->name ?></h2>
      <p class="fs-5 text-muted">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
    </div>

<div class="body-content">

<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{summary}<div class="row">{items}</div>{pager}',
    'itemView' => '_booklist',
    'itemOptions' => [
        'class' => 'col-lg-4 col-md-6 mb-4 product-item'
    ],
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class
    ]
]) ?>

</div>
</div>
