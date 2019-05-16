<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 26.04.2019
 * Time: 14:59
 */
use yii\helpers\Html;

?>

<div class="task-one">
    <h1 class="task-name"><?= $model->name?></h1>
    <p><strong>Описание задачи:</strong></p>
    <p><?= $model->description?></p>
    <div>
        <p> <strong>автор заявки:</strong> <?= $model->creator->login ?></p>
        <p> <strong>Исполнитель:</strong> <?= $model->responsible->login ?></p>
        <p> <strong>Статус заявки:</strong> <?= $model->status->name?></p>
        <p> <strong>DeadLine: </strong>
          <?php echo $model->deadline ? $model->deadline : 'не задан'?>
        </p>
    </div>
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
