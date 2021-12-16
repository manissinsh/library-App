<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Library;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php echo $form->errorSummary($model) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
                <label><?php echo $model->getAttributeLabel('thumbnail') ?></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input"
                           id="thumbnail" name="thumbnail">
                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                </div>
            </div>

    <?= $form->field($model,'published_at')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2014-01-01']]) ?>

    <?= $form->field($model, 'language')->textInput() ?>


    <?= $form->field($model, 'library')->dropDownList(Library::getLibrares(), ['id' => 'cat-id', 'prompt' => 'Select library...']) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusLabels()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
