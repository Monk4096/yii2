<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 27.04.2019
 * Time: 21:22
 */

namespace app\controllers;


use app\models\tables\Tasks;
use yii\web\Controller;

class EventController extends Controller
{
    public function actionIndex() {
        $model = new  Tasks();
        $model->on(Tasks::EVENT_SEND_EMAIL, function(){});
    }

}