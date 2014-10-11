<?php

namespace components\base;

use Yii;
use yii\web\View;
use components\widgets\InhritLayout;
use common\includes\CommonUtility;
use yii\base\InvalidParamException;

/**
 * Site controller
 */
class BaseView extends View
{

	public $channels;

	public $rootChannels;

	public function init()
	{
		parent::init();
	}


	public function setMetaTag($name, $content)
	{
		$this->registerMetaTag(['name' => $name, 'content' => $content]);
	}

	public function beginInhritLayout($viewFile, $params = [], $blocks = [])
	{
		return InhritLayout::begin(['viewFile' => $viewFile, 'params' => $params, 'blocks' => $blocks, 'view' => $this]);
	}

	public function endInhritLayout()
	{
		InhritLayout::end();
	}

	public function addBreadcrumb()
	{
		$argsCount = func_num_args();
		$args = func_get_args();
		
		if($argsCount == 1)
		{
			$this->params['breadcrumbs'][] = $args[0];
		}
		else if($argsCount == 2)
		{
			$this->params['breadcrumbs'][] = ['label' => $args[0], 'url' => $args[1]];
		}
	}
}
