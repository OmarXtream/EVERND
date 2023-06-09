@extends('frontend.layouts.app')

@section('content')


<section id="error-404" class="padding">
    <div class="container text-center">
      <div class="row">
        <div class="col-xs-12">
          <div class="error-image margin_bottom">
            <img src="{{asset('frontend/images/404-other.png')}}" alt="image" class="img-responsive"/>
          </div>
          </div>
          <div class="col-xs-12">
          <div class="error-text">
            <h1 class="bold-text">تم الإرسال بنجاح</h1>
            <h3>شكرا لكم , سيتم التواصل معكم</h3>

            <div class="erro-button">
              <a href="{{route('home')}}" class="btn-blue">العودة للصفحة الرئيسية</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


     

@endsection
