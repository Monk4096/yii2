<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 15.05.2019
 * Time: 14:49
 */

namespace app\components;


use app\models\tables\Tasks;
use yii\base\Component;
use yii\base\Event;
use yii\helpers\Html;

class Bootstrap extends Component
{

    public function init(){
        $this->eventSendEmail();
    }

    private function eventSendEmail () {
        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function ($event){

            $task = $event->sender;
//            $user = $task->responsible;
            $body = "Test New Task {$task->name} Description: {$task->description}" .
            Html::a('Link', ['one&id='.$task->id]);

            \Yii::$app->mailer->compose()
                ->setTo('while@email.net')
                ->setFrom('admin@email.net')
                ->setSubject('test new task')
                ->setTextBody($body)
                ->send();
        });
    }
}