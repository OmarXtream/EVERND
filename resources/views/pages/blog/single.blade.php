@extends('frontend.layouts.app')

@section('styles')
<style>
    
.frame{
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
  height: 80px;
  width: 350px;
  position: relative;
   box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001,
   inset 0px 0px 0px 0px #fff9,
   inset 0px 0px 0px 0px #0001,
   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
   border-radius: 10px;
}

.share-button{
  height: 35px;
  width: 35px;
  border-radius: 3px;
  background: #e0e5ec;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  -webkit-tap-highlight-color: transparent;
  box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001,
   inset 0px 0px 0px 0px #fff9,
   inset 0px 0px 0px 0px #0001,
   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
  font-size: 16px;
  color: rgba(42, 52, 84, 1);
  text-decoration: none;
}
.share-button:active{
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
}
    </style>
@endsection

@section('content')


    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">{{$post->title}}</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{route('home')}}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> الرئيسية</a></li>
                                <li>{{$post->title}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <div class="ltn__page-details-area ltn__blog-details-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__blog-details-wrap">
                        <div class="ltn__page-details-inner ltn__blog-details-inner">
                            <div class="ltn__blog-meta">
                                <ul>
                            @foreach($post->categories as $key => $category)
                            <li class="ltn__blog-category">
                                <a href="#">{{$category->name}}</a>
                            </li>
                            @endforeach

                                </ul>
                            </div>
                            <h2 class="ltn__blog-title">{{$post->title}}</h2>
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#">{{$post->user->name}}</a>
                                    </li>
                                    <li class="ltn__blog-date">
                                        <i class="far fa-calendar-alt"></i>{{$post->created_at->diffForHumans()}}
                                    </li>
                                    <li>
                                        <a href="#"><i class="far fa-comments"></i>{{ $post->comments_count }} تعليق</a>
                                    </li>
                                </ul>
                            </div>

                            <img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}">

                            <div style="overflow-wrap: break-word;">
                            {!! $post->body !!}
                            </div>
                            
                        </div>
                  
                        <hr>
                        <!-- comment-area -->
                        <div class="ltn__comment-area mb-50">
                            <h4 class="title-2">{{ $post->comments_count }} تعليقات</h4>
                            <div class="ltn__comment-inner">
                                <ul>
                                    @foreach($post->comments as $comment)
    
                                    @if($comment->parent_id == NULL)
    
                                    <li>
                                        <div class="ltn__comment-item clearfix">
                                            <div class="ltn__commenter-img">
                                                <img src="{{ Storage::url('users/'.$comment->users->image) }}" alt="{{ $comment->users->name }}">
                                            </div>
                                            <div class="ltn__commenter-comment">
                                                <h6><a href="#">{{ $comment->users->name }}</a></h6>
                                                <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                                                <p>{{ $comment->body }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
    
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <!-- comment-reply -->
                        <div class="ltn__comment-reply-area ltn__form-box mb-60---">
                            <h4 class="title-2">ترك تعليق</h4>
                            @auth

                            <form action="{{ route('blog.comment',$post->id) }}" method="post" class="comment-form default-form">
                                @csrf
                                <input type="hidden" name="parent" value="0">

                                <div class="input-item input-item-textarea ltn__custom-icon">
                                    <textarea name="body"  placeholder="اكتب تعليقك هنا...."></textarea>
                                </div>
                                <div class="btn-wrapper">
                                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit"><i class="far fa-comments"></i> ارسال</button>
                                </div>
                            </form>
                            @endauth
                            @guest 
                            <div class="text-center">
                                <a href="{{ route('login') }}">
                                <h6 class="text-bold" style="color:#000">سجل الدخول لترك تعليق</h6>
                                </a>
                            </div>
                        @endguest

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
                        <!-- Tagcloud Widget -->
                        <div class="widget ltn__tagcloud-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">العناوين المرتبطة</h4>
                            <ul>
                                @foreach($post->tags as $key => $tag)
                                <li>
                                    <a href="{{ route('blog.tags',$tag->slug) }}">{{$tag->name}}</a>
                                </li>
                                @endforeach
                        </ul>
                        </div>
                        <!-- Social Media Widget -->
                        <div class="widget ltn__social-media-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">مشاركة التدوينة</h4>
                            <div class="ltn__social-media-2 text-center">
                                <ul>
                                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" title="فيس بوك"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a target="_blank" href="https://twitter.com/intent/tweet?text=لا تفوتك هذي التدوينة الرهيبه ! {{Request::url()}}" title="تويتر"><i class="fab fa-twitter"></i></a></li>
                                    <li><a target="_blank" href="whatsapp://send?text={{Request::url()}}" title="واتساب"><i class="fab fa-whatsapp"></i></a></li>
                                
                                    <li><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{Request::url()}}" title="لنكد ان"><i class="fab fa-linkedin"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        
                    </aside>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('scripts')

@endsection