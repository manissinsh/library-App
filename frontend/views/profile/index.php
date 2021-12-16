<?php

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Author Profile';
?>
<div class="site-index">

<main role="main" class="container">
      <div class="jumbotron">
        <h1>Welcome Back <?php echo $user->getDisplayName() ?> </h1>
        <p class="lead">Total <b><?php echo $bookc ?></b>  books has assigned on your name. Please find the list below. </p>
      </div>
    </main>

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
