<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 17.04.2019
 * Time: 9:07
 */

namespace app\controllers;


use app\models\filters\TasksFilter;
use app\models\tables\Comments;
use app\models\tables\Status;
use app\models\tables\Tasks;
use app\models\tables\Users;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TaskController extends Controller {

    public function actionIndex() {

        $searchModel = new TasksFilter();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        var_dump($searchModel['deadline']);

        $usersList = ['' => '-- ALL --'];
        $usersList['пользователи'] = $this->getUsersList();

        $statusList = ['' => 'all status'];
        $statusList['Статус'] = $this->getStatusList();

        return $this->render('taskIndex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'usersList' => $usersList,
            'statusList' => $statusList
        ]);
    }


    public function actionOne ($id) {
        $model = Tasks::findOne($id);
        $dateTime = new \DateTime();

        $newComment = new Comments();
        $newComment->setAttributes([
           'task_id' => $id,
            'date_create' => $dateTime->format('Y-m-d H:i:s'),
//            'creator_id' => Yii::$app->user->identity->getId()
        ]);

        if ($newComment->load(Yii::$app->request->post()) && $newComment->save()) {
            return $this->redirect(['one', 'id' => $model->id]);
        }

        $dataProvider = new ActiveDataProvider([
           'query'  => Comments::find()->where(['task_id' => $id])
        ]);


        return $this->render('taskOne', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'newComment' => $newComment
        ]);
    }





    public function actionUsertask($username) {
        $login = Users::find()->select(['id'])->where('login = :login', [':login' => $username])->column();
        $dataProvider = new ActiveDataProvider([
            'query' =>  Tasks::find()->where(['responsible_id' => $login])
        ]);

        return $this->render('usertask', ['dataProvider' => $dataProvider]);
    }

    public function actionUpdate ($id) {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['one', 'id' => $model->id]);
        }
        $statusList = $this->getStatusList();
        $usersList = $this->getUsersList();
        return $this->render('taskForm', [
            'model' => $model,
            'usersList' => $usersList,
            'statusList' => $statusList
        ]);
    }


    public function actionCreate(){
        $model = new Tasks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['one', 'id' => $model->id]);
        }

        $statusList = $this->getStatusList();
        $usersList = $this->getUsersList();

        return $this->render('taskForm', [
            'model' => $model,
            'usersList' => $usersList,
            'statusList' => $statusList
        ]);
    }


    public function actionDelete($id){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function getUsersList () {
        $cache = \Yii::$app->cache;
        $key = 'usersList';
        if ($cache->exists($key)){
            $usersList = $cache->get($key);
        } else {
            $usersList = Users::find()
                ->select(['login'])
                ->indexBy('id')
                ->column();
            $cache ->set($key, $usersList, 300);
        }

        return $usersList;
    }

    public function getStatusList () {
        $cache = \Yii::$app->cache;
        $key = 'statusList';
        if ($cache->exists($key)){
            $statusList = $cache->get($key);
        } else {
            $statusList = Status::find()
                ->select(['name'])
                ->indexBy('id')
                ->column();
            $cache ->set($key, $statusList, 300);
        }

        return $statusList;

    }


    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}