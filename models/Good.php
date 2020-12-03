<?php


namespace app\models;


use yii\db\ActiveRecord;
use Yii;

class Good extends ActiveRecord
{
    public function getAllGoods() {
        $goods = Yii::$app->cache->get('goods');
        if (!$goods) {
            $goods = self::find()->all();
            Yii::$app->cache->set('goods', $goods, 60);
        }
        return $goods;
    }

    public function getGoodsByCategory($categoryName) {
        return self::find()->where(['category' => $categoryName])->all();
    }

    public function getSearchResults($search) {
        return self::find()->where(['like', 'name', $search])->orWhere(['like', 'composition', $search])->all();
    }

    public function getSpecificGood($name) {
        return self::find()->where(['link_name' => $name])->one();
    }

    public static function tableName()
    {
        return 'good';
    }

    public function rules()
    {
        return [
            [['category', 'name', 'composition', 'descr', 'img', 'link_name'], 'string'],
            ['price', 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'category' => 'Категория',
            'name' => 'Название',
            'composition' => 'Состав',
            'price' => 'Цена',
            'descr' => 'Описание',
            'img' => 'Изображение',

        ];
    }

}
