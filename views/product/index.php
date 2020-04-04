<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\web\View;
use app\models\Product;
use app\assets\AddProductAsset;
use yii\widgets\Pjax;

/**
 * @var $this View
 * @var $dataProvider ActiveDataProvider
 * @var $productForm \app\models\AddProductForm
 */

$this->title = 'My Yii Application';
AddProductAsset::register($this);
?>
<div class="site-index">

  <div class="body-content">

    <div class="row">
      <div class="col-lg-12 text-right">
          <?= \yii\helpers\Html::a(
              'Добавить товар',
              Yii::$app->urlManager->createUrl('product/create'),
              ['class' => 'btn btn-primary']
          ); ?>
      </div>

      <div class="col-lg-12">
          <?php Pjax::begin(['id' => 'product-list-pjax']) ?>
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'columns' => [
                  [
                      'class' => 'yii\grid\SerialColumn',
                  ],
                  [
                      'label' => 'Название товара',
                      'format' => 'raw',
                      'value'  => function(Product $product) {
                          return \yii\helpers\Html::a(
                              $product->title,
                              Yii::$app->urlManager->createUrl(['product/update', 'id' => $product->id])
                          );
                      },
                  ],
                  [
                      'label' => 'Категория',
                      'value'  => 'category.title',

                      //'value'  => function (\app\models\Product $product) {
                      //    return $product->category->title;
                      //},
                  ],
                  [
                      'label' => 'Дата добавления',
                      'value'  => 'created_at',
                  ],
                  [
                      'class' => '\yii\grid\ActionColumn',
                      'template' => '{delete}',

                      //'buttons' => [
                      //    'delete' => function($url, $model, $key) {
                      //        return \yii\helpers\Html::tag('span', null, ['class' => 'glyphicon glyphicon-trash drop-btn', 'data-id' => $model->id]);
                      //    }
                      //]
                  ],
              ]
          ]); ?>
          <?php Pjax::end(); ?>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Добавление нового товара</h4>
      </div>
      <div class="modal-body">
          <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'add-product-form']); ?>
          <?= $form->field($productForm, 'title')->textInput(['class' => 'form-control']); ?>
          <?= $form->field($productForm, 'category_id')->dropDownList(\app\models\AddProductForm::getCategoryList(), ['class' => 'form-control']); ?>
          <?php \yii\widgets\ActiveForm::end(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary">Добавить</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(function () {
    // setTimeout(function() {
    //   $.pjax.reload({container: '#product-list-pjax'});
    // }, 3000);

    $(document).on('click', '.drop-btn', function () {
      $.ajax({
        url: 'product/delete',
        type: 'post',
        data: {
          id: $(this).data('id')
        },
        success: function() {
          $.pjax.reload({container: '#product-list-pjax'});
        }
      });
    });
  });
</script>
