<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 17.04.2019
 * Time: 11:12
 */

namespace app\models;


use yii\base\Model;

class Task extends Model {

    public $name;

    public $description;
    public $creator_id;
    public $responsible_id;
    public $status_id;

    public function rules()
    {
        return [
            [['status'], 'status']
        ];
    }


}