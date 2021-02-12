
@extends('layouts.main')

@section('title')
    User egister
@endsection

@section('content')

    @include('includes.header')

    <div class="container">
            <form class="w-50 mx-auto" method="POST" action="{{ route('user.register')}}">

               <h1 class="h3 mb-3 font-weight-normal">Create an Account</h1>
                @csrf
        
                  <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                  </div>

                  <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                  </div>
             
             
                  <button type="submit" class="btn btn-primary">Register</button>


            </form>
    </div>


@endsection
