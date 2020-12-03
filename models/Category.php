<?php


namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            ['cat_name', 'string'],
            ['browser_name', 'string'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'cat_name' => 'Название в таблице',
            'browser_name' => 'Название в браузере',
            ];
    }

    public function getCategories() {
        return self::find()->all();
    }

}
