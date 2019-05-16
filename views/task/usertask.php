<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 26.04.2019
 * Time: 19:27
 */

?>
  <h2>Привет <?= Yii::$app->user->identity->username?></h2>
<p>Ваши задачи:</p>
<?php
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function ($model) {
        return \app\widgets\TaskPreview::widget(['model' => $model]);
    }
])
?>