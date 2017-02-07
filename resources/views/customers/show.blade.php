@extends('app')
@section('content')
    <h1>Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Cust Number</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
      </table>
    </div>
	
	<h1>Stock</h1>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Symbol</th>
            <th>Stock Name</th>
            <th>No of Shares</th>
            <th>Purchase price</th>
            <th>Purchase Date</th>
			<th>Original Value</th>
          </tr>
        </thead>
		
        <tbody>		
		<?php $total_o_value = 0; ?>	
         		 
		@foreach ($stocks as $stock)
		  @if ($stock->customer_id == $customer->id)
            <tr>
                <td>{{ $stock->symbol }}</td>
                <td>{{ $stock->name }}</td>
                <td>{{ $stock->shares }}</td>
                <td>{{ $stock->purchase_price }}</td>
                <td>{{ $stock->purchased }}</td>
				<?php $original_value = $stock->shares * $stock->purchase_price ?>
				<td>{{ $original_value }}</td>

			</tr>
			
			<?php $total_o_value = $total_o_value + $original_value; ?>
			@endif
        @endforeach
		
        </tbody>		

    </table>

	
	<?php echo "Total of Initial Stock Portfolio: $" .$total_o_value ?>
	
		
	<h1>Investment</h1>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Category</th>
            <th>Description</th>
            <th>Acquired Value</th>
            <th>Acquired Date</th>
            <th>Recent Value</th>
            <th>Recent Date</th>
        </tr>
        </thead>
		
		<tbody>
		<!--$investments=Investments::all(); -->
		
		<?php $total_acquired_value =0;
          $total_recent_value =0;	?>
        @foreach ($investments as $investment)
		   @if ($investment->customer_id == $customer->id)
            <tr>
                <td>{{ $investment->category }}</td>
                <td>{{ $investment->description }}</td>
                <td>{{ $investment->acquired_value }}</td>
                <td>{{ $investment->acquired_date}}</td>
                <td>{{ $investment->recent_value }}</td>
                <td>{{ $investment->recent_date }}</td>
				
            </tr>
			<?php $total_acquired_value = $total_acquired_value + $investment->acquired_value;
             $total_recent_value = $total_recent_value + $investment->recent_value ; ?>
			@endif
        @endforeach

        </tbody>
  
	</table>
	
	<?php echo "Total of Initial Investment Portfolio $" .$total_acquired_value ?>	
	<br>
	<?php echo "Total of Current Investment Portfolio $" .$total_recent_value ?>	
	
	<br>
	<br>
	<h1>Summary of Portfolio</h1>
	
	<?php $total_initial_port = $total_acquired_value + $total_o_value;
          $total_recent_port = $total_recent_value + $total_o_value;	
		  
		  ?>
	
	<?php echo "Total of Initial Portfolio Value $" .$total_initial_port ?>	
	<br>
	<?php echo "Total of Current Portfolio $" . $total_recent_port ?>
	
@stop

