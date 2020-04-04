<?php


namespace app\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;

class AddProductForm extends \yii\base\Model
{
    public $title;
    public $category_id;

    public function rules()
    {
        return [
            [['title', 'category_id'], 'required']
        ];
    }

    public function getCategoryList()
    {
        return ArrayHelper::map(Category::find()->all(), 'id', 'title');
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        $model = new Product();
        $model->title = $this->title;
        $model->category_id = $this->category_id;

        return $model->save();
    }
}