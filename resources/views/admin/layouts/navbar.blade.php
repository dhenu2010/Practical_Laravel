<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
              <li class="nav-item dropdown " title="Inquiry Notification">
        
      </li>
      <div class="user-panel mt-3 d-flex">
        <a href="{{route('profile-update',Auth::user()->id)}}">
             <div class="img">
                <img src="{{asset('uploads/logo.png')}}" class="img-circle " alt="User Image">
             </div>
             <div class="info">
                <a href="{{route('profile-update',Auth::user()->id)}}" class="d-block " >{{ Auth::user()->name }}</a>
             </div>
             </a>
     </div>
             
       <li class="nav-item">
        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();document.getElementById('logout-form').submit();">
           <i class="fas fa-sign-out-alt"></i>Logout
      </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
             </form>
      </li> 
    </ul>
  </nav>