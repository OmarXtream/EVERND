@extends('frontend.layouts.app')

@section('content')



@extends('frontend.layouts.app')
@section('content')


<section class="page-banner padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="text-uppercase">تسجيل حساب</h1>
          <ol class="breadcrumb text-center">
            <li><a href="{{route('home')}}">الرئيسية</a></li>
            <li class="active">تسجيل</li>
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
                <h3 style="color:white;margin-bottom:20px ">سجل الآن مع إفرند</h3>
                <form method="POST" action="{{ route('register') }}" class="callus clearfix-box">
                    <input type="hidden" name="agent" value="3" />
                        @csrf
    

                        <div class="single-query form-group col-sm-12">
                            <input type="text" class="keyword-input {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="الاسم" name="name" value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong style="color:white">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
      
                          </div>
      
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
  

                      <div class="single-query form-group col-sm-12">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="keyword-input" placeholder="تأكيد كلمة المرور" required>
                      </div>

                    <div class=" col-sm-12 mb-2">
                      <input type="submit" value="تسجيل" class="btn-slide border_radius"> 
                    </div>
                    <div class="row mt-2">
                          <div class="col-sm-12 text-center" style="margin-top:10px;">
                            <a href="{{route('login')}}" class="lost-pass">لديك حساب بالفعل ؟ دخول الآن</a>
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

<div class="ltn__login-area pb-110 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">سجل <br>حسابك الآن</h1>
                    <p>التسجيل مع إكمال</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form method="POST" action="{{ route('register') }}" class="ltn__form-box contact-form-box">
                        <input type="hidden" name="agent" value="3" />

                        @csrf
                        <input type="text" id="name" type="name" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="الاسم*">
                        @if ($errors->has('name'))
                        <span class="helper-text" data-error="wrong" data-success="right">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                        <input type="text" id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="البريد الإلكتروني*">
                        @if ($errors->has('email'))
                        <span class="helper-text" data-error="wrong" data-success="right">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <input type="password" id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required placeholder="كلمة المرور*">
                        @if ($errors->has('password'))
                        <span class="helper-text" data-error="wrong" data-success="right">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <input type="password" id="password_confirmation" type="password" name="password_confirmation" required placeholder="تأكيد كلمة المرور*">

                        <label class="checkbox-inline">
                            التسجيل ك مُسوق عقاري
                        </label>
                        <input type="checkbox" name="agent" class="filled-in" />
                       
                        <label class="checkbox-inline">
                            بالنقر فوق "إنشاء حساب" ، ف انت توافق على <a href="{{ route('policy') }}">سياسة الخصوصية</a>                        
                        </label>
                        <div class="btn-wrapper">
                            <button class="theme-btn-1 btn reverse-color btn-block" type="submit">إنشاء حساب</button>
                        </div>
                    </form>
                    <div class="by-agree text-center">
                        <div class="go-to-btn">
                            لديك حساب بالفعل ؟  <a href="{{route('login')}}">دخول الآن</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->
@endsection