<?php

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = 'My Laberary App';
?>

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Authors</a></li>
          <li class="breadcrumb-item active" aria-current="page">Authors List</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{summary}<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gutters-sm">{items}
    </div>
    </div>{pager}',
    'itemView' => '_authors',
    'itemOptions' => [
        'class' => ''
    ],
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class
    ]
]) ?>
