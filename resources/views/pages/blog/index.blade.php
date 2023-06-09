@extends('frontend.layouts.app')


@section('content')

<section class="page-banner padding">
    <div class="container">
       <div class="row">
          <div class="col-md-12 text-center">
             <h1 class="text-uppercase">المدونة</h1>
             <ol class="breadcrumb text-center">
                <li><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="active">منشورات المدونة</li>
             </ol>
          </div>
       </div>
    </div>
 </section>
 
    
 <section id="news" class="news-section-details padding_bottom_half padding_top">
    <div class="container">
      <div class="row">
        
        @forelse($posts as $post)

        <div class="col-md-4 col-sm-6 col-xs-12 heading_space">
          <div class="sim-lar-p">
            <div class="image bottom20"><img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}"></div>
            <div class="sim-lar-text">
              <h3 class="bottom10"><a href="{{ route('blog.show',$post->slug) }}">{{$post->title}}</a></h3>
              <p> {{$post->user->name}} <span>|</span> {{$post->created_at->diffForHumans()}}</p>
              <p class="bottom20">{!! str_limit($post->body,120) !!}        </p>
              <a class="btn-more" href="{{ route('blog.show',$post->slug) }}">
              <i><img alt="arrow" src="{{asset('frontend/images/arrowl.png')}}"></i><span>تفاصيل اكثر</span><i><img alt="arrow" src="{{asset('frontend/images/arrowr.png')}}"></i>
              </a>
            </div>
          </div>
        </div>
  
        @empty
        <h1 class="text-center mb-5">لا يوجد اي منشورات حالياً</h1>
        @endforelse

      </div>
    </div>
  </section>
  


@endsection
