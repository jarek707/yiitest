<?php

class DefaultController extends CController
{
	public $rules='';

	public function actionIndex()
	{
		$this->render('index');
	}
}
