<?php

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->getDisplayName();
?>
<div class="container db-social">
    <div class="jumbotron jumbotron-fluid"></div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <div class="widget head-profile has-shadow">
                    <div class="widget-body pb-0">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-4 col-md-4 d-flex justify-content-lg-start justify-content-md-start justify-content-center">
                                <ul>
                                    <li>
                                        <div class="counter"><?php echo $bookc ?></div>
                                        <div class="heading">Total Books</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-4 col-md-4 d-flex justify-content-center">
                                <div class="image-default">
                                    <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="...">
                                </div>
                                <div class="infos">
                                    <h2><?php echo $model->getDisplayName() ?></h2>
                                    <div class="location">Las Vegas, Nevada, U.S.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
