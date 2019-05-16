<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 17.04.2019
 * Time: 19:39
 */

namespace yii\validators;


class StatusValidator extends Validator
{
    public $status;
    //public $massage = 'Не верный статус';

    public function validateAttribute($model, $attribute) {
        if (!in_array($this->$attribute, ['В работе', 'Закрыто'])) {
            $this->addError($attribute, 'Не верный статус');
        }
    }
}