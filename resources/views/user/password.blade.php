
@extends('layouts.main')

@section('title')
    User Dashboard
@endsection

@section('content')

    @include('includes.header')

    <div class="container">

    	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form class="w-50 mx-auto" method="POST" action="{{ route('user.password.update')}}">
            	@csrf
            		<input type="hidden" name="password_token" value="{{$passwordToken->id}}">
        
                  <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                  </div>

                  <div class="mb-3">
                        <label for="password_confirmed" class="form-label">Repeat Password</label>
                        <input type="password" class="form-control" id="password_confirmed" name="password_confirmation">
                  </div>
             
             
                  <button type="submit" class="btn btn-primary">Submit</button>


            </form>
    </div>


@endsection
