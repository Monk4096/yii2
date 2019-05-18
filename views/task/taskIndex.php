<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
  <p><?= Html::a(Yii::t('app', 'create_task'), ['create'], ['class' => 'btn btn-success']) ?></p>
  <p id="search" class="btn btn-primary"><?=Yii::t('app', 'search_task')?></p>

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
