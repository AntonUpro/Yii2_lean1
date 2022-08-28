<?php 
namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;


class TestForm extends ActiveRecord {

    // public $name;
    // public $email;
    // public $text;

    public static function tableName() {
        return 'posts';
    }

    public function attributeLabels () {
        return [
            'name' => 'Имя',
            'email' => 'E-Mail',
            'text' => 'Текст сообщения',
        ];
    }

    public function rules() {
        return [
            [['name','text'], 'required'],
            ['email', 'safe'],
            // ['name', 'string', 'min' => 2, 'tooShort' => 'Wrong' ],
            // ['name', 'string', 'max' => 5, 'tooLong' => 'Много' ],
            // ['name', 'string', 'length' => [2,5]],
            // ['name', 'myRule'],
            // ['text', 'trim'],
        ];
    }

    public function myRule ($attrs) {
        if ( !in_array($this->$attrs, ['hello', 'world'])) {
            $this->addError($attrs, 'Wrong');
        }
    }

}