<?php

class DefaultController extends CController
{
	public $rules='';

	public function actionIndex()
	{

		$model = new Markup();
		$this->rules = json_encode($model->rules());
		$this->render('index');
	}
}
