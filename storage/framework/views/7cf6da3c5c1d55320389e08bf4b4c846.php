<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/dropify/css/dropify.min.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/summernote/summernote-bs4.min.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/select2/css/select2.min.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/flatpickr/flatpickr.min.css')); ?>"> 

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

<?php echo Form::open(['method' => 'POST', 'route' => 'admin.'.request()->segment(2).'.store', 'class' => 'form-horizontal','files'=>true]); ?>




            <div class="row my-1">
                <div class="col-lg-8 col-8">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', 'Product Title'); ?>

                                <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Product Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                            </div>


                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('description', 'Description'); ?>

                                <?php echo Form::textarea('description', null, ['class' => 'editor form-control', 'required' => 'required']); ?>

                                <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                            </div>

                            <div class="form-group<?php echo e($errors->has('short_description') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('short_description', 'Short Description'); ?>

                                <?php echo Form::textarea('short_description', null, ['class' => 'editor form-control', 'required' => 'required']); ?>

                                <small class="text-danger"><?php echo e($errors->first('short_description')); ?></small>
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

                                <?php echo Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => 'Meta Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('meta_title')); ?></small>
                            </div>

                            <div class="form-group<?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('meta_description', 'Meta Description'); ?>

                                <?php echo Form::textarea('meta_description', null, ['class' => 'form-control', 'placeholder' => 'Meta Description']); ?>

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

                                <?php echo Form::select('status', [0=>'Draft', 1=>'Publish'], null, ['id' => 'my_status', 'class' => 'form-control get_category_list', 'placeholder' => 'Select status',]); ?>

                                <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                            </div>


                            <div class="form-group<?php echo e($errors->has('published_date') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('published_date', 'Publish Date'); ?>

                                <?php echo Form::text('published_date', null, ['class' => 'dateSelector form-control', 'placeholder' => 'Publish Date']); ?>

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

                                <?php echo Form::select('brand', App\Models\Brand::pluck('name','id'), null, ['id' => 'brand', 'class' => 'form-control', 'placeholder' => 'Select Brand']); ?>

                                <small class="text-danger"><?php echo e($errors->first('brand')); ?></small>
                            </div>

                            <div class="form-group<?php echo e($errors->has('product_type') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('product_type', 'Product Type'); ?>

                                <?php echo Form::select('product_type', App\Models\ProductType::pluck('name', 'id'), null, ['id' => 'product_type', 'class' => 'form-control', 'placeholder' => 'Select Product Type']); ?>

                                <small class="text-danger"><?php echo e($errors->first('product_type')); ?></small>
                            </div>


                            <div class="form-group<?php echo e($errors->has('vendor') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('vendor', 'Vendor'); ?>

                                <?php echo Form::select('vendor', App\Models\Vendor::pluck('name', 'id'), null, ['id' => 'vendor', 'class' => 'form-control', 'placeholder' => 'Select Vendor']); ?>

                                <small class="text-danger"><?php echo e($errors->first('vendor')); ?></small>
                            </div>

                        </div>
                    </div>
            



                    <div class="card">
                        <div class="card-body">
                            <div class="form-group<?php echo e($errors->has('collections') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('collections', 'Select Collection'); ?>

                                <?php echo Form::select('collections[]', App\Models\Collection::pluck('title','id'), null, ['id' => 'collections','data-placeholder'=>'Select Collection', 'class' => 'form-control js-example-basic-multiple',  'multiple']); ?>

                                <small class="text-danger"><?php echo e($errors->first('collections')); ?></small>
                            </div>


                            <div class="form-group<?php echo e($errors->has('tags') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('tags', 'Select Tag'); ?>

                                <?php echo Form::select('tags[]', App\Models\Tag::pluck('name','id'), null, ['id' => 'tags','data-placeholder'=>'Select Tag', 'class' => 'form-control js-example-basic-multiple',  'multiple']); ?>

                                <small class="text-danger"><?php echo e($errors->first('tags')); ?></small>
                            </div>



                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('price', 'Price'); ?>

                                <?php echo Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price']); ?>

                                <small class="text-danger"><?php echo e($errors->first('price')); ?></small>
                            </div>

                            <div class="form-group<?php echo e($errors->has('sale_price') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('sale_price', 'Sale Price'); ?>

                                <?php echo Form::text('sale_price', null, ['class' => 'form-control', 'placeholder' => 'Sale Price']); ?>

                                <small class="text-danger"><?php echo e($errors->first('sale_price')); ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group <?php echo e($errors->has('featured_image') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('featured_image', 'Featured Image'); ?>

                                <?php echo Form::file('featured_image', ['class'=>'dropify']); ?>

                                <small class="text-danger"><?php echo e($errors->first('featured_image')); ?></small>
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

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/asifjamal/Documents/ecommerce/resources/views/admin/product-inventory/create.blade.php ENDPATH**/ ?>