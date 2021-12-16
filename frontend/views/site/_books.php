<?php
/** @var \common\models\Book $model */
?>

<div class="webdesign illustrator">
        <div class="gal-detail thumb">
            <a href="#" class="image-popup" title="Screenshot-1">
                <img src="<?php echo $model->getImageUrl() ?>" class="thumb-img" alt="work-thumbnail">
            </a>
            <div class="pw_content">
                    <div class="pw_header">
                        <h5><?php echo $model->title ?></h5>
                        <small class="text-muted"><b>Author: </b>  |  <?php echo $model->createdBy->username ?></small>
                    </div>
                    <div class="pw_meta">
                        <small class="text-muted"><b>Published : </b> <?php echo $model->published_at ?></small>
                    </div>
                </div>
        </div>
    </div>
    