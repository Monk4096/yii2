<?php
/**
 * Created by PhpStorm.
 * User: Monk
 * Date: 17.05.2019
 * Time: 11:52
 */
?>


<div class="comment">
  <p><strong>коментарий от:</strong> <?= $model->creator->login?> <strong>Дата комментария: </strong><?=$model->date_create?></p>
    <p><?= $model->description?></p>

</div>
