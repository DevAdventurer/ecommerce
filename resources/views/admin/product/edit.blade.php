@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/summernote/summernote-bs4.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/select2/css/select2.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/flatpickr/flatpickr.min.css')}}"> 

<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

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

{!! Form::open(['method' => 'PUT', 'route'=>['admin.'.request()->segment(2).'.update',$product->id], 'class' => 'form-horizontal','files'=>true, 'id'=>'productForm']) !!}

<div class="row my-1">
    <div class="col-lg-8 col-8">

        <div class="card">
            <div class="card-body">

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Product Title') !!}
                    {!! Form::text('title', $product->title, ['class' => 'form-control', 'placeholder' => 'Product Title']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>


                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', $product->body, ['class' => 'editor form-control']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>

                <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                    {!! Form::label('short_description', 'Short Description') !!}
                    {!! Form::textarea('short_description', $product->short_description, ['class' => 'editor form-control']) !!}
                    <small class="text-danger">{{ $errors->first('short_description') }}</small>
                </div>

            </div>
        </div>



        <div id="product-selection-variant" class="card" @if($product->product_selectio_type == 'simple') style="display:none;" @else style="display:block;" @endif>
            <div class="card-header">
                <h6 class="card-title mb-0">Product Variants</h6>
            </div>
            <div class="card-body">



                <div  class="report-repeater">
                    <button data-repeater-create type="button" class="btn btn-success" style="margin-bottom: 20px;"><i class="bx bx-plus-circle"></i></button>
                    <div data-repeater-list="group-a">
                    
                        @foreach($product->options as $option)


                        <div class="repeater-row"  data-repeater-item>
                        
                            <div class="row">


                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('option') ? ' has-error' : '' }}">
                                        {!! Form::label('option', 'Option') !!}
                                        {!! Form::text('option', $option->name, ['class' => 'form-control', 'placeholder' => 'Option Name']) !!}
                                        <small class="small">Example: Color</small>
                                        <small class="text-danger">{{ $errors->first('option') }}</small>
                                    </div>
                                </div>


                                <div class="col-md-7">

                                    @php $tmp = ''; 
                                        foreach ($option->optionValues as $value){
                                            $tmp .= $value->option_value . ','; 
                                        }
                                        $tmp = trim($tmp, ',');    // remove trailing comma
                                     //dd($tmp);
                                    @endphp


                                    <div class="form-group{{ $errors->has('option_value') ? ' has-error' : '' }}">
                                        {!! Form::label('option_value', 'Option Value') !!}
                                        {!! Form::text('option_value', $tmp, ['class' => 'tagify form-control', 'placeholder' => 'Option Value']) !!}
                                        <small class="small">Example: Red,Green,Blue</small>
                                        <small class="text-danger">{{ $errors->first('option_value') }}</small>
                                    </div>

                                </div>


                                <div class="col-md-1">
                                    <div class="form-group">

                                      <button data-repeater-delete type="button" class="btn btn-danger" style="margin-top: 26px;"><i class="bx bx-minus-circle"></i></button>
                                  </div>
                              </div>


                          </div>
                        

                      </div>
                      @endforeach

                  </div>

              </div>

              {!! Form::button('Get Variants', ['class' => 'btn btn-soft-success btn-border waves-effect waves-light', 'onclick'=>'getVariants($(this))']) !!}

              <div id="variants"></div>
          </div>
      </div>


    
      <div id="product-selection-simple" class="card" >
        <div class="card-body">
            <div class="variant-container">
                @php
                    $count = 0; 
                @endphp 
                @foreach($product->productVariants as $variant)


                <div class="row g-2">

                 <div class="variant-inner col" style="max-width: 70px;">

                    <div class="form-group">
                        <span class="default-image" data-image="product-images-{{\Str::slug($variant->variant)}}">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M19 2.5a1.5 1.5 0 0 0-1.5-1.5h-15a1.5 1.5 0 0 0-1.5 1.5v15a1.5 1.5 0 0 0 1.5 1.5h7.5v-2h-6.503c-.41 0-.64-.46-.4-.79l3.553-4.051c.19-.21.52-.21.72-.01l1.63 1.851 3.06-4.781a.5.5 0 0 1 .84.02l.72 1.251a5.98 5.98 0 0 1 2.38-.49h3v-7.5zm-11.5 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm12.207 10.793a1 1 0 0 0-.707-.293h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 0 0 .707-1.707z"></path></svg>
                        </span>
                    </div>
                </div>


                @if($product->product_selectio_type == 'simple')

                    <div class="variant-inner col" style="display:none;">
                        <div class="form-group{{ $errors->has('variant') ? ' has-error' : '' }}">
                            {!! Form::label('variant', 'Variant') !!}
                            {!! Form::text('variants['.$count.'][value]', 'Default Title', ['class' => 'form-control', 'required' => 'required', 'readonly'=>'readonly']) !!}
                            <small class="text-danger">{{ $errors->first('variant') }}</small>
                        </div>
                    </div>
                @endif

                @if($product->product_selectio_type == 'variant')
                    <div class="variant-inner col">
                        <div class="form-group{{ $errors->has('variant') ? ' has-error' : '' }}">
                            {!! Form::label('variant', 'Variant') !!}
                            {!! Form::text('variants['.$count.'][value]', $variant->variant, ['class' => 'form-control', 'required' => 'required', 'readonly'=>'readonly']) !!}
                            <small class="text-danger">{{ $errors->first('variant') }}</small>
                        </div>
                    </div>
                @endif


                <div class="variant-inner col">
                    <div class="form-group{{ $errors->has('quantity_on_hand') ? ' has-error' : '' }}">
                        {!! Form::label('quantity_on_hand', 'Quantity On Hand') !!}
                        {!! Form::text('variants['.$count.'][quantity_on_hand]', $variant->stock, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Quantity On Hand']) !!}
                        <small class="text-danger">{{ $errors->first('quantity_on_hand') }}</small>
                    </div>
                </div>


                <div class="variant-inner col">
                    <div class="form-group{{ $errors->has('quantity_available') ? ' has-error' : '' }}">
                        {!! Form::label('quantity_available', 'Quantity Available') !!}
                        {!! Form::text('variants['.$count.'][quantity_available]', $variant->available_stock, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Quantity Available']) !!}
                        <small class="text-danger">{{ $errors->first('quantity_available') }}</small>
                    </div>
                </div>

                <div class="variant-inner col">
                    <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                        {!! Form::label('sku', 'SKU') !!}
                        {!! Form::text('variants['.$count.'][sku]', $variant->sku, ['class' => 'form-control', 'required' => 'required','placeholder'=>'SKU']) !!}
                        <small class="text-danger">{{ $errors->first('sku') }}</small>
                    </div>
                </div>

                <div class="variant-inner col">
                    <div class="form-group{{ $errors->has('variant_price') ? ' has-error' : '' }}">
                        {!! Form::label('variant_price', 'Variant Price') !!}
                        {!! Form::text('variants['.$count.'][variant_price]', $variant->variant_price, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Variant Price']) !!}
                        <small class="text-danger">{{ $errors->first('variant_price') }}</small>
                    </div>
                </div>

                <div class="variant-inner col">
                    <div class="form-group{{ $errors->has('variant_sale_price') ? ' has-error' : '' }}">
                        {!! Form::label('variant_sale_price', 'Variant Sale Price') !!}
                        {!! Form::text('variants['.$count.'][variant_sale_price]', $variant->variant_sale_price, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Variant Sale Price']) !!}
                        <small class="text-danger">{{ $errors->first('variant_sale_price') }}</small>
                    </div>
                </div>
            



            @if($variant->variantMedias->count() > 0)

                
                <div class="varinat-images product-images-{{\Str::slug($variant->variant)}}" style="display:block;">
                    <div class="media-area" file-name="variants[{{$count}}][images]">

                        
                        <div class="media-file-value">
                            @foreach($variant->variantMedias as $media)
                            <input type="hidden" name="variants[{{$count}}][images][]" value="{{$media->id}}" class="fileid{{$media->id}}">
                            @endforeach
                        </div>
                        <div class="media-file">
                            @foreach($variant->variantMedias as $media)
                            <div class="file-container d-inline-block fileid{{$media->id}}">
                                <span data-id="{{$media->id}}" class="remove-file">✕</span>
                                <img class="w-100 d-block img-thumbnail" src="{{asset($media->file)}}" alt="{{$media->name}}">
                            </div>
                            @endforeach
                        </div>
                        

                        <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='multiple' onclick="loadMediaFiles($(this))">Select Product Image</a>
                    </div>
                </div>

            @else

                    <div class="varinat-images product-images-{{\Str::slug($variant->variant)}}">
                        <div class="media-area" file-name="variants[{{$count}}][images]">
                            <div class="media-file-value"></div>
                            <div class="media-file"></div>
                            <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='multiple' onclick="loadMediaFiles($(this))">Select Product Image</a>
                        </div>
                    </div>

            @endif



            </div>
            @php
                $count++; 
            @endphp 
            @endforeach

           


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
            {!! Form::text('meta_title', $product->meta_title, ['class' => 'form-control', 'placeholder' => 'Meta Title']) !!}
            <small class="text-danger">{{ $errors->first('meta_title') }}</small>
        </div>

        <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
            {!! Form::label('meta_description', 'Meta Description') !!}
            {!! Form::textarea('meta_description', $product->meta_description, ['class' => 'form-control', 'placeholder' => 'Meta Description']) !!}
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
                                {!! Form::select('status', [0=>'Draft', 1=>'Publish'], $product->status, ['id' => 'my_status', 'class' => 'form-control get_category_list', 'placeholder' => 'Select status',]) !!}
                                <small class="text-danger">{{ $errors->first('status') }}</small>
                            </div>


                            <div class="form-group{{ $errors->has('published_date') ? ' has-error' : '' }}">
                                {!! Form::label('published_date', 'Publish Date') !!}
                                {{$product->published_at->format('Y-m-d')}}
                                {!! Form::text('published_date', $product->published_at->format('d-m-y'), ['class' => 'dateSelector form-control', 'placeholder' => 'Publish Date']) !!}
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
                                {!! Form::select('brand', App\Models\Brand::pluck('name','id'), $product->brand_id, ['id' => 'brand', 'class' => 'form-control', 'placeholder' => 'Select Brand']) !!}
                                <small class="text-danger">{{ $errors->first('brand') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('product_type') ? ' has-error' : '' }}">
                                {!! Form::label('product_type', 'Product Type') !!}
                                {!! Form::select('product_type', App\Models\ProductType::pluck('name', 'id'), $product->product_type_id, ['id' => 'product_type', 'class' => 'form-control', 'placeholder' => 'Select Product Type']) !!}
                                <small class="text-danger">{{ $errors->first('product_type') }}</small>
                            </div>


                            <div class="form-group{{ $errors->has('vendor') ? ' has-error' : '' }}">
                                {!! Form::label('vendor', 'Vendor') !!}
                                {!! Form::select('vendor', App\Models\Vendor::pluck('name', 'id'), $product->vendor_id, ['id' => 'vendor', 'class' => 'form-control', 'placeholder' => 'Select Vendor']) !!}
                                <small class="text-danger">{{ $errors->first('vendor') }}</small>
                            </div>

                        </div>
                    </div>




                    <div class="card">
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('collections') ? ' has-error' : '' }}">
                                {!! Form::label('collections', 'Select Collection') !!}
                                {!! Form::select('collections[]', App\Models\Collection::pluck('title','id'), $product->collections, ['id' => 'collections','data-placeholder'=>'Select Collection', 'class' => 'form-control js-example-basic-multiple',  'multiple']) !!}
                                <small class="text-danger">{{ $errors->first('collections') }}</small>
                            </div>


                            <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                {!! Form::label('tags', 'Select Tag') !!}
                                {!! Form::select('tags[]', App\Models\Tag::pluck('name','id'), $product->tags, ['id' => 'tags','data-placeholder'=>'Select Tag', 'class' => 'form-control js-example-basic-multiple',  'multiple']) !!}
                                <small class="text-danger">{{ $errors->first('tags') }}</small>
                            </div>



                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('product_selectio_type') ? ' has-error' : '' }}">
                                {!! Form::label('product_selectio_type', 'Product Selection Type') !!}
                                {!! Form::select('product_selectio_type', ['simple'=>'Simple Product', 'variant'=>'Variant Product'], $product->product_selectio_type, ['id' => 'product_selectio_type', 'class' => 'form-control', 'required' => 'required', 'placeholder'=>'Product Selection Type', 'onchange'=>'productSelection($(this))']) !!}
                                <small class="text-danger">{{ $errors->first('product_selectio_type') }}</small>
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

            <script type="text/javascript" src="{{asset('admin-assets/js/pages/form-repeater.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
            <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
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
                dateFormat: "d-m-Y",
            });

                });


                if($('.report-repeater').length){
                    var  reportRepeater = $('.report-repeater').repeater({
                        defaultValues: {
                            'textarea-input': 'foo',
                            'text-input': 'bar',
                        },
                        show: function () {
                            $(this).slideDown();
                            new Tagify(this.querySelector('.tagify'), {
                                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
                            });

                            
                        },
                        hide: function (deleteElement) {
                            if(confirm('Are you sure you want to delete this?')) {
                              $(this).slideUp(deleteElement);
                          }
                          setTimeout(function(){ update_amounts(); }, 500);
                      },
                      isFirstItemUndeletable: true
                  });
                }

                function getVariants(element){

                    var button = new Button(element);
                    button.process();
                    clearErrors();
                    var requestData,otpdata,data;

                    formData = new FormData(document.querySelector('#productForm'));

                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url:'{{ route('admin.generate.variant') }}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success:function(response){

                            //console.log(response);
                            $('#variants').html(response);
                            Toastify({
                                text: response.message,
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                className: response.class,

                            }).showToast();

                        },
                        error:function(error){
                            console.log(error)
                            button.normal();
                            handleErrors(error.responseJSON);

                        }
                    });
                }

                // $(document).ready(function(){
                //     var input = document.querySelector('.tagify');
                //     tagify = new Tagify(input, {
                //         originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
                //     });
                // });


                const allInputs = document.querySelectorAll('.tagify');

                  allInputs.forEach((input) => {
                        tagify = new Tagify(input, {
                        originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
                    });
                });
                

                function productSelection(e){
                    var product_selection = e.val();
                    if(product_selection == 'simple'){
                        $("#product-selection-variant").slideUp();
                        $("#product-selection-simple").slideDown();
                        
                    }
                    if(product_selection == 'variant'){
                        $("#product-selection-variant").slideDown();
                        $("#product-selection-simple").slideUp();
                       
                    }
                }
            </script>



            @endpush