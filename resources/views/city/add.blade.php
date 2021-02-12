
@extends('layouts.main')

@section('title')
    Add City
@endsection

@section('content')

    @include('includes.header')

      <?php
            $action = '/city/store';

            $cod = "";
            $name = "";

            $buttonText = 'Add city';

            if(isset($city->id)) {
                  $action = '/city/update/'.$city->id;
                  $buttonText = 'Update city';
            }

            if(isset($city->cod)) {
                  $cod = $city->cod;
            }

            if(isset($city->name)) {
                  $name = $city->name;
            }

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


            <form class="w-50 mx-auto" method="POST" action="{{ $action}}">

               <?php if(isset($city->name)): ?>
              <h1 class="h3 mb-3 font-weight-normal mt-5"> Edit City</h1>
              <?php else: ?>
                <h1 class="h3 mb-3 font-weight-normal  mx-auto w-50 mt-5"> Add City</h1>
            <?php endif;?>

                  @csrf
                  <div class="mb-3">
                        <label for="cod" class="form-label">Cod</label>
                        <input type="text" class="form-control" id="cod" name="cod" value="{{$cod}}">
                  </div>

                  <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$name}}">
                  </div>

             
                  <button type="submit" class="btn btn-primary">{{$buttonText}}</button>


            </form>
    </div>


@endsection
