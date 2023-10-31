<?php
use yii\helpers\Html;
?>
<p>Você enviou as seguintes informações:</p>

<ul>
    <li><label>Nome</label>: <?= Html::encode($model->nome) ?></li>
    <li><label>E-mail</label>: <?= Html::encode($model->e_mail) ?></li>
</ul>
