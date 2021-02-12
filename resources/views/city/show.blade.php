
@extends('layouts.main')

@section('title')
     City
@endsection

@section('content')

    @include('includes.header')

    <div class="container mt-5">

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

      <h1 class="h3 mb-3 font-weight-normal  mx-auto w-50 mt-5"> Viewing: {{$city->name}}</h1>


      <div class="card mx-auto w-50 mt-5" style="width: 18rem;">

        <div class="card-body">
        <h5 class="card-title">Name: {{$city->name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Cod: {{$city->cod}}</h6>
        <a class="btn btn-small btn-success mt-5" href="{{ route('city.edit', $city->id)}}"><i class="bi bi-pencil"></i></a>
        <a class="btn btn-small btn-danger mt-5" href="{{ route('city.destroy', $city->id)}}"><i class="bi bi-trash"></i></a>
      </div>
      </div>

    </div>


@endsection
