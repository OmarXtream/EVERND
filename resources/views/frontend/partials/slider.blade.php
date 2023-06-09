<section class="banner" dir="rtl">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-left">
            <h1 class="uppercase"><span>اكتشف مجموعة واسعة من العقارات المميزة</span> استعد لتجربة تسوق عقارية استثنائية</h1>
          </div>
          <div class="col-sm-4">
            <div class="row">
            <form method="GET" action="{{ route('search')}}" class="callus clearfix border_radius">

        <div class="single-query form-group">
            <input type="text" class="keyword-input" name="city" placeholder="مدينة-منطقة">
          </div>


          <div class="single-query form-group">
            <div class="intro">
              <select name="type">
                <option value="شقة">شقة</option>
                <option value="بيت">بيت</option>
                <option value="ملحق">ملحق</option>
                <option value="عمارة">عمارة</option>
            </select>
          </div>
          </div>

        <div class="single-query form-group">
            <div class="intro">
              <select name="purpose">
                <option value="ايجار">ايجار</option>
                <option value="بيع">بيع</option>
            </select>
            </div>
          </div>

        <div class="single-query form-group">
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
  
  
          <button type="submit" class="btn-blue border_radius top15"><i class="icon-search"></i> بحث</button>

        </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  