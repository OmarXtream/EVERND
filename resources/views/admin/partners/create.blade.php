@extends('backend.layouts.app')

@section('title', 'Create Feature')

@push('styles')

    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.partners.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>رجوع</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>إضافة شريك</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.partners.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control">
                                <label class="form-label">اسم الشريك</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" name="img">
                            <label class="form-label">شعار الشريك</label>

                        </div>
                        
                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>إنشاء</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')



@endpush
