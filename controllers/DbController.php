<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 20.04.2019
 * Time: 19:31
 */

namespace app\controllers;


use app\models\tables\Users;
use yii\web\Controller;

class DbController extends Controller
{
    public function actionIndex () {

    }

    public function actionAr () {
//        $model = new Users();
//        $model ->login = "test";
//        $model ->password = "test";
//        $model->save();

        $model = Users::find()->all();
        var_dump($model);
    }
}