<?php

namespace app\models;
use yii\db\ActiveRecord;

class Task extends ActiveRecord {
    public static function tableName()
    {
        return 'tasks'; // Nome da tabela no banco de dados
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function rules()
    {
        return [
            [['title', 'description', 'user_id'], 'required'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }
}
?>