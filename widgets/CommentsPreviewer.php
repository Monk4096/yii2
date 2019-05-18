<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 17.05.2019
 * Time: 11:47
 */

namespace app\widgets;


use app\models\tables\Comments;
use yii\base\Widget;

class CommentsPreviewer extends Widget
{
    public $model;

    public function run() {
        if (is_a($this->model, Comments::class)){
            return $this->render("comments_previewer", ['model'=> $this->model]);
        }
        throw new \Exception("ощибка");

    }

}