<?php

class PurchaseController extends CController
{

	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionGet() {
		// Authenticate and Authorize here
		// if (AuthExtension Failed) return false;

		if ( $this->validate( $validateMsg = $_GET['id'] ) ) {

			if ( isset($_GET['id']) ) {
				try {
					$this->renderPartial( 'data', [ 'data' => ( new Purchase() )->find( $_GET['id'] ) ] );
				} catch ( \Exception $e ) {
					$this->renderPartial('failed', ['msg' => $e->getMessage() ] );
				}
			} else { 
				$this->renderPartial('failed', ['msg' => 'Id is required.'] );
			}

		} else {
			$this->renderPartial('failed', ['msg' => $validateMsg ] );
		}
	}

	public function actionSet() {
		// Authenticate and Authorize here

		if ( $validateMsg = $this->validate( $_POST ) ) {

			if ( isset($_POST['id']) ) unset( $_POST['id'] );

			try {
				$this->renderPartial('success', ['id' => ( new Purchase() )->set( $_POST )]);
			} catch ( \Exception $e ) {
				$this->renderPartial('failed', ['msg' => $e->getMessage() ] );
			}

		} else {
			$this->renderPartial('failed', ['msg' => $validateMsg ] );
		}
	}

	public function actionUpdate() {
		// Authenticate and Authorize here

		if ( $validateMsg = $this->validate( $_POST ) ) {

			if ( isset($_POST['id']) ) {
				try {
					$this->renderPartial('success', ['id' => ( new Purchase() )->set( $_POST, false )]);
				} catch ( \Exception $e ) {
					$this->renderPartial('failed', ['msg' => $e->getMessage() ] );
				}
			} else {
				$this->renderPartial('failed', ['msg' => 'Id is required for updates' . json_encode($_POST) ] );
			}

		} else {
			$this->renderPartial('failed', ['msg' => $validateMsg ] );
		}
	}
	
	public function actionVerify() {
		var_dump( $_GET );
		echo ' verify ' ;
	}

	public function actionFinalize() {
		var_dump( $_GET );
		echo ' finalize ' ;
	}

	public function validate( $params ) {
		return true;
	}

}
