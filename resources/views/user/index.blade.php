
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
	</div>


		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($users as $user): ?>
			    <tr>
			      <th scope="row">{{$user->id}}</th>
			      <td>{{$user->name}}</td>
			      <td>{{$user->email}}</td>
			      <td><a class="btn btn-small btn-primary" href="{{ route('user.show', $user->id)}}"><i class="bi bi-eye"></i></a>
			      <a class="btn btn-small btn-danger" href="{{ route('user.destroy', $user->id)}}"><i class="bi bi-trash"></i></a></td>
			    </tr>
			<?php endforeach; ?>
		    
		  </tbody>
		</table>

		{{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>

	</div>

@endsection


