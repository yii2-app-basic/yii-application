<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\widgets\CurrencyWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
<div class="box">
    <div class="col-xs-24">
        <div class="welcome_box"><?= CurrencyWidget::widget() ?></div>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div class="sidebarLeft">

        </div>
        <div class="content"></div>
        <?= $content ?>
    </div>
</div>
</div>

<footer class="footer">
    <div class="container-flex">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
    <style>
        body{
            font-family: Arial, Tahoma, Verdana, sans-serif;
            font-size: 14px;
            line-height: 1.38;
            color: #363636;
            margin: 0 auto;
            padding: 0;
            position: relative;
            height: 100%;
            width: 100%;
            min-width: 981px;
            background: #EAEAEA url('/img/bg.png');
        }
        .sidebarLeft{
            margin-right: 15px;
            width: 236px;
            min-width: 236px;
            padding-top: 200px;
            padding-left: 50px;
            position: absolute;
        }
        .content{
            flex: 1;
            min-width: 0;

        }
        .box{
            display: flex;
            align-items: stretch;
        }
        .welcome_box{
            color: #646464;
            text-shadow: 0 1px 0 #f4f4f4;
            zoom: 1;
            text-align: left;
            line-height: 18px;
            font-size: 14px;
            margin: 18px auto 9px;
            width: 981px;
            overflow: hidden;
            padding: 50px;
        }
        .exchange-rates-block {
            float: left;
            margin-bottom: 9px;
        }
        .exchange-rates-block-section {
            font-size: 12px;
            color: #646464;
            float: left;
            margin-left: 15px;
            display: flex;
        }
    </style>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
