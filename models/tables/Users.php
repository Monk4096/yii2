<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $name
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord
{
    const SCENARIO_AUTH = 'auth';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login', 'name'], 'string', 'max' => 25],
            [['password'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'name' => 'Name',
            'password' => 'Password',
        ];
    }

    public function fields()
    {
        if ($this->scenario == static::SCENARIO_AUTH) {
            return [
                'id',
                'username' => 'login',
                'password'
            ];
        }
        return parent::fields();

    }
}
