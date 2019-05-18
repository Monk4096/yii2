<?php
use yii\helpers\Html;

?>

    <h3><?= $model->name ?></h3>
    <div class="taskContainer">

      <a class="task-link" href="<?= \yii\helpers\Url::to(['task/one', 'id' => $model->id])?>">

      <p class="taskDescription"><?= $model->description ?></p>
        <div class="taskAbout">
          <p> <strong><?= Yii::t('app', 'task_creator')?> </strong> <?= $model->creator->login ?></p>
          <p> <strong><?= Yii::t('app', 'task_responsible')?> : </strong> <?= $model->responsible->login ?></p>
          <p> <strong><?= Yii::t('app', 'task_status')?> </strong> <?= $model->status->name?></p>
          <p> <strong><?= Yii::t('app', 'task_deadline')?> </strong>
              <?php echo $model->deadline ? $model->deadline : 'не задан'?>
          <p>
              <?= Html::a(Yii::t('app', 'update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
              <?= Html::a(Yii::t('app', 'delete'), ['delete', 'id' => $model->id], [
                  'class' => 'btn btn-danger',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                  ],
              ]) ?>
          </p>
        </div>
      </a>
    </div>

