<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Owners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sale_date')->textInput()->widget(
        DatePicker::classname(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options'    => ['class' => 'form-control'],
        ]
    ) ?>

    <?= $form->field($model, 'owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
