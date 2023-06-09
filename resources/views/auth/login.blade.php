@extends('frontend.layouts.app')
@section('content')


<section class="page-banner padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="text-uppercase">تسجيل الدخول</h1>
          <ol class="breadcrumb text-center">
            <li><a href="{{route('home')}}">الرئيسية</a></li>
            <li class="active">دخول</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  
  <section id="login" class="padding" dir="rtl">
    <div class="container">
      <h3 class="hidden">hidden</h3>
      <div class="row">

        <div class="col-md-12 text-center">
          <div class="profile-login" style="padding: 30px 0 20px 0">

            <div class="agent-p-form">
                <h3 style="color:white;margin-bottom:20px ">سجل الدخول مع إفرند</h3>
                <form method="POST" action="{{ route('login') }}" class="callus clearfix-box">
                        @csrf
    
                    <div class="single-query form-group col-sm-12">
                      <input type="email" class="keyword-input {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="البريد الإلكتروني" name="email" value="{{ old('email') }}" required>
                      @if ($errors->has('email'))
                      <span class="helper-text" data-error="wrong" data-success="right">
                          <strong style="color:white">{{ $errors->first('email') }}</strong>
                      </span>
                  @endif

                    </div>

                    <div class="single-query form-group col-sm-12">
                        <input type="password" class="keyword-input {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="كلمة المرور" name="password" value="{{ old('password') }}" required>
                        @if ($errors->has('password'))
                        <span class="helper-text" data-error="wrong" data-success="right">
                            <strong style="color:white">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
  
                      </div>
  
                    <div class=" col-sm-12 mb-2">
                      <input type="submit" value="دخول" class="btn-slide border_radius"> 
                    </div>
                    <div class="row mt-2">
                          <div class="col-sm-12 text-center" style="margin-top:10px;">
                            <a href="{{route('register')}}" class="lost-pass">ليس لديك حساب ؟ سجل الآن</a>
                          </div>
                      </div>
  
                  </form>
                  
                </div>
                
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
