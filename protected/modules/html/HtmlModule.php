<?php

class HtmlModule extends CWebModule
{
	public $jsIncludes =  ['controller','directives','services'];
	public $_assetsUrl;

	public function init()
	{
		$this->layout = '/layouts/html';

		if ( $this->_assetsUrl === null ) {
			$this->_assetsUrl = Yii::app()->getAssetManager()->publish(
				Yii::getPathOfAlias('html.assets') );
		}
		// import the module-level models and components
		$this->setImport(array(
			'html.models.*',
			'html.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{

		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
