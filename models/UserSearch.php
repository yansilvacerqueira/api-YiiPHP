<?php

namespace app\models;

use app\models\User;

class UserSearch extends User
{

    public function rules()
    {
        return [
            [['name', 'email'], 'safe'],
        ];
    }
}