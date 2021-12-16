<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Library;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */
/** @var $library \common\models\Library */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="site-index">


<div class="body-content">

<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{summary}<div class="row">{items}</div>{pager}',
    'itemView' => '_show',
    'itemOptions' => [
        'class' => 'col-lg-4 col-md-6 mb-4 product-item'
    ],
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class
    ]
]) ?>

</div>
</div>
