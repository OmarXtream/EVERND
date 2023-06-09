@extends('frontend.layouts.app')

@section('content')

<section class="page-banner padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="text-uppercase">العقارات</h1>
          <ol class="breadcrumb text-center">
            <li><a href="{{route('home')}}">الرئيسية</a></li>
            <li class="active">حلول تمويلية</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

<section id="contact-us" style="margin-top: 40px;">
  <div class="container">
    <div class="row">

        <div class="agent-p-form">
            <div class="our-agent-box bottom30 text-center">
                <h2>بيانات الطلب التمويلي</h2>
            </div>
            
            <div class="row">

                @if(Session::has('errors'))
                <div class="text-center alert alert-light">
                    <h5 style="font-weight: bold;">* فضلاً قم بملىء كل الحقول</h5>
                @if($errors->any())
                {!! implode('', $errors->all('<p style="color:red">:message</p>')) !!}
                @endif
                </div>
                @endif
                @if (session()->has('message'))
                <div class="text-center alert alert-light">
                    <h3 style="font-weight: bold; color:black">{{ session('message') }}</h3>
                </div>
                @endif            

              <form action="{{route('PropertiesMarkating.create')}}" method="POST" class="callus" dir="rtl">
                @csrf

                <h6>البيانات الشخصية</h6>

                <div class="col-md-12">

                <div class="col-md-6">
                  <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('name')) is-invalid @endif" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="الإسم">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif               
                   </div>
                </div>

                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('email')) is-invalid @endif" id="email" name="email" type="text" value="{{ old('email') }}" placeholder="البريد الإلكتروني">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif               
                   </div>
                </div>

                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('phone')) is-invalid @endif" id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="رقم الهاتف">
                    @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif               
                   </div>
                </div>

                <div class="col-md-6">

                    <div class="single-query form-group">
                     <input class="keyword-input @if ($errors->has('Age')) is-invalid @endif" id="Age" name="Age" type="text" value="{{ old('Age') }}" placeholder="العمر">
                     @if ($errors->has('Age'))
                     <span class="text-danger">{{ $errors->first('Age') }}</span>
                     @endif               
                    </div>
                 </div>

                 <div class="col-md-6">
                    <div class="single-query form-group">
                        <div class="intro">

                        <select name="type" class="@if ($errors->has('type')) is-invalid @endif">
                            <option value="" disabled selected>قطاع الوظيفة</option>
                            <option value="1">قطاع عسكري</option>
                            <option value="2">قطاع مدني</option>
                            <option value="3">قطاع خاص</option>
                        </select>
                    </div>
                        @if ($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                        @endif
                    </div>
                 </div>

                </div>

                <h6>المعلومات المالية</h6>

                <div class="col-md-12">



                   <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('commitments')) is-invalid @endif" id="commitments" name="commitments" type="text" value="{{ old('commitments') }}" placeholder="الإلتزامات الشهرية">
                    @if ($errors->has('commitments'))
                    <span class="text-danger">{{ $errors->first('commitments') }}</span>
                    @endif               
                   </div>
                </div>
 
                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('bank')) is-invalid @endif" id="bank" name="bank" type="text" value="{{ old('bank') }}" placeholder="البنك">
                    @if ($errors->has('bank'))
                    <span class="text-danger">{{ $errors->first('bank') }}</span>
                    @endif               
                   </div>
                </div>


                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('salary')) is-invalid @endif" id="salary" name="salary" type="text" value="{{ old('salary') }}" placeholder="الراتب">
                    @if ($errors->has('salary'))
                    <span class="text-danger">{{ $errors->first('salary') }}</span>
                    @endif               
                   </div>

                </div>

                <div class="col-md-6">
                    <div class="single-query form-group">
                        <div class="intro">

                        <select name="supported" class="@if ($errors->has('supported')) is-invalid @endif">
                            <option value="" disabled selected>* مدعوم من سكني؟</option>
                            <option value="1">لا</option>
                            <option value="2">نعم</option>
                        </select>
                    </div>
                        @if ($errors->has('supported'))
                        <span class="text-danger">{{ $errors->first('supported') }}</span>
                        @endif
                    </div>
                 </div>


       



                   <h6>تفاصيل إضافية</h6>


                   <div class="single-query form-group">
                    <textarea placeholder="تفاصيل إضافيه" id="notes" name="notes"" class="form-control">{{ old('notes') }}</textarea>
                  </div>

                  <input type="submit" value="إرسال" class="btn-blue">
                  </div>
              </form>
              
            </div>
            
        </div>



    </div>
</div>
</section>




@endsection
