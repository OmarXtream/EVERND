@extends('frontend.layouts.app')

@section('content')

<section class="page-banner padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="text-uppercase">العقارات</h1>
          <ol class="breadcrumb text-center">
            <li><a href="{{route('home')}}">الرئيسية</a></li>
            <li class="active">طلب عقار</li>
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
                <h2>بيانات الطلب</h2>
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

              <form action="{{route('PropertieRequest.create')}}" method="POST" class="callus" dir="rtl">
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

           

                </div>

                <h6>تفاصيل العقار</h6>

                <div class="col-md-12">



                   <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('type')) is-invalid @endif" id="type" name="type" type="text" value="{{ old('type') }}" placeholder="نوع العقار">
                    @if ($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                    @endif               
                   </div>
                </div>
 
                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('city')) is-invalid @endif" id="city" name="city" type="text" value="{{ old('city') }}" placeholder="مدينة العقار">
                    @if ($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif               
                   </div>
                </div>


                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('rooms')) is-invalid @endif" id="rooms" name="rooms" type="number" value="{{ old('rooms') }}" placeholder="عدد الغرف">
                    @if ($errors->has('rooms'))
                    <span class="text-danger">{{ $errors->first('rooms') }}</span>
                    @endif               
                   </div>

                </div>

                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('baths')) is-invalid @endif" id="baths" name="baths" type="number" value="{{ old('baths') }}" placeholder="دورات المياه">
                    @if ($errors->has('baths'))
                    <span class="text-danger">{{ $errors->first('baths') }}</span>
                    @endif               
                   </div>
                </div>


                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('min_price')) is-invalid @endif" id="min_price" name="min_price" type="text" value="{{ old('min_price') }}" placeholder="أقل قيمة للعقار">
                    @if ($errors->has('min_price'))
                    <span class="text-danger">{{ $errors->first('min_price') }}</span>
                    @endif               
                   </div>
                </div>

                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('max_price')) is-invalid @endif" id="max_price" name="max_price" type="text" value="{{ old('max_price') }}" placeholder="أعلى قيمة للعقار">
                    @if ($errors->has('max_price'))
                    <span class="text-danger">{{ $errors->first('max_price') }}</span>
                    @endif               
                   </div>
                </div>

                   <h6>الأحياء</h6>

                   <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('first_district')) is-invalid @endif" id="first_district" name="first_district" type="text" value="{{ old('first_district') }}" placeholder="الحي الاول">
                    @if ($errors->has('first_district'))
                    <span class="text-danger">{{ $errors->first('first_district') }}</span>
                    @endif               
                   </div>
                </div>
                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('Second_district')) is-invalid @endif" id="Second_district" name="Second_district" type="text" value="{{ old('Second_district') }}" placeholder="الحي الثاني">
                    @if ($errors->has('Second_district'))
                    <span class="text-danger">{{ $errors->first('Second_district') }}</span>
                    @endif               
                   </div>
                </div>

                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('Third_district')) is-invalid @endif" id="Third_district" name="Third_district" type="text" value="{{ old('Third_district') }}" placeholder="الحي الثالث">
                    @if ($errors->has('Third_district'))
                    <span class="text-danger">{{ $errors->first('Third_district') }}</span>
                    @endif               
                   </div>
                </div>

                <div class="col-md-6">

                   <div class="single-query form-group">
                    <input class="keyword-input @if ($errors->has('Fourth_district')) is-invalid @endif" id="Fourth_district" name="Fourth_district" type="text" value="{{ old('Fourth_district') }}" placeholder="الحي الرابع">
                    @if ($errors->has('Fourth_district'))
                    <span class="text-danger">{{ $errors->first('Fourth_district') }}</span>
                    @endif               
                   </div>
                </div>

                   <h6>تفاصيل إضافية</h6>


                   <div class="single-query form-group">
                    <textarea placeholder="تفاصيل إضافيه" id="details" name="details"" class="form-control">{{ old('details') }}</textarea>
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
