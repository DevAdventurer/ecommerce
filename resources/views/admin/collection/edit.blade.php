@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/summernote/summernote-bs4.min.css')}}"> 
@endpush




@section('main')



        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
                    @can('add_slider')
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

<div class="row">
            <div class="col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    {!! Form::open(['method' => 'PUT', 'route' => ['admin.'.request()->segment(2).'.update', $category->id], 'class' => 'form-horizontal','files'=>true]) !!}
                    <div class="row">

                        <div class="col-md-7 col-sm-12"> 

                          

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Category Name') !!}
                                {!! Form::text('name', $category->name, ['class' => 'form-control','placeholder'=>'Enter Category Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>



                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', 'Description') !!}
                                {!! Form::textarea('description', $category->body, ['class' => 'form-control summernote', 'placeholder' => 'Description']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div>

                            

                           
                        </div>
                        <div class="col-md-5 col-sm-12">

                        

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                {!! Form::label('status', 'Select Status') !!}
                                {!! Form::select('status', [0=>'Draft', 1=>'Publish'], $category->status, ['id' => 'my_status', 'class' => 'form-control get_category_list', 'placeholder' => 'Select status',]) !!}
                                <small class="text-danger">{{ $errors->first('status') }}</small>
                            </div>


                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                {!! Form::label('image', 'Image') !!}
                                {!! Form::file('image', ['class'=>'dropify','data-default-file'=>asset($category->image)]) !!}
                                <small class="text-danger">{{ $errors->first('image') }}</small>
                            </div>

                            <div class="btn-group">
                                {!! Form::submit("Update Category", ['class' => 'btn btn-soft-secondary waves-effect waves-light']) !!}
                            </div>


                        </div>


                    </div>
                    
                    {!! Form::close() !!}




                </div>
            </div>
        </div>
    </div>


</div>













@endsection
@push('scripts')
<script src="{{asset('admin-assets/libs/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/dropify/dropify.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/summernote/summernote-bs4.min.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('textarea').summernote({
        height: 200,
      });
    });
</script>
@endpush