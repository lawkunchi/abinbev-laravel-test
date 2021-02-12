
@extends('layouts.main')

@section('title')
    Add City
@endsection

@section('content')

    @include('includes.header')


    <div class="container">


   @if (session('success'))
     
          <div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
        @endif

           @if (session('error'))
                <div class="alert alert-success" role="alert">
  {{ session('error') }}
</div>
          @endif


            <form class="w-50 mx-auto mt-5" method="POST" action="{{ route('user.update') }}">

                  @csrf
                  <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        <div class="invalid-feedback" style="display: block !important;">{{ $errors->first('name') }}</div>
                  </div>

                  <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                        <div class="invalid-feedback" style="display: block !important;">{{ $errors->first('email') }}</div>
                  </div>

                  <?php if(\Auth::user()->id != $user->id): ?>
                    <input type="hidden" class="form-control" id="email" name="u" value="{{$user->id}}">
                  <?php endif;?>

             
                  <button type="submit" class="btn btn-primary">Update</button>


            </form>
    </div>


@endsection
