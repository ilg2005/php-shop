<?php


namespace app\models;


use yii\caching\Cache;
use yii\db\ActiveRecord;
use Yii;

class Good extends ActiveRecord
{
    public function getAllGoods() {
        $goods = Yii::$app->cache->get('goods');
        if (!$goods) {
            $goods = Good::find()->all();
            Yii::$app->cache->set('goods', $goods, 60);
        }
        return $goods;
    }

    public function getGoodsByCategory($categoryName) {
        return Good::find()->where(['category' => $categoryName])->all();
    }

    public static function tableName()
    {
        return 'good';
    }
}
