@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/summernote/summernote-bs4.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/select2/css/select2.min.css')}}"> 

@endpush




@section('main')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
            @can('add_post')
            <div class="page-title-right">
                <a href="{{ route('admin.'.request()->segment(2).'.create') }}"  class="btn-sm btn btn-primary btn-label rounded-pill">
                    <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i>
                    Add {{Str::title(str_replace('-', ' ', request()->segment(2)))}}
                </a>
            </div>
            @endcan

        </div>
    </div>
</div>
<!-- end page title -->
    {!! Form::open(['method' => 'PUT', 'route'=>['admin.'.request()->segment(2).'.update',$post->id], 'class' => 'form-horizontal','files'=>true]) !!}


            <div class="row my-1">
                <div class="col-lg-7 col-7">

                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Post Title') !!}
                            {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder'=>'Post Title']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                            {!! Form::label('subtitle', 'Subtitle') !!}
                            {!! Form::text('subtitle', $post->subtitle, ['class' => 'form-control', 'placeholder'=>'Post Subtitle']) !!}
                            <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                        </div>


                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            {!! Form::label('body', 'Content') !!}
                            {!! Form::textarea('body', $post->body, ['class' => 'form-control editor']) !!}
                            <small class="text-danger">{{ $errors->first('body') }}</small>
                        </div>
                    
                        <div class="btn-group">
                            {!! Form::submit("Update Post", ['class' => 'btn btn-soft-secondary waves-effect waves-light']) !!}
                        </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-5 col-5">

                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {!! Form::label('status', 'Select Status') !!}
                        {!! Form::select('status', [0=>'Draft', 1=>'Public'], $post->status, ['id' => 'my-status', 'class' => 'form-control', 'placeholder' => 'Choose Status']) !!}
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>


                    <div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}">
                        {!! Form::label('categories', 'Select Catagory') !!}
                        {!! Form::select('categories[]', App\Models\Category::pluck('name','id'), $post->categories, ['id' => 'categories','data-placeholder'=>'Select Category', 'class' => 'form-control js-example-basic-multiple',  'multiple']) !!}
                        <small class="text-danger">{{ $errors->first('categories') }}</small>
                    </div>


                    <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                        {!! Form::label('tags', 'Select Tag') !!}
                        {!! Form::select('tags[]', App\Models\Tag::pluck('name','id'), $post->tags, ['id' => 'tags','data-placeholder'=>'Select Tag', 'class' => 'form-control js-example-basic-multiple',  'multiple']) !!}
                        <small class="text-danger">{{ $errors->first('tags') }}</small>
                    </div>



                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">

                            {!! Form::label('image', 'Image') !!}

                            {!! Form::file('image', ['class'=>'dropify','data-default-file'=>asset($post->image)]) !!}

                            <small class="text-danger">{{ $errors->first('image') }}</small>

                    </div>
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




 <script src="{{asset('admin-assets/libs/select2/js/select2.min.js')}}" type="text/javascript"></script>

<script src="{{asset('admin-assets/js/pages/select2.init.js')}}" type="text/javascript"></script>

<script type="text/javascript">

    jQuery(document).ready(function() {



        $('.editor').summernote({

            height: 250, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
            popover: { image: [], link: [], air: [] }

        });



        $('.inline-editor').summernote({

            airMode: true

        });



    });

   

 </script>

@endpush