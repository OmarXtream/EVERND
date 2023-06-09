@extends('frontend.layouts.app')


@section('content')

 <!-- BREADCRUMB AREA START -->
 <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">منشورات المدونة</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{route('home')}}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> الرئيسية</a></li>
                            <li>منشورات المدونة</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->
          
<!-- BLOG AREA START -->
<div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
    <div class="container">
        <div class="row">
            
            @forelse($posts as $post)

            <!-- Blog Item -->
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="{{ route('blog.show',$post->slug) }}"><img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <h3 class="ltn__blog-title"><a href="{{ route('blog.show',$post->slug) }}">{{$post->title}}</a></h3>

                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{$post->created_at->diffForHumans()}}</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="{{ route('blog.show',$post->slug) }}">تفاصيل أكثر</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            @empty
            <h1 class="text-center mb-5">لا يوجد اي منشورات حالياً</h1>
            @endforelse

            <!--  -->
        </div>
      
    </div>
</div>
<!-- BLOG AREA END -->

@endsection
