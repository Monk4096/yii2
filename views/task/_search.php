<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\filters\TasksFilter */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tasks-search">
  <h2>Фильтр поиска</h2>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'creator_id')->dropDownList($usersList)?>

    <?= $form->field($model, 'responsible_id')->dropDownList($usersList) ?>

    <?php  echo $form->field($model, 'deadline')
                ->textInput(['type' => 'date'])?>

    <?php  echo $form->field($model, 'status_id')->dropDownList($statusList) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
  $(document).ready(() => {
    let $searchBtn = $('#search');
    let $search = $('.tasks-search');
    $searchBtn.on('click', $searchBtn, () => {
      $search.slideToggle(500);
    })
  })
</script>
