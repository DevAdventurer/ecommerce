<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/dropify/css/dropify.min.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/summernote/summernote-bs4.min.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/select2/css/select2.min.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/flatpickr/flatpickr.min.css')); ?>"> 

<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

<?php $__env->stopPush(); ?>




<?php $__env->startSection('main'); ?>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_product')): ?>
            <div class="page-title-right">

                <a href="<?php echo e(route('admin.'.request()->segment(2).'.index')); ?>"  class="btn-sm btn btn-secondary waves-effect waves-light btn-label rounded-pill">
                    <i class="bx bx-list-ul label-icon align-middle rounded-pill fs-16 me-2"></i>
                    <?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?> List
                </a>

            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- end page title -->

<?php echo Form::open(['method' => 'PUT', 'route'=>['admin.'.request()->segment(2).'.update',$product->id], 'class' => 'form-horizontal','files'=>true, 'id'=>'productForm']); ?>


<div class="row my-1">
    <div class="col-lg-8 col-8">

        <div class="card">
            <div class="card-body">

                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('title', 'Product Title'); ?>

                    <?php echo Form::text('title', $product->title, ['class' => 'form-control', 'placeholder' => 'Product Title']); ?>

                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>


                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('description', 'Description'); ?>

                    <?php echo Form::textarea('description', $product->body, ['class' => 'editor form-control']); ?>

                    <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('short_description') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('short_description', 'Short Description'); ?>

                    <?php echo Form::textarea('short_description', $product->short_description, ['class' => 'editor form-control']); ?>

                    <small class="text-danger"><?php echo e($errors->first('short_description')); ?></small>
                </div>

            </div>
        </div>



        <div id="product-selection-variant" class="card" <?php if($product->product_selectio_type == 'simple'): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
            <div class="card-header">
                <h6 class="card-title mb-0">Product Variants</h6>
            </div>
            <div class="card-body">



                <div  class="report-repeater">
                    <button data-repeater-create type="button" class="btn btn-success" style="margin-bottom: 20px;"><i class="bx bx-plus-circle"></i></button>
                    <div data-repeater-list="group-a">
                    
                        <?php $__currentLoopData = $product->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <div class="repeater-row"  data-repeater-item>
                        
                            <div class="row">


                                <div class="col-md-4">
                                    <div class="form-group<?php echo e($errors->has('option') ? ' has-error' : ''); ?>">
                                        <?php echo Form::label('option', 'Option'); ?>

                                        <?php echo Form::text('option', $option->name, ['class' => 'form-control', 'placeholder' => 'Option Name']); ?>

                                        <small class="small">Example: Color</small>
                                        <small class="text-danger"><?php echo e($errors->first('option')); ?></small>
                                    </div>
                                </div>


                                <div class="col-md-7">

                                    <?php $tmp = ''; 
                                        foreach ($option->optionValues as $value){
                                            $tmp .= $value->option_value . ','; 
                                        }
                                        $tmp = trim($tmp, ',');    // remove trailing comma
                                     //dd($tmp);
                                    ?>


                                    <div class="form-group<?php echo e($errors->has('option_value') ? ' has-error' : ''); ?>">
                                        <?php echo Form::label('option_value', 'Option Value'); ?>

                                        <?php echo Form::text('option_value', $tmp, ['class' => 'tagify form-control', 'placeholder' => 'Option Value']); ?>

                                        <small class="small">Example: Red,Green,Blue</small>
                                        <small class="text-danger"><?php echo e($errors->first('option_value')); ?></small>
                                    </div>

                                </div>


                                <div class="col-md-1">
                                    <div class="form-group">

                                      <button data-repeater-delete type="button" class="btn btn-danger" style="margin-top: 26px;"><i class="bx bx-minus-circle"></i></button>
                                  </div>
                              </div>


                          </div>
                        

                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>

              </div>

              <?php echo Form::button('Get Variants', ['class' => 'btn btn-soft-success btn-border waves-effect waves-light', 'onclick'=>'getVariants($(this))']); ?>


              <div id="variants"></div>
          </div>
      </div>


    
      <div id="product-selection-simple" class="card" >
        <div class="card-body">
            <div class="variant-container">
                <?php
                    $count = 0; 
                ?> 
                <?php $__currentLoopData = $product->productVariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <div class="row g-2">

                 <div class="variant-inner col" style="max-width: 70px;">

                    <div class="form-group">
                        <span class="default-image" data-image="product-images-<?php echo e(\Str::slug($variant->variant)); ?>">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M19 2.5a1.5 1.5 0 0 0-1.5-1.5h-15a1.5 1.5 0 0 0-1.5 1.5v15a1.5 1.5 0 0 0 1.5 1.5h7.5v-2h-6.503c-.41 0-.64-.46-.4-.79l3.553-4.051c.19-.21.52-.21.72-.01l1.63 1.851 3.06-4.781a.5.5 0 0 1 .84.02l.72 1.251a5.98 5.98 0 0 1 2.38-.49h3v-7.5zm-11.5 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm12.207 10.793a1 1 0 0 0-.707-.293h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 0 0 .707-1.707z"></path></svg>
                        </span>
                    </div>
                </div>


                <?php if($product->product_selectio_type == 'simple'): ?>

                    <div class="variant-inner col" style="display:none;">
                        <div class="form-group<?php echo e($errors->has('variant') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('variant', 'Variant'); ?>

                            <?php echo Form::text('variants['.$count.'][value]', 'Default Title', ['class' => 'form-control', 'required' => 'required', 'readonly'=>'readonly']); ?>

                            <small class="text-danger"><?php echo e($errors->first('variant')); ?></small>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($product->product_selectio_type == 'variant'): ?>
                    <div class="variant-inner col">
                        <div class="form-group<?php echo e($errors->has('variant') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('variant', 'Variant'); ?>

                            <?php echo Form::text('variants['.$count.'][value]', $variant->variant, ['class' => 'form-control', 'required' => 'required', 'readonly'=>'readonly']); ?>

                            <small class="text-danger"><?php echo e($errors->first('variant')); ?></small>
                        </div>
                    </div>
                <?php endif; ?>


                <div class="variant-inner col">
                    <div class="form-group<?php echo e($errors->has('quantity_on_hand') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('quantity_on_hand', 'Quantity On Hand'); ?>

                        <?php echo Form::text('variants['.$count.'][quantity_on_hand]', $variant->stock, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Quantity On Hand']); ?>

                        <small class="text-danger"><?php echo e($errors->first('quantity_on_hand')); ?></small>
                    </div>
                </div>


                <div class="variant-inner col">
                    <div class="form-group<?php echo e($errors->has('quantity_available') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('quantity_available', 'Quantity Available'); ?>

                        <?php echo Form::text('variants['.$count.'][quantity_available]', $variant->available_stock, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Quantity Available']); ?>

                        <small class="text-danger"><?php echo e($errors->first('quantity_available')); ?></small>
                    </div>
                </div>

                <div class="variant-inner col">
                    <div class="form-group<?php echo e($errors->has('sku') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('sku', 'SKU'); ?>

                        <?php echo Form::text('variants['.$count.'][sku]', $variant->sku, ['class' => 'form-control', 'required' => 'required','placeholder'=>'SKU']); ?>

                        <small class="text-danger"><?php echo e($errors->first('sku')); ?></small>
                    </div>
                </div>

                <div class="variant-inner col">
                    <div class="form-group<?php echo e($errors->has('variant_price') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('variant_price', 'Variant Price'); ?>

                        <?php echo Form::text('variants['.$count.'][variant_price]', $variant->variant_price, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Variant Price']); ?>

                        <small class="text-danger"><?php echo e($errors->first('variant_price')); ?></small>
                    </div>
                </div>

                <div class="variant-inner col">
                    <div class="form-group<?php echo e($errors->has('variant_sale_price') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('variant_sale_price', 'Variant Sale Price'); ?>

                        <?php echo Form::text('variants['.$count.'][variant_sale_price]', $variant->variant_sale_price, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Variant Sale Price']); ?>

                        <small class="text-danger"><?php echo e($errors->first('variant_sale_price')); ?></small>
                    </div>
                </div>
            



            <?php if($variant->variantMedias->count() > 0): ?>

                
                <div class="varinat-images product-images-<?php echo e(\Str::slug($variant->variant)); ?>" style="display:block;">
                    <div class="media-area" file-name="variants[<?php echo e($count); ?>][images]">

                        
                        <div class="media-file-value">
                            <?php $__currentLoopData = $variant->variantMedias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="variants[<?php echo e($count); ?>][images][]" value="<?php echo e($media->id); ?>" class="fileid<?php echo e($media->id); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="media-file">
                            <?php $__currentLoopData = $variant->variantMedias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="file-container d-inline-block fileid<?php echo e($media->id); ?>">
                                <span data-id="<?php echo e($media->id); ?>" class="remove-file">✕</span>
                                <img class="w-100 d-block img-thumbnail" src="<?php echo e(asset($media->file)); ?>" alt="<?php echo e($media->name); ?>">
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        

                        <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='multiple' onclick="loadMediaFiles($(this))">Select Product Image</a>
                    </div>
                </div>

            <?php else: ?>

                    <div class="varinat-images product-images-<?php echo e(\Str::slug($variant->variant)); ?>">
                        <div class="media-area" file-name="variants[<?php echo e($count); ?>][images]">
                            <div class="media-file-value"></div>
                            <div class="media-file"></div>
                            <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='multiple' onclick="loadMediaFiles($(this))">Select Product Image</a>
                        </div>
                    </div>

            <?php endif; ?>



            </div>
            <?php
                $count++; 
            ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           


        </div>               
    </div>
</div>


<div class="card">
    <div class="card-header">
        <h6 class="card-title mb-0">SEO</h6>
    </div>
    <div class="card-body">

        <div class="form-group<?php echo e($errors->has('meta_title') ? ' has-error' : ''); ?>">
            <?php echo Form::label('meta_title', 'Meta Title'); ?>

            <?php echo Form::text('meta_title', $product->meta_title, ['class' => 'form-control', 'placeholder' => 'Meta Title']); ?>

            <small class="text-danger"><?php echo e($errors->first('meta_title')); ?></small>
        </div>

        <div class="form-group<?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
            <?php echo Form::label('meta_description', 'Meta Description'); ?>

            <?php echo Form::textarea('meta_description', $product->meta_description, ['class' => 'form-control', 'placeholder' => 'Meta Description']); ?>

            <small class="text-danger"><?php echo e($errors->first('meta_description')); ?></small>
        </div>
    </div>
</div>


</div>

<div class="col-lg-4 col-4">


    <div class="card">

                        

                        <div class="card-body">

                            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('status', 'Select Status'); ?>

                                <?php echo Form::select('status', [0=>'Draft', 1=>'Publish'], $product->status, ['id' => 'my_status', 'class' => 'form-control get_category_list', 'placeholder' => 'Select status',]); ?>

                                <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                            </div>


                            <div class="form-group<?php echo e($errors->has('published_date') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('published_date', 'Publish Date'); ?>

                                <?php echo e($product->published_at->format('Y-m-d')); ?>

                                <?php echo Form::text('published_date', $product->published_at->format('d-m-y'), ['class' => 'dateSelector form-control', 'placeholder' => 'Publish Date']); ?>

                                <small class="text-danger"><?php echo e($errors->first('published_date')); ?></small>
                            </div>

                            <div class="btn-group">
                                <?php echo Form::submit("Save ".Str::title(str_replace('-', ' ', request()->segment(2))), ['class' => 'btn btn-soft-success btn-border waves-effect waves-light']); ?>

                            </div>



                        </div>

                        
                    </div>


                    <div class="card">

                        

                        <div class="card-body">

                            <div class="form-group<?php echo e($errors->has('brand') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('brand', 'Brand'); ?>

                                <?php echo Form::select('brand', App\Models\Brand::pluck('name','id'), $product->brand_id, ['id' => 'brand', 'class' => 'form-control', 'placeholder' => 'Select Brand']); ?>

                                <small class="text-danger"><?php echo e($errors->first('brand')); ?></small>
                            </div>

                            <div class="form-group<?php echo e($errors->has('product_type') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('product_type', 'Product Type'); ?>

                                <?php echo Form::select('product_type', App\Models\ProductType::pluck('name', 'id'), $product->product_type_id, ['id' => 'product_type', 'class' => 'form-control', 'placeholder' => 'Select Product Type']); ?>

                                <small class="text-danger"><?php echo e($errors->first('product_type')); ?></small>
                            </div>


                            <div class="form-group<?php echo e($errors->has('vendor') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('vendor', 'Vendor'); ?>

                                <?php echo Form::select('vendor', App\Models\Vendor::pluck('name', 'id'), $product->vendor_id, ['id' => 'vendor', 'class' => 'form-control', 'placeholder' => 'Select Vendor']); ?>

                                <small class="text-danger"><?php echo e($errors->first('vendor')); ?></small>
                            </div>

                        </div>
                    </div>




                    <div class="card">
                        <div class="card-body">
                            <div class="form-group<?php echo e($errors->has('collections') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('collections', 'Select Collection'); ?>

                                <?php echo Form::select('collections[]', App\Models\Collection::pluck('title','id'), $product->collections, ['id' => 'collections','data-placeholder'=>'Select Collection', 'class' => 'form-control js-example-basic-multiple',  'multiple']); ?>

                                <small class="text-danger"><?php echo e($errors->first('collections')); ?></small>
                            </div>


                            <div class="form-group<?php echo e($errors->has('tags') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('tags', 'Select Tag'); ?>

                                <?php echo Form::select('tags[]', App\Models\Tag::pluck('name','id'), $product->tags, ['id' => 'tags','data-placeholder'=>'Select Tag', 'class' => 'form-control js-example-basic-multiple',  'multiple']); ?>

                                <small class="text-danger"><?php echo e($errors->first('tags')); ?></small>
                            </div>



                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group<?php echo e($errors->has('product_selectio_type') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('product_selectio_type', 'Product Selection Type'); ?>

                                <?php echo Form::select('product_selectio_type', ['simple'=>'Simple Product', 'variant'=>'Variant Product'], $product->product_selectio_type, ['id' => 'product_selectio_type', 'class' => 'form-control', 'required' => 'required', 'placeholder'=>'Product Selection Type', 'onchange'=>'productSelection($(this))']); ?>

                                <small class="text-danger"><?php echo e($errors->first('product_selectio_type')); ?></small>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
            


            <?php echo Form::close(); ?>

            <?php $__env->stopSection(); ?>
            <?php $__env->startPush('scripts'); ?>
            <script src="<?php echo e(asset('admin-assets/libs/dropify/js/dropify.min.js')); ?>"></script>
            <script type="text/javascript" src="<?php echo e(asset('admin-assets/libs/dropify/dropify.js')); ?>"></script>
            <script type="text/javascript" src="<?php echo e(asset('admin-assets/libs/summernote/summernote-bs4.min.js')); ?>"></script>
            <script type="text/javascript" src="<?php echo e(asset('admin-assets/libs/flatpickr/flatpickr.js')); ?>"></script>


            <script src="<?php echo e(asset('admin-assets/libs/select2/js/select2.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('admin-assets/js/pages/select2.init.js')); ?>" type="text/javascript"></script>

            <script type="text/javascript" src="<?php echo e(asset('admin-assets/js/pages/form-repeater.js')); ?>"></script>
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
                        url:'<?php echo e(route('admin.generate.variant')); ?>',
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



            <?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/product/edit.blade.php ENDPATH**/ ?>