<nav class="navbar ms-navbar">
      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
      <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href=""><img src="img/cairo-chamber-logo-footer.png"
            alt="logo"> </a>
      </div>
      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
        </li>
        <!-- ar & en switch -->
        <!-- <li class="ms-nav-item  mt-2">
          <div class="switch">
            <div class="quality">
              <input checked="" id="q1" name="q" type="radio" value="q1">
              <label for="q1">EN</label>
            </div>
            <div class="quality">
              <input id="q2" name="q" type="radio" value="q2">
              <label for="q2">AR</label>
            </div>
          </div>
        </li> -->
        <!-- /ar & en switch -->
        <li class="ms-nav-item ms-nav-user dropdown">
          <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="ms-user-img ms-img-round float-left" src="https://via.placeholder.com/270x270" alt="people">
            <span class="float-right">{{Auth::guard('admin')->user()->name}}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, {{Auth::guard('admin')->user()->name}}</span></h6>
            </li>
         
            <li class="dropdown-divider"></li>
              @if (Auth::user()->role==1)  
              <li class="ms-dropdown-list">
          
                <a class="media fs-14 p-2" href="{{ url('admin/register') }}"> <span><i class="flaticon-user mr-2"></i>إنشاء مستخدم جديد</span>
                <li class="dropdown-divider"></li>
                <a class="media fs-14 p-2" href="{{ route('usersList.index') }}"> <span><i class="flaticon-user mr-2"></i>قائمة المستخدمين</span>
              </a>
               
              </li>
              @endif
            <li class="dropdown-divider"></li>
            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="{{ route('admin-logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <span><i class="flaticon-shut-down mr-2"></i> خروج</span>
              </a>
               <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </li>
          </ul>
        </li>
      </ul>
      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
    </nav>
    <!-- /navar -->