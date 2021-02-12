
@extends('layouts.main')

@section('title')
    Clients
@endsection

@section('content')

    @include('includes.header')

    <div class="container">

    	  @if (session('success'))
     
          <div class="alert alert-success w-50 mx-auto" role="alert">
  {{ session('success') }}
</div>
        @endif

           @if (session('error'))
                <div class="alert alert-success w-50 mx-auto" role="alert">
  {{ session('error') }}
</div>
          @endif


    	<?php
    	$cityArray = [];

    	$cityArray['all'] = "All";
    	$cityArray['sandton'] = "Sandton";
    	$cityArray['jozi'] = "Jozi";

    	$paginationArray = [];

    	$paginationArray[5] = 5;
    	$paginationArray[10] = 10;
    	$paginationArray[15] = 15;
    	$paginationArray[20] = 20;
?>
	<div class="row w-50 mb-4">
		<div class="col-md-4">
			<label for="pagination">Pagination</label>
	    	<select class="form-select form-control-sm" name="pagination" id="pagination">
	    		<?php foreach($paginationArray as $key => $value): ?>
	    			<?php
	    				$selectedString = "";
	    				if(isset($requestParams['pagination']) && $requestParams['pagination'] == $key) {
	    					$selectedString = "selected";
	    				}
	    			?>
	    			<option value="{{$key}}" {{$selectedString}}>{{$value}}</option>
				<?php endforeach; ?>
	    	</select>
		</div>

		<div class="col-md-4">
			<label for="city">Choose City</label>
	    	<select class="form-select form-control-sm" name="city" id="city">
	    		<?php foreach($cityArray as $key => $value): ?>
	    			<?php
	    				$selectedString = "";
	    				if(isset($requestParams['city']) && $requestParams['city'] == $key) {
	    					$selectedString = "selected";
	    				}
	    			?>
	    			<option value="{{$key}}" {{$selectedString}}>{{$value}}</option>
				<?php endforeach; ?>
	    	</select>
		</div>

		<div class="col-md-4">
			<a class="btn btn-primary mt-4 w-100" href="{{ route('client.create')}}">Add Client</a>
		</div>
	</div>
		<table class="table table-striped table-sm">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">name</th>
		      <th scope="col">city</th>
		      <th scope="col">cod</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  </tbody>
		  <?php if(isset($clients)): ?>
		  	<?php foreach ($clients as $client): ?>
			    <tr>
			      <th scope="row">{{$client->id}}</th>
			      <td>{{$client->name}}</td>
			      <td>{{$client->city}}</td>
			      <td>{{$client->cod}}</td>
			      <td><a class="btn btn-small btn-primary" href="{{ route('client.show', $client->id)}}"><i class="bi bi-eye"></i></a></td>
			      <td><a class="btn btn-small btn-success" href="{{ route('client.edit', $client->id)}}"><i class="bi bi-pencil"></i></a></td>
			      <td><a class="btn btn-small btn-danger" href="{{ route('client.destroy', $client->id)}}"><i class="bi bi-trash"></i></a></td>
			    </tr>
			<?php endforeach; ?>
			<?php else: ?>
				No Data
		<?php endif; ?>
		    
		  </tbody>
		</table>

		{{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $clients->links() !!}
        </div>

	</div>

@endsection

@section('scripts')
	<script>
		$('#city').on('change', function() {
	  		window.location = '/client/index?city='+this.value;
	  		if(this.value == "all") {
	  			window.location = '/client/index';
	  		}
		});

		$('#pagination').on('change', function() {
	  		window.location = '/client/index?pagination='+this.value;
		});


	</script>
@endsection


