<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 26.04.2019
 * Time: 14:59
 */
use yii\helpers\Html;

?>
<div class="task-one-container">
  <div class="task-one">
      <h1 class="task-name"><?= $model->name?></h1>
      <p><strong><?= Yii::t('app', 'task_description')?></strong></p>
      <p><?= $model->description?></p>
      <div>
        <p> <strong><?= Yii::t('app', 'task_creator')?> </strong> <?= $model->creator->login ?></p>
        <p> <strong><?= Yii::t('app', 'task_responsible')?> : </strong> <?= $model->responsible->login ?></p>
        <p> <strong><?= Yii::t('app', 'task_status')?> </strong> <?= $model->status->name?></p>
        <p> <strong><?= Yii::t('app', 'task_deadline')?> </strong>
            <?php echo $model->deadline ? $model->deadline : 'не задан'?>
          </p>
      </div>
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

  <div class="task-create-comment">

    <?php if (Yii::$app->user->identity): ?>
      <?php $form = \yii\widgets\ActiveForm::begin();?>

      <?= $form->field($newComment, 'description')->textarea(['placeholder' => 'Текст коммантария']) ?>
      <?= $form->field($newComment, 'creator_id')->textInput([
              'value' => Yii::$app->user->getId(),
              'readonly' => true
            ])?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'create_comment'), ['class' => 'btn btn-success']) ?>
        </div>
      <?php \yii\widgets\ActiveForm::end(); ?>
    <?php else: ?>
    <p>Комментарии доступны авторизованым пользователям</p>

    <?php endif; ?>

  </div>
</div>


<?php
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'emptyText' => 'Нет комментариев',
    'options' => [
            'class' => 'comments'
    ],
    'itemView' => function ($model) {
        return \app\widgets\CommentsPreviewer::widget(['model' => $model]);
    }
])
?>


