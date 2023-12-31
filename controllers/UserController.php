<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\User;

use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class UserController extends ActiveController
{
   public $modelClass = 'app\models\User';


   public function actionIndex()
   {
      $filter = new ActiveDataFilter([
         'searchModel' => 'app\models\UserSearch',
      ]);
      
      $filterCondition = null;
      if ($filter->load(Yii::$app->request->get())) {
         $filterCondition = $filter->build();
         
         if ($filterCondition === false) {
            throw new BadRequestHttpException('Bad request');
         }
      }

      $query = User::find();
      if ($filterCondition !== null) {
         $query->andFilterWhere(['ilike', $filterCondition]);
      }

      
      return new ActiveDataProvider([
         'query' => $query
     ]);
   }

   public function actionView($id)
   {
      $user = User::findOne($id);
      if (!$user) {
        throw new NotFoundHttpException("User not found.");
      }
      return $user;
   }

   public function actionCreate()
   {
      $user = new User();
      $user->load(Yii::$app->request->getBodyParams(), '');
      if ($user->save()) {
         Yii::$app->response->setStatusCode(201); // Código 201 para Created
         return $user;
      } 
      
      return $user->getErrors();
   }

   public function actionTask($id)
   {
      $user = User::findOne($id); // Obter um usuário pelo ID

      if (!$user) {
          throw new NotFoundHttpException("User not found.");
      }
  
      $tasks = $user->getTask()->all(); // Obter todas as tarefas associadas a esse usuário
  
      if (empty($tasks)) {
          throw new NotFoundHttpException("No tasks");
      }
  
      return $tasks;
   }

   public function actionUpdate($id)
   {
      $user = User::findOne($id);
      
      if ($user->load(Yii::$app->request->getBodyParams(), '')) {
         throw new NotFoundHttpException("User not found.");
      }

      if ($user->save()) {
         Yii::$app->response->setStatusCode(200);
         return $user;
      }

      return $user->getErrors();
   }
   
   public function actionDelete($id)
   {
      $user = User::findOne($id);
      if (!$user) {
         throw new NotFoundHttpException("User not found.");
      }

      if ($user->delete()) {
         Yii::$app->response->setStatusCode(204); // Código 204 para No Content
      } else {
         return ['Erro ao excluir o usuário.'];
      }
   }
}
?>