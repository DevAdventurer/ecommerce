@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/summernote/summernote-bs4.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/select2/css/select2.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/flatpickr/flatpickr.min.css')}}"> 

@endpush




@section('main')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
            @can('add_product')
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

{!! Form::open(['method' => 'POST', 'route' => 'admin.product.inventory.store', 'class' => 'form-horizontal','files'=>true]) !!}



            <div class="row my-1">
                <div class="col-lg-8 col-8">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('title', 'Product Title') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Product Title']) !!}
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>


                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', 'Description') !!}
                                {!! Form::textarea('description', null, ['class' => 'editor form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                                {!! Form::label('short_description', 'Short Description') !!}
                                {!! Form::textarea('short_description', null, ['class' => 'editor form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('short_description') }}</small>
                            </div>
                        
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">SEO</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group{{ $errors->has('meta_title') ? ' has-error' : '' }}">
                                {!! Form::label('meta_title', 'Meta Title') !!}
                                {!! Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => 'Meta Title']) !!}
                                <small class="text-danger">{{ $errors->first('meta_title') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                                {!! Form::label('meta_description', 'Meta Description') !!}
                                {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'placeholder' => 'Meta Description']) !!}
                                <small class="text-danger">{{ $errors->first('meta_description') }}</small>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-lg-4 col-4">


                    <div class="card">

                        {{-- <div class="card-header">
                            <h6 class="card-title mb-0">Publish</h6>
                        </div> --}}

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
                                {!! Form::submit("Save ".Str::title(str_replace('-', ' ', request()->segment(2))), ['class' => 'btn btn-soft-success btn-border waves-effect waves-light']) !!}
                            </div>

                        </div>
                    </div>


                    <div class="card">

                        {{-- <div class="card-header">
                            <h6 class="card-title mb-0">Product Data</h6>
                        </div> --}}

                        <div class="card-body">

                            <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                {!! Form::label('brand', 'Brand') !!}
                                {!! Form::select('brand', App\Models\Brand::pluck('name','id'), null, ['id' => 'brand', 'class' => 'form-control', 'placeholder' => 'Select Brand']) !!}
                                <small class="text-danger">{{ $errors->first('brand') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('product_type') ? ' has-error' : '' }}">
                                {!! Form::label('product_type', 'Product Type') !!}
                                {!! Form::select('product_type', App\Models\ProductType::pluck('name', 'id'), null, ['id' => 'product_type', 'class' => 'form-control', 'placeholder' => 'Select Product Type']) !!}
                                <small class="text-danger">{{ $errors->first('product_type') }}</small>
                            </div>


                            <div class="form-group{{ $errors->has('vendor') ? ' has-error' : '' }}">
                                {!! Form::label('vendor', 'Vendor') !!}
                                {!! Form::select('vendor', App\Models\Vendor::pluck('name', 'id'), null, ['id' => 'vendor', 'class' => 'form-control', 'placeholder' => 'Select Vendor']) !!}
                                <small class="text-danger">{{ $errors->first('vendor') }}</small>
                            </div>

                        </div>
                    </div>
            



                    <div class="card">
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('collections') ? ' has-error' : '' }}">
                                {!! Form::label('collections', 'Select Collection') !!}
                                {!! Form::select('collections[]', App\Models\Collection::pluck('title','id'), null, ['id' => 'collections','data-placeholder'=>'Select Collection', 'class' => 'form-control js-example-basic-multiple',  'multiple']) !!}
                                <small class="text-danger">{{ $errors->first('collections') }}</small>
                            </div>


                            <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                {!! Form::label('tags', 'Select Tag') !!}
                                {!! Form::select('tags[]', App\Models\Tag::pluck('name','id'), null, ['id' => 'tags','data-placeholder'=>'Select Tag', 'class' => 'form-control js-example-basic-multiple',  'multiple']) !!}
                                <small class="text-danger">{{ $errors->first('tags') }}</small>
                            </div>



                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('sale_price') ? ' has-error' : '' }}">
                                {!! Form::label('sale_price', 'Sale Price') !!}
                                {!! Form::text('sale_price', null, ['class' => 'form-control', 'placeholder' => 'Sale Price']) !!}
                                <small class="text-danger">{{ $errors->first('sale_price') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('featured_image') ? ' has-error' : '' }}">
                                {!! Form::label('featured_image', 'Featured Image') !!}
                                {!! Form::file('featured_image', ['class'=>'dropify']) !!}
                                <small class="text-danger">{{ $errors->first('featured_image') }}</small>
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



        $(".dateSelector").flatpickr({
            dateFormat: "d F Y",
        });

    });

   

 </script>

@endpush