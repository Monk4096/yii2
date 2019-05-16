<?php
use yii\helpers\Html;

?>

    <h3><?= $model->name ?></h3>
    <div class="taskContainer">

      <a class="task-link" href="<?= \yii\helpers\Url::to(['task/one', 'id' => $model->id])?>">

      <p class="taskDescription"><?= $model->description ?></p>
        <div class="taskAbout">
          <p> <strong>Задача от: </strong> <?= $model->creator->login ?></p>
          <p> <strong>Исполнитель: </strong> <?= $model->responsible->login ?></p>
          <p> <strong>Статус заявки: </strong> <?= $model->status->name?></p>
          <p> <strong>DeadLine: </strong>
              <?php echo $model->deadline ? $model->deadline : 'не задан'?>
          <p>
              <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
              <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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

