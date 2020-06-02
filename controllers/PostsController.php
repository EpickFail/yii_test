<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\insta\ListPosts;
use app\models\UserPostsForm;

class PostsController extends Controller 
{
    /**
     * 
     * @param type $user
     * @return type
     */
    public function actionPosts() 
    {
        $model = new UserPostsForm();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            if ($model->load($data)) {
                $users = explode(', ', $model['text']);
                $list = new ListPosts($users);
                $posts = $list->render();
                return [
                    "data" => $posts,
                    "error" => null
                ];
            } else {
                return [
                    "data" => null,
                    "error" => "error"
                ];
            }
        } else {
            return [
                "data" => null,
                "error" => "error2"
            ];
        }
    }
    
    public function actionIndex() 
    {
        $list = new ListPosts();
        $posts = $list->render();
        return $this->render('index', [
                    'UsersPosts' => $posts,
                    'model' => new UserPostsForm()
        ]);
    }

}
