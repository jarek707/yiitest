<div ng-controller='firstCtrl'>
	<form>
		Card Number:<input name="card_number" type="text" ng-model='purchase.card_number'/>
		<br />
		Ammount    :<input name="amount" type="text" ng-model='purchase.amount' />
		<br />
		Validation code:<input name="card_number" type="text" ng-model='purchase.validation_code' />
		<br />
		Expiry date:<input name="card_number" type="text" ng-model='purchase.expiry_date' />
		<br />
		Merchant Id:<input name="card_number" type="text" ng-model='purchase.merchant_id' />
		<br />
		Customer Id:<input name="card_number" type="text" ng-model='purchase.customer_id' />
		<br />
		<button type='button' ng-click='update()' >Update</button>
		<br />
		<button type='button' ng-click='add()' >New</button>
	</form>
</div>
