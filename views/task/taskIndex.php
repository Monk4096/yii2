<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
  <p><?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?></p>
  <p id="search" class="btn btn-primary">Search Tasks</p>

<?php  echo $this->render('_search', ['model' => $searchModel, 'usersList' => $usersList, 'statusList' => $statusList]); ?>

<h2>Задачи:</h2>
<?php
echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
    'itemView' => function ($model) {
        return \app\widgets\TaskPreview::widget(['model' => $model]);
    }
])
?>
