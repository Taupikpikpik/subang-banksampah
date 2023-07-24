<div class="header">
        <div class="header-left">
          <a href="{{url('/admin')}}" class="logo">
            <img src="{{asset('vendor/dashboard')}}/assets/img/logo.png" alt="Logo">
          </a>
          <a href="{{url('/admin/venue')}}" class="logo logo-small">
            <img src="{{asset('vendor/dashboard')}}/assets/img/logo.png" alt="Logo" width="30" height="30">
          </a>
        </div>
        <a href="javascript:void(0);" id="toggle_btn">
          <i class="fas fa-bars"></i>
        </a>
        <a class="mobile_btn" id="mobile_btn">
          <i class="fas fa-bars"></i>
        </a>
        <ul class="nav user-menu">
          <li class="nav-item dropdown has-arrow main-drop ml-md-3">
            <a href="index.html#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <span class="user-img">
                <img src="{{asset('vendor/dashboard')}}/assets/img/logo.png" alt="">
                <span class="status online"></span>
              </span>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{url('logout')}}">
                <i class="feather-power"></i> Keluar </a>
            </div>
          </li>
        </ul>
      </div>