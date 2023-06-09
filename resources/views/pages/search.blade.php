@extends('frontend.layouts.app')



@section('content')
<section class="page-banner padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="text-uppercase">العقارات</h1>
          <ol class="breadcrumb text-center">
            <li><a href="{{route('home')}}">الرئيسية</a></li>
            <li class="active">قائمة العقارات</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

<!-- Listing Start -->
<section id="listing1" class="listing1 padding_top">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-md-9 text-center">
              <h2 class="uppercase">قائمة العقارات</h2>
              <p class="heading_space">تصفح مجموعة متنوعه من العقارات المميزة</p>
            </div>
          </div>
          <div class="row">      
            @foreach($properties as $property)

            <div class="col-sm-6">
              <div class="property_item heading_space">
                <div class="property_head text-center">
                  <h3 class="captlize"><a href="{{ route('property.show',$property->slug) }}">{{ str_limit( $property->title, 18 ) }}</a></h3>
                  <p>{{ $property->address }} -  {{ $property->city }}</p>
                </div>
                <div class="image">
                  @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                  <a href="{{ route('property.show',$property->slug) }}"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{ str_limit( $property->title, 18 ) }}"  class="img-responsive"></a>
                  @else
                  <a href="{{ route('property.show',$property->slug) }}."><img src="{{$property->image}}" alt="{{ str_limit( $property->title, 18 ) }}" class="img-responsive"></a> 
                  @endif
                  <div class="price clearfix"> 
                    <span class="tag">{{$property->status}}</span>
                  </div>
                </div>
                <div class="proerty_content">
                  <div class="property_meta"> 
                    <span><i class="icon-select-an-objecto-tool"></i>{{ $property->area}} متر مربع</span>
                    <span><i class="icon-bed"></i>غرف {{ $property->bedroom}}</span> 
                    <span><i class="icon-safety-shower"></i>دورات مياه {{ $property->bathroom}}</span> 
                  </div>
                  <div class="favroute clearfix">
                    <p class="pull-md-left">{{ $property->price }} ريال</p>
                    <ul class="pull-right">
                      <li><a href="{{ route('property.show',$property->slug) }}"><i class="icon-like"></i></a></li>
                      <li><a href="{{ route('property.show',$property->slug) }}" class="share_expender" data-toggle="collapse"><i class="icon-information"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
         
          <div class="padding_bottom text-center">
            {{ $properties->links() }}
          </div>

        </div>
        <aside class="col-md-4 col-xs-12">
          <div class="property-query-area clearfix" dir="rtl">
            <div class="col-md-12">
              <h3 class="text-uppercase bottom20 top15 text-center">البحث المخصص</h3>
            </div>
            <form method="GET" action="{{ route('search')}}" class="callus">

                <div class="single-query form-group col-sm-12">
                    <input type="text" class="keyword-input" name="city" placeholder="مدينة-منطقة">
                  </div>
        
        
                  <div class="single-query form-group col-sm-12">
                    <div class="intro">
                      <select name="type">
                        <option value="شقة">شقة</option>
                        <option value="بيت">بيت</option>
                        <option value="ملحق">ملحق</option>
                        <option value="عمارة">عمارة</option>
                    </select>
                  </div>
                  </div>
        
                <div class="single-query form-group col-sm-12">
                    <div class="intro">
                      <select name="purpose">
                        <option value="ايجار">ايجار</option>
                        <option value="بيع">بيع</option>
                    </select>
                    </div>
                  </div>
        
                <div class="single-query form-group col-sm-12">
                    <div class="intro">
                      <select class="custom-select-box">
                        <option value="" disabled selected>عدد الغرف</option>
                        @if(isset($bedroomdistinct))
                             @foreach($bedroomdistinct as $bedroom)
                                 <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                             @endforeach
                         @endif
                        </select>
                      </div>
                </div>
                <div class="col-sm-12 form-group text-center">
                    <button type="submit" class="btn-blue border_radius top15"><i class="icon-search"></i> بحث</button>
                </div>
      
          
        
                </form>
          
          </div>
  
        </aside>
      </div>
    </div>
  </section>
        
@endsection
