@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/summernote/summernote-bs4.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/flatpickr/flatpickr.min.css')}}"> 
<style type="text/css">
    .icon-type-value{
        display:none;
    }
</style>
@endpush




@section('main')



<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
            @can('add_collection')
            <div class="page-title-right">
               
                <a href="{{ route('admin.'.request()->segment(2).'.index') }}"  class="btn-sm btn btn-secondary waves-effect waves-light btn-label rounded-pill">
                    <i class="bx bx-list-ul label-icon align-middle rounded-pill fs-16 me-2"></i>
                    {{Str::title(str_replace('-', ' ', request()->segment(2)))}} List
                </a>

            </div>
            @endcan

        </div>
    </div>
</div>
<!-- end page title -->



{!! Form::open(['method' => 'POST', 'route' => 'admin.'.request()->segment(2).'.store', 'class' => 'form-horizontal','files'=>true]) !!}
    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div> 



                        <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                            {!! Form::label('subtitle', 'Subtitle') !!}
                            {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'Subtitle']) !!}
                            <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                        </div>

                    </div>
                </div>
            </div>




        </div>


        <div class="col-lg-4">
            
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Icon</h6>
                </div>
                <div class="card-body">

                    <div class="form-group{{ $errors->has('icon_type') ? ' has-error' : '' }}">
                        {!! Form::label('icon_type', 'Icon Type') !!}
                        {!! Form::select('icon_type', ['image'=>'Image', 'icon'=>'Icon','svg'=>'SVG'], null, ['id' => 'icon_type', 'class' => 'icon_type form-control', 'placeholder' => 'Select Icon Type']) !!}
                        <small class="text-danger">{{ $errors->first('icon_type') }}</small>
                    </div>

                    <div class="icon-type-value main-image media-area" file-name="file">
                        <div class="media-file-value"></div>
                        <div class="media-file"></div>
                        <p><br></p>
                        <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Icon Image</a>
                    </div>

                    <div class="icon-type-value main-icon form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                        {!! Form::label('icon', 'Icon') !!}
                        {!! Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'fa fa-user']) !!}
                        <small class="text-danger">{{ $errors->first('icon') }}</small>
                    </div>

                    <div class="icon-type-value main-svg form-group{{ $errors->has('svg') ? ' has-error' : '' }}">
                        {!! Form::label('svg', 'SVG') !!}
                        {!! Form::text('svg', null, ['class' => 'form-control', 'placeholder' => 'SVG']) !!}
                        <small class="text-danger">{{ $errors->first('svg') }}</small>
                    </div>


                     <div class="btn-group">
                        {!! Form::submit("Save ".Str::title(str_replace('-', ' ', request()->segment(2))), ['class' => 'btn btn-success btn-border waves-effect waves-light']) !!}
                    </div>

                </div>
            </div>



    </div>
{!! Form::close() !!}







@endsection
@push('scripts')
<script src="{{asset('admin-assets/libs/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/dropify/dropify.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/flatpickr/flatpickr.js')}}"></script>



<script type="text/javascript">
    $(document).ready(function() {
      $('.editor').summernote({
        height: 200,
      });
    });

    $(".dateSelector").flatpickr({
        dateFormat: "d F Y",
    });

    $('body').on('change', '.icon_type', function(){
        var icon_type = $(this).val();
        $(".main-"+icon_type).slideDown();
    });
</script>
@endpush