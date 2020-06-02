<?php
namespace app\models;

use yii\base\Model;

class UserPostsForm extends Model
{
    public $text;
    public function rules()
    {
        return [
            [
                [
                    'text'
                ],
                'string'
            ]
        ];
    }
}