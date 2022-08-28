<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="wrap">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <?=Html::a('Главная', 'web/', ['class' => 'nav-link'])?>
                </li>
                <li class="nav-item">
                    <?=Html::a('Статьи', ['post/index'], ['class' => 'nav-link'])?>
                </li>
                <li class="nav-item">
                    <?=Html::a('Статья', ['post/show'], ['class' => 'nav-link'])?>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>

            <?php if ( isset($this->blocks['block1'])): ?>
                <?php echo $this->blocks['block1'] ?>
            <?php endif; ?>
            <?= $content ?>

        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>