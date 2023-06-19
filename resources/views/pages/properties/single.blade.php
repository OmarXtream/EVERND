@extends('frontend.layouts.app')

@section('content')


<section class="page-banner padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="text-uppercase">{{ $property->title }}</h1>
          <ol class="breadcrumb text-center">
            <li><a href="{{route('home')}}">الرئيسية</a></li>
            <li class="active">{{ $property->title }}</li>
          </ol>
        </div>
      </div>
    </div>
  </section>



  <section id="property" class="padding">
    <div class="container">
      <div class="row">
        @if (session()->has('message'))
        <div class="text-center alert alert-light">
            <h3 style="font-weight: bold; color:#000">{{ session('message') }}</h3>
        </div>
        @endif
        <div class="col-md-12 listing1 property-details">
          <h2 class="text-uppercase text-center">{{$property->title}}</h2>
          <p class="bottom30 text-center">{{ $property->address }} -  {{ $property->city }}</p>
          <p class="bottom30 text-center">ريال {{ $property->price }} </p>
          <p class="bottom30 text-center">رقم العرض {{ $property->offerNo }} </p>

          <div id="property-d-1" class="owl-carousel single">
            @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)

            <div class="item"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"/></div>
            @else
            <div class="item"><img src="{{$property->image}}" alt="{{$property->title}}"/></div>

            @endif
        </div>
          <div id="property-d-1-2" class="owl-carousel single">

            @if(!$property->gallery->isEmpty())

            @foreach($property->gallery as $gallery)

            <div class="item" ><img src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt="{{$property->title}}"/></div>

            @endforeach

            @else


            @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)

            <div class="item" ><img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"/></div>

            @else

            <div class="item" ><img src="{{$property->image}}" alt="{{$property->title}}"/></div>

            @endif
        
            @endif

        </div>
          <div class="property_meta bg-black bottom40">
            <span><i class="icon-select-an-objecto-tool"></i>{{ $property->area}} متر مربع</span>
            <span><i class="icon-bed"></i>{{ $property->bedroom}} غرف</span>
            <span><i class="icon-safety-shower"></i>دورات مياه {{ $property->bathroom}}</span>
            <span><i class="icon-mapmarker"></i>{{ $property->city}}</span>
            <span><i class="icon-information"></i>{{ $property->status}} - {{ $property->purpose}}</span>
          </div>
          <h2 class="text-uppercase text-center">وصف العقار</h2>
          {!! $property->description !!}



          <div class="row" style="margin-top:30px;">
            <div class="col-md-6 col-sm-12 col-xs-12 bottom40">
                <h2 class="text-uppercase bottom20 text-center">طلب العقار</h2>

              <form class="callus agent-message-box" method="POST" dir="rtl">
                @csrf
                <input type="hidden" name="agent_id" value="{{ $property->user->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="property_id" value="{{ $property->id }}">

                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="الإسم" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="phone" placeholder="رقم الهاتف" required>
                  </div>
  
                <div class="form-group">
                  <textarea class="form-control" name="message" placeholder="الرسالة"></textarea>
                </div>

                <button id="msgsubmitbtn" type="submit" class="btn-blue uppercase border_radius message-btn">إرسال الطلب</button>
              </form>
            </div>
            
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h2 class="text-uppercase bottom20 text-center mt-2">خصائص العقار</h2>
              <ul class="pro-list">
                @foreach($property->features as $feature)
                <li>{{$feature->name}}</li>
                @endforeach
              </ul>
            </div>
          </div>
  
          @if($videoembed)

          <h2 class="text-uppercase bottom20 text-center">مقطع فيديو للعقار</h2>
          <div class="row bottom40 text-center">
            <div class="col-md-12 padding-b-20">
              <div class="pro-video">
                {!! $videoembed !!}
            </div>
            </div>
          </div>
          @endif


          @if(Storage::disk('public')->exists('property/'.$property->floor_plan) && $property->floor_plan)

          <h2 class="text-uppercase bottom20">تخطيط الارض</h2>
          <div class="row bottom40">
            <div class="col-md-12 padding-b-20">
              <div class="pro-video">
                <img src="{{Storage::url('property/'.$property->floor_plan)}}" alt="{{$property->title}}" class="image-box">
                </div>
            </div>
          </div>
          @endif
          <div class="row bottom40">
            <div class="social-networks">
              <div class="social-icons-2">
                <span class="share-it">مشاركة - مفضلة</span>
                <span><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" title="فيس بوك"><i class="fa fa-facebook" aria-hidden="true"></i> فيس بوك</a></span>
                <span><a href="https://twitter.com/intent/tweet?text= مشاركة العقار {{Request::url()}}" target="_blank" title="تويتر"><i class="fa fa-twitter" aria-hidden="true"></i> تويتر</a></span>
                <span><a target="_blank" href="whatsapp://send?text={{Request::url()}}" title="واتساب"><i class="fa fa-whatsapp" aria-hidden="true"></i> واتساب</a></span>

                @if(!$fav)
                <span><a href="{{route('favorite.create',$property->id)}}" title="إضافة مفضلة"><i class="fa fa-heart" aria-hidden="true"></i></a></span>
                @else
                <span><a href="{{route('favorite.delete',$property->id)}}" title="حذف مفضلة"><i class="fa fa-heart" aria-hidden="true"></i></a></span>
                @endif

              </div>
            </div>
          </div>
  

      
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')

    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    
          

            // MESSAGE
            $(document).on('submit','.agent-message-box',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "{{ route('property.message') }}";
                var btn = $('#msgsubmitbtn');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('جاري الإرسال..');
                    },
                    success: function(data) {
                        if (data.message) {
                        $('form.agent-message-box')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('تم الإرسال');
                        }
                    },
                    error: function(xhr) {
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('إعادة الإرسال');
                    },
                    complete: function() {
                        $('form.agent-message-box')[0].reset();
                    },
                    dataType: 'json'
                });

            })
        })
    </script>
@endsection