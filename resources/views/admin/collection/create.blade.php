@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/summernote/summernote-bs4.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/flatpickr/flatpickr.min.css')}}"> 
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
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Collection Title']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div> 



                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control editor', 'placeholder' => 'Description']) !!}
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>

                    </div>
                </div>
            </div>


            <div class="card">

                <div class="card-header">
                    <h6 class="card-title mb-0">SEO Metas</h6>
                </div>

                <div class="card-body">
                    <div class="form-group{{ $errors->has('meta_title') ? ' has-error' : '' }}">
                        {!! Form::label('meta_title', 'Meta Title') !!}
                        {!! Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => 'Meta Title']) !!}
                        <small class="text-danger">{{ $errors->first('meta_title') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                        {!! Form::label('meta_description', 'Meta Description') !!}
                        {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'placeholder' => 'Meta Description', 'rows'=>5]) !!}
                        <small class="text-danger">{{ $errors->first('meta_description') }}</small>
                    </div>
                </div>

            </div>



        </div>


        <div class="col-lg-4">
            <div class="card">

                <div class="card-header">
                    <h6 class="card-title mb-0">Publish</h6>
                </div>

                <div class="card-body">

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {!! Form::label('status', 'Select Status') !!}
                        {!! Form::select('status', [0=>'Draft', 1=>'Publish'], null, ['id' => 'my_status', 'class' => 'form-control get_category_list', 'placeholder' => 'Select status',]) !!}
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>


                    <div class="form-group{{ $errors->has('published_date') ? ' has-error' : '' }}">
                        {!! Form::label('published_date', 'Publish Date') !!}
                        {!! Form::text('published_date', null, ['class' => 'dateSelector form-control', 'placeholder' => 'Publish Date']) !!}
                        <small class="text-danger">{{ $errors->first('published_date') }}</small>
                    </div>

                     <div class="btn-group">
                        {!! Form::submit("Save ".Str::title(str_replace('-', ' ', request()->segment(2))), ['class' => 'btn btn-success btn-border waves-effect waves-light']) !!}
                    </div>

                </div>
            </div>
            


             <div class="card">
                
                <div class="card-body">

                    <div class="form-group{{ $errors->has('parrent') ? ' has-error' : '' }}">
                        {!! Form::label('parrent', 'Parent Collection') !!}
                        {!! Form::select('parrent', $collections, null, ['id' => 'parrent', 'class' => 'form-control', 'placeholder' => 'Choose Parent Collection']) !!}
                        <small class="text-danger">{{ $errors->first('parrent') }}</small>
                    </div>

                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Featured Image</h6>
                </div>
                <div class="card-body">

                    <div class="media-area" file-name="file">
                        <div class="media-file-value"></div>
                        <div class="media-file"></div>
                        <p><br></p>
                        <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Media File</a>
                    </div>
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
</script>
@endpush