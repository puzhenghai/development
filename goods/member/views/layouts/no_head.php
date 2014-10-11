<?php
	use member\assets\AppAsset;
	AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="utf-8">
    <?php $this->head() ?>
	<title><?= $this->title ?></title>
</head>

<body>
	    <?php $this->beginBody() ?>
	        <?= $content?>
	    <?php $this->endBody()?>
	</body>
</html>
<?php $this->endPage()?>
