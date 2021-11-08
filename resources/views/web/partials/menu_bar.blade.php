<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href="#">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </div>

     
        
    </div>
    <div class="text-right">
      @if(!Auth::check())
      <a href="{{url('login')}}" style="padding: 3px !important" class="mt-2 btn btn-outline-light">Login</a>
      @else
      <a href="javascript:void(0)" style="padding: 3px !important" class="mt-2 btn btn-outline-light">{{Auth::user()->username}}</a>
 
      <form  style="display: inline-block" action="{{ route('logout') }}" method="POST" >
        @csrf
        <button type="submit" style="padding: 3px !important" class="mt-2 btn btn-outline-light">Logout</button>
     </form>
      @endif
    </div>
  </nav>