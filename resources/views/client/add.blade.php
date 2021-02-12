
@extends('layouts.main')

@section('title')
    Add Client
@endsection

@section('content')

    @include('includes.header')

      <?php
            $action = '/client/store';

            $cod = "";
            $name = "";
            $city = "";

            $buttonText = 'Add Client';

            if(isset($client->id)) {
                  $action = '/client/update/'.$client->id;
                  $buttonText = 'Update Client';
            }

            if(isset($client->cod)) {
                  $cod = $client->cod;
            }

            if(isset($client->name)) {
                  $name = $client->name;
            }


            if(isset($client->city)) {
                  $city = $client->city;
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
              <?php if(isset($client->name)): ?>
              <h1 class="h3 mb-3 font-weight-normal mt-5"> Edit Client</h1>
              <?php else: ?>
                <h1 class="h3 mb-3 font-weight-normal  mx-auto w-50 mt-5"> Add Client</h1>
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

                  <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{$city}}">
                  </div>

             
                  <button type="submit" class="btn btn-primary">{{$buttonText}} <i class="bi bi-box-arrow-in-right"></i></button>


            </form>
    </div>


@endsection
