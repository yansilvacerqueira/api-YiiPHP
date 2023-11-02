<?php

namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord {
    public static function tableName()
    {
        return 'users'; // Nome da tabela no banco de dados
    }

    public function getTask()
    {
        return $this->hasMany(Task::class, ['user_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['email'], 'email'],
            ['email', 'unique', 'message' => 'Este endereço de e-mail já está em uso.'],
        ];
    }
}
?>