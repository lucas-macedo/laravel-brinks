
@section('content')
<div ng-controller='testeController'>

Hello <input type="text" ng-model="user.name"/>
 <hr/>
 <h1>Hello [[user.name]]</h1>
 <p>Counter value: [[counter]]</p>
</div>

<div ng-controller='countController'>
	<a href="#" ng-click="addOne()">Add 1</a>
	<p> [[counter]]</p>
</div>

<div ng-controller='loopController'>
	<ul>
		<li ng-repeat="fruit in fruits">[[fruit]]</li>
	</ul>
</div>

<form name='myForm'>
	<span ng-show="myForm.$invalid">Erros no formulários</span>
	<input type='text' ng-model='name' name='name' value='Nome' required />
	
	<button ng-disabled="myForm.$invalid"/>Save</button>

</form>


@stop