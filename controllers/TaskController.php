<?php
namespace app\controllers;

use yii\rest\ActiveController;

class TaskController extends ActiveController
{
   public $modelClass = 'app\models\Task';

   public function actionIndex()
   {
      $tasks = Task::find()->all();
      return $tasks;
   }

   public function actionView($id)
   {
      $task = Task::findOne($id);
      if ($task === null) {
        throw new NotFoundHttpException("Tarefa com ID $id não encontrada.");
      }
      return $task;
   }
   
   public function actionCreate()
   {
      $task = new Task();
      $task->load(Yii::$app->request->getBodyParams(), '');
      if ($task->save()) {
         Yii::$app->response->setStatusCode(201); // Código 201 para Created
         return $task;
      } else {
         return $task->getErrors();
      }
   }

   public function actionUpdate($id)
   {
      $task = Task::findOne($id);
      if ($task === null) {
         throw new NotFoundHttpException("Tarefa com ID $id não encontrada.");
      }

      $task->load(Yii::$app->request->getBodyParams(), '');
      if ($task->save()) {
         return $task;
      } else {
         return $task->getErrors();
      }
   }
   
   public function actionDelete($id)
   {
      $task = Task::findOne($id);
      if ($task === null) {
         throw new NotFoundHttpException("Tarefa com ID $id não encontrada.");
      }

      if ($task->delete()) {
         Yii::$app->response->setStatusCode(204); // Código 204 para No Content
      } else {
         return ['Erro ao excluir a tarefa.'];
      }
   }
}
?>