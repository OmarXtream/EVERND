@extends('frontend.layouts.app')



@section('content')


<section class="page-banner padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1 class="text-uppercase">{{$post->title}}</h1>
            <ol class="breadcrumb text-center">
               <li><a href="{{route('home')}}">الرئيسية</a></li>
               <li class="active">{{$post->title}}</li>
            </ol>
         </div>
      </div>
   </div>
</section>



<section id="news-section-1" class="news-section-details property-details padding_top">
    <div class="container">
          
      <div class="row heading_space">
      
        <div class="col-md-12">
        
            <div class="row">
          
              <div class="news-1-box clearfix">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}" class="img-responsive"/>
                  </div>
                  
                  <div class="col-md-12 col-sm-12 col-xs-12 top30">
                  
                      <div class="news-details bottom10">
                          <span><i class="icon-icons230"></i> {{$post->user->name}}</span>
                          <span><i class="icon-icons228"></i> {{$post->created_at->diffForHumans()}}</span>
                      </div>
                      
                      <h3>{{$post->title}}</h3>
                      
                      {!! $post->body !!}
                      
  
                  </div>
              </div>
              
           </div>
              
          <div class="row heading_space">
          
            <div class="news-2-tag">
            <div class="col-md-5 col-sm-5 col-xs-12 top15">
              <h4>التصنيفات</h4>

              @foreach($post->categories as $key => $category)
              <p class="p-font-15">{{$category->name}}</p>

              @endforeach

            </div>
            
            <div class="col-md-7 col-sm-7 col-xs-12 text-right">
              <div class="social-icons">
                <h4>مشاركة</h4>
                <ul class="social_share">
                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" title="فيس بوك" class="facebook"><i class="icon-facebook-1"></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?text= {{Request::url()}}" target="_blank" title="تويتر" class="twitter"><i class="icon-twitter-1"></i></a></li>
                    <li><a target="_blank" href="whatsapp://send?text={{Request::url()}}" title="واتساب" class="google"><i class="icon-google4"></i></a></li>
                 </ul>
              </div>
            </div>
            </div>
                  
         </div>
          
           <div class="row heading_space">
              <div class="col-md-12 bottom10">
                  <h2 class="text-uppercase">{{ $post->comments_count }} تعليقات </h2>
              </div>
           </div>
           

           @foreach($post->comments as $comment)
    
           @if($comment->parent_id == NULL)

           <div class="row bottom10">
              
              <div class="col-md-10 col-sm-10 col-xs-12">
              
                  <div class="news-comnts-text">
                      <h4>{{ $comment->users->name }} <span>{{ $comment->created_at->diffForHumans() }}</span></h4>
                      <p class="p-font-15">{{ $comment->body }}</p>
                  </div>
                      
              </div>
              
           </div>
           
           <hr>
           @endif
           @endforeach

           
          
          
          <div class="row">
              <div class="col-md-12 margin40">
                  <h2 class="text-uppercase bottom20 text-center">اترك تعليق</h2>
              </div>
           </div>
           @auth

          <form dir="rtl" action="{{ route('blog.comment',$post->id) }}" method="post" class="callus padding_bottom">
            @csrf
            <input type="hidden" name="parent" value="0">

            <div class="row text-center">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea class="form-control" name="body" placeholder="اكتب تعليقك هنا"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12 row">
                    <div class="row text-center">
                      <div class="col-sm-3">
                        <input type="submit" class="btn-blue uppercase border_radius" value="ارسال">
                      </div>
                    </div>
                  </div>
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
  </section>
    



@endsection

@section('scripts')

@endsection