
@extends('layouts.main')

@section('title')
    Cities
@endsection

@section('content')

    @include('includes.header')


    	<?php
    

    	$paginationArray = [];

    	$paginationArray[5] = 5;
    	$paginationArray[10] = 10;
    	$paginationArray[15] = 15;
    	$paginationArray[20] = 20;
?>

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
			<a class="btn btn-primary mt-4 w-100" href="{{ route('city.create')}}">Add City</a>
		</div>
	</div>


		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">cod</th>
		      <th scope="col">name</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($cities as $city): ?>
			    <tr>
			      <th scope="row">{{$city->id}}</th>
			      <td>{{$city->cod}}</td>
			      <td>{{$city->name}}</td>
			      <td><a class="btn btn-small btn-primary" href="{{ route('city.show', $city->id)}}"><i class="bi bi-eye"></i></a></td>
			      <td><a class="btn btn-small btn-success" href="{{ route('city.edit', $city->id)}}"><i class="bi bi-pencil"></i></a></td>
			      <td><a class="btn btn-small btn-danger" href="{{ route('city.destroy', $city->id)}}"><i class="bi bi-trash"></i></a></td>
			    </tr>
			<?php endforeach; ?>
		    
		  </tbody>
		</table>

		{{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $cities->links() !!}
        </div>

	</div>

@endsection


