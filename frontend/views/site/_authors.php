<?php
/** @var \common\models\Book $model */
?>
        <div class="col mb-3">
            <a href="<?php echo \yii\helpers\Url::to(['/site/authorlist', 'id' => $model->id]) ?>">
          <div class="card">
            <img src="https://via.placeholder.com/340x120/FFB6C1/000000" alt="Cover" class="card-img-top">
            <div class="card-body text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" style="width:100px;margin-top:-65px" alt="User" class="img-fluid img-thumbnail rounded-circle border-0 mb-3">
              <h5 class="card-title"><?php echo $model->getDisplayName() ?> </h5>
              <p class="text-secondary mb-1">Author</p>
              <p class="text-muted font-size-sm"><?php echo $model->email ?></p>
            </div>
          </div>
            </a>
        </div>