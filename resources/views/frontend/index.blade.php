@extends('frontend.layouts.app')

@section('content')

<section id="property" class="padding index2 bg_light">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-10 text-right">
          <h2 class="uppercase">العقارات</h2>
          <p class="heading_space"> العقارات المميزه </p>
        </div>
      </div>
      <div class="row">
        <div class="three-item owl-carousel">
            @foreach($properties as $property)

          <div class="item">
            <div class="property_item">
              <div class="property_head default_clr  text-center">
                <h3 class="captlize"><a href="{{ route('property.show',$property->slug) }}">{{ str_limit( $property->title, 18 ) }}</a></h3>
                <p>{{ $property->address }} -  {{ $property->city }}</p>
              </div>
              <div class="image">
                @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                <a href="{{ route('property.show',$property->slug) }}"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{ str_limit( $property->title, 18 ) }}"  class="img-responsive"></a>
                @else
                <a href="{{ route('property.show',$property->slug) }}."><img src="{{$property->image}}" alt="{{ str_limit( $property->title, 18 ) }}" class="img-responsive"></a> 
                @endif

                
                <div class="price lighter clearfix"> 
                  <span class="tag pull-right">{{$property->status}}</span>
                </div>
              </div>
              <div class="proerty_content">
                <div class="property_meta"> 
                  <span><i class="icon-select-an-objecto-tool"></i>{{ $property->area}} متر مربع</span>
                  <span><i class="icon-bed"></i> {{ $property->bedroom}} غرف</span> 
                  <span><i class="icon-safety-shower"></i> {{ $property->bathroom}} دورات مياه</span> 
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
      </div>
    </div>
  </section>

  <section id="parallax" class="padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="parallax_inner text-center">
            <h2 class="text-capitalize bottom15">خدماتنا</h2>
            <p class="heading_space">لماذا تختارنا؟</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="parallax_inner text-center">
            <i class="icon-briefcase2 bottom30"></i>
            <h3 class="text-capitalize bottom15">التسويق العقاري</h3>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="parallax_inner text-center">
            <i class="icon-wallet2 bottom30"></i>
            <h3 class="text-capitalize bottom15">حلول مالية بأقل هامش ربح مع فائض</h3>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="parallax_inner text-center">
            <i class="icon-diamond2 bottom30"></i>
            <h3 class="text-capitalize bottom15">توفير العقار بالمواصفات المطلوبة </h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="logos">
    <div class="container partner2 padding">
      <div class="row">
        <div class="col-sm-12 text-center">
            <h2 class="uppercase">شركائنا</h2>
          <p class="heading_space">نفتخر بشركاء النجاح الذين يقدمون الدعم لنا في المشاريع العقارية والتجارية المختلفة</p>
        </div>
      </div>
      <div class="row">
      <div id="partners" class="owl-carousel">

            @foreach($partners as $partner)
            @if(Storage::disk('public')->exists('partners/'.$partner->img))
            <div class="item">
            <img src="{{Storage::url('partners/'.$partner->img)}}" alt="{{$partner->name}}">
             </div>

            @endif

            @endforeach


        </div>
      </div>
    </div>
  </section>
    

@endsection