<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 26.04.2019
 * Time: 14:26
 */

namespace app\widgets;


use app\models\tables\Tasks;
use yii\base\Widget;

class TaskPreview extends Widget
{
    public $model;

    public function run(){
        if (is_a($this->model, Tasks::class)){
            return $this->render("task_prewiev", ['model'=> $this->model]);
        }
        throw new \Exception("ощибка");

    }

}