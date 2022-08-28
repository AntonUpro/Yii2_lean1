<?php 

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Country;

class Country extends ActiveRecord {
    public static function tableName() {
        return 'country';
    }

    public function getCity() {
        return $this->hasMany(City::className(), ['CountryCode' => 'Code']);
    }
}