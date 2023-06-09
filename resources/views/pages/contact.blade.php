@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<!-- Page Banner Start-->
<section class="page-banner page-banner-bg padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-right">
          <h1 class="p-white text-uppercase">تواصل معنا</h1>
          <p class="p-white">دعنا نساعدك في تحقيق أهدافك العقارية وبناء مستقبل ناجح معًا</p>

        </div>
      </div>
    </div>
  </section>
  <!-- Page Banner End --> 
  

  <section id="contact-us" class="padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 margin40">
          <div class="our-agent-box bottom30">
            <h2>تواصل معنا </h2>
          </div>
          <form id="contact-us" class="callus">
            @csrf
            @auth
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            @endauth

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="الإسم" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="البريد الإلكتروني" required>
                </div>
                <div class="form-group">
                  <input type="text" id="phone" name="phone" class="form-control" placeholder="رقم الهاتف" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" name="message" placeholder="الرسالة" required></textarea>
                </div>
              </div>
              <div class="col-sm-12 row">
                <div class="row">
                  <div class="col-sm-3">
                    <button type="submit" id="msgsubmitbtn" name="submit-form" class="btn-blue uppercase border_radius">إرسال</button>
                  </div>
                </div>
              </div>

              <h1 class="text-center" id="result"></h1>

              <p class="form-messege mb-0 mt-20"></p>

            </div>
          </form>
        </div>
        <div class="col-sm-5 margin40">
          <div class="agent-p-contact">
            <div class="our-agent-box bottom30">
              <h2>اتصل بنا</h2>
            </div>
            <div class="agetn-contact-2 bottom30">
              <p><i class="icon-telephone114"></i> +966 55 555 5555</p>
              <p><i class=" icon-icons142"></i> info@evernd.com</p>
              <p><i class="icon-browser2"></i>www.evernd.com</p>
              <p><i class="icon-icons74"></i> Jeddah - Jeddah</p>
            </div>
            <ul class="social_share bottom20">
              <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i></a></li>
              <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i></a></li>
              <li><a href="javascript:void(0)" class="google"><i class="icon-google4"></i></a></li>
              <li><a href="javascript:void(0)" class="linkden"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')
    <script>

        $(function(){
            $(document).on('submit','#contact-us',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "{{ route('contact.message') }}";
                var btn = $('#msgsubmitbtn');
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('جاري الإرسال');
                    },
                    success: function(data) {
                        if (data.message) {
                            $('#result').empty().append(data.message);
                        }
                    },
                    error: function(xhr) {
                        M.toast({html: 'ERROR: Failed to send message!', classes: 'red darken-4'})
                    },
                    complete: function() {
                        $('form#contact-us')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('إرسال');
                    },
                    dataType: 'json'
                });

            })
        })

    </script>
@endsection