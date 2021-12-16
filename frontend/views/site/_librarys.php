<?php
/** @var \common\models\Library $model */
?>

    <div class="card h-100">
        <a href="#" class="img-wrapper">
        </a>
        <div class="card-body">
            <h3 class="card-title center"><?php echo $model->name ?></h3>
            
            <div class="pw_content">
                    <div class="pw_header">
                        <small class="text-muted"><b>Opening time : </b>  |  <?php echo $model->opening_time ?></small>
                    </div>
                    <div class="pw_meta">
                        <small class="text-muted"><b>Closing time : </b> <?php echo $model->closing_time ?></small>
                    </div>
                </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?php echo \yii\helpers\Url::to(['/site/booklist', 'id' => $model->id]) ?>" class="btn btn-primary btn-add-to-cart">
            Book List
            </a>
        </div>
    </div>