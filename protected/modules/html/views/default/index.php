<script>
	function firstCtrl( $scope ) {
		$scope.name=function() { return 'Joe'};
	}
</script>

<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

		<div ng-controller='firstCtrl'>
		Name: {{name()}}
		</div>
