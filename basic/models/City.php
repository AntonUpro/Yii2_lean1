<?php 

namespace app\models;

use yii\db\ActiveRecord;
use app\models\City;

class City extends ActiveRecord {
    public static function tableName() {
        return 'city';
    }

    public function getCountry() {
        return $this->hasOne(Country::className(), ['Code' => 'CountryCode']);
    }

}