<?php

namespace app\controllers;

use app\models\Country;
use app\models\City;
use Yii;
use app\models\TestForm;
use app\controllers\AppController;

class PostController extends AppController {

    public $layout = 'basic';

    public function beforeAction($action) {
        if ($action -> id == 'index') {
            $this->enableCsrfValidation = false;
        };

        return parent::beforeAction($action);
    }

    public function actionIndex() {
        if (Yii::$app -> request -> isAjax) {
            // debug ($_POST);
            debug(Yii::$app -> request -> post());
            return 'test';
        }


        // $posts = TestForm::findOne(2);
        // $posts-> email = '2222@2.com';
        // $posts->save();
        // $posts -> delete();


        TestForm::deleteAll(['>','id',3]);

        $model = new TestForm();

        // $model->name = 'Автор';
        // $model->email = 'mail@mail.com';
        // $model->text = 'Текст сообщения';
        // $model->save();

        if ($model->load(Yii::$app -> request -> post()) ) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success','Данные приняты');
                return $this->refresh();
            }else {
                Yii::$app->session->setFlash('error','Ошибка');
            }
        }

        $this->view->title = 'Все статьи';
        return $this->render('test', compact('model'));
    }
    
    public function actionShow() {

        // $this->layout = 'basic';
        $this->view->title = 'Одная статья!';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);

        // $countr=Country::find()->asArray()->all();
        // $countr=Country::find()->asArray()->where('continent="Asia"')->all();
        // $countr=Country::find()->asArray()->where(['continent' => 'Africa' ])->all();
        // $countr=Country::find()->asArray()->where(['like','continent','As'])->all();
        // $countr=Country::find()->asArray()->where(['>=','population',200000000])->all();
        // $countr=Country::find()->asArray()->where(['continent' => 'Africa' ])->limit(3)->all();
        // $countr=Country::find()->asArray()->orderBy(['population' => SORT_DESC])->all();
        // $countr=Country::find()->asArray()->count();
        // $countr=Country::findOne(['Continent' => 'Africa' ]);
        // $countr=Country::findAll(['Continent' => 'Africa' ]);
        // $query = "SELECT * FROM Country where Continent='Europe'";
        // $countr=Country::findBySql($query)->all();

        // $countr=Country::findOne(['Code' => 'NLD']);
        // $cit=City::find()->all();
        //$countr=Country::find()->all();   //отложенная загрузка

        $countr=Country::find()->with('city')->all();    // жадная загрузка

        return $this->render('show', compact('countr'));
    }
}