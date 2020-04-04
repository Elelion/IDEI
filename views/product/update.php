<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Update Product: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'category_id')->dropDownList(\app\models\AddProductForm::getCategoryList(), ['class' => 'form-control']); ?>

      <div class="form-group">
          <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
      </div>

    <?php ActiveForm::end(); ?>

</div>
