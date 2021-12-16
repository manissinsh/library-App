<?php
/** @var \common\models\Book $model */
?>


    
<div class="card-deck mb-3 text-center">
        <div class="card box-shadow">
          <a href="#" class="img">
            <img class="card-img-top" src="<?php echo $model->getImageUrl() ?>" alt="">
        </a>
            <ul class="list-unstyled mt-3 mb-4">
              <li><h6>Author:</h6><?php echo $model->createdBy->username ?></li>
              <li><h6>Published:</h6><?php echo $model->published_at ?></li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-primary"><?php echo $model->title ?></button>
          </div>
      </div>