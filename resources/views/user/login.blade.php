
@extends('layouts.main')

@section('title')
    User Dashboard
@endsection

@section('content')

    @include('includes.header')

    <div class="container">

          @if (session('success'))
          <div class="notification success closeable">
        <p> {{ session('success') }}</p>
        <a class="close" href="#"></a>
      </div>
        @endif

     

           @if (session('error'))
            <div class="notification error closeable">
          <p> {{ session('error') }}</p>
          <a class="close" href="#"></a>
        </div>
          @endif

            <form class="w-25 mx-auto mt-5" method="POST" action="{{ route('user.login')}}">

                  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

          @csrf
                  <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                        <div class="invalid-feedback" style="display: block !important;">{{ $errors->first('email') }}</div>
                  </div>

                  <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="invalid-feedback" style="display: block !important;">{{ $errors->first('password') }}</div>
                  </div>
             
             
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>


            </form>
    </div>


@endsection
