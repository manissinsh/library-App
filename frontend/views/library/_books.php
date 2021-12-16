<?php
/** @var \common\models\Book $model */
?>
    <div class="card h-100">
        <a href="#" class="img-wrapper">
        </a>
        <div class="card-body">
            <h5 class="card-title">
                <a href="#" class="text-dark"></a>
            </h5>
            <h5><?php echo $model->title ?></h5>
            <div class="card-text">
                
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" class="btn btn-primary btn-add-to-cart">
                Add to Cart
            </a>
        </div>
    </div>