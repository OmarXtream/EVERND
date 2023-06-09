<!--Header-->
<header class="white_header">
    <div class="topbar white border">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <p>تجربة استثنائية في عالم العقارات</p>
          </div>
          <div class="col-md-7 text-right">
            <ul class="breadcrumb_top text-right">
          @auth
  
        <li><a href="#"><i class="icon-icons230"></i>{{Auth::user()->name}}</a></li>
  
        <li>
        <a class="dropdownitem indigo-text" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                          <i class="icon-arrow-right3"></i>
                                          </a>
              
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                          </form>
                                        </li>
          @endauth
  
        @guest
  
        <li><a href="{{ route('login') }}"><i class="icon-icons179"></i>دخول - تسجيل</a></li>
        @endguest
  
            </ul>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-default bootsnav">
      <div class="container">
        <div class="attr-nav">
          <div class="upper-column info-box first">
            <div class="icons"><i class="icon-telephone114"></i></div>
            <ul>
              <li><strong>اتصل بنا</strong></li>
              <li>+966 55 555 5555</li>
            </ul>
          </div>
        </div>
        <!-- Start Header Navigation -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand" href="{{ route('home') }}"><img width="200px" height="80px" src="{{asset('frontend/images/logo.png')}}" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->
        <div class="collapse navbar-collapse" id="navbar-menu">
          <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
            <li><a href="{{ route('contact') }}">تواصل معنا</a></li>       
            <li><a href="{{ route('blog') }}">المدونة</a></li>
            <li><a href="{{ route('InfoForm') }}">حلول تمويلية</a></li>
            <li><a href="{{ route('PropertiesMarkating') }}">تسويق عقار</a></li>
            <li><a href="{{ route('PropertieRequest') }}">طلب عقار</a></li>
            <li><a href="{{ route('property') }}">العقارات</a></li>
            <li><a href="{{ route('home') }}">الرئيسية</a></li>

              </ul>
        </div>
      </div>
    </nav>
  </header>
  <!--Header-->

    