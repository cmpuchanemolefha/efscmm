@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>
				    <br>
                   <div class="links">
                    <a href="{{ action('CustomerController@index') }}">Customers</a>
                   </div>
					 <br>		   
				    <div class="links">
                    <a href="{{ action('StockController@index') }}">Stocks</a>
                   </div>
				     <br>
					 
				    <div class="links">
                    <a href="{{ action('InvestmentController@index') }}">Investments</a>
                   </div>
				    <br>
									   				   
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


