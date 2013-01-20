<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$api = new Purchase();

		$this->renderPartial('index');
	}

	public function actionPurchase() {
	var_dump( $_GET );
		echo ' here ' ;
	}
}
