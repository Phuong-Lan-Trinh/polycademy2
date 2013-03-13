<script type="text/ng-template" id="blog_index.html">
	<div class="item" ng-repeat="phone in phones">
		{{phone.age}}
		{{phone.name}}
	</div>
	<div>
		<h1>ONE ITEM</h1>
		{{singlephone.error}}
		{{singlephone.name}}
	</div>
	<button ng-click="addSomeData()">Add some Data to the phones array</button>
</script>