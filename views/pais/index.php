<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Países</h1>
<ul>
<?php foreach ($paises as $pais): ?>
    <li>
        <?= Html::encode("{$pais->nome} ({$pais->codigo})") ?>:
        <?= $pais->populacao ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $paginacao]) ?>