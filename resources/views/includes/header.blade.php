				

<nav class="navbar navbar-expand-lg navbar-light sticky-top mb-5" style="background-color: #e3f2fd;">
  <div class="container">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('clients') }}"> <i class="bi bi-people"></i> Clients</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('city')}}" > <i class="bi bi-building"></i> Cities</a>
        </li>
        
        
      </ul>

      <ul class="navbar-nav ml-auto">

         @auth

         <?php $userId = \Auth::user()->id; ?>

          <li class="nav-item float-right">
          <a class="nav-link" href="{{ route('user.show', $userId) }}"> <i class="bi bi-person"></i> Account</a>
        </li>

        <li class="nav-item float-right">
          <a class="nav-link" href="{{ route('user.logout') }}"> <i class="bi bi-box-arrow-right"></i>  Logout</a>
        </li>
        
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.login') }}"> <i class="bi bi-box-arrow-left"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.register') }}"> <i class="bi bi-person-plus"></i> Register</a>
        </li>

       
        @endauth

        
        
      </ul>
      
      
    </div>
  </div>
</nav>