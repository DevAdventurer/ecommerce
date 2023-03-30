<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/dropify/css/dropify.min.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/summernote/summernote-bs4.min.css')); ?>"> 
<?php $__env->stopPush(); ?>




<?php $__env->startSection('main'); ?>



<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_collection')): ?>
            <div class="page-title-right">
                <a href="<?php echo e(route('admin.'.request()->segment(2).'.create')); ?>"  class="btn-sm btn btn-primary btn-label rounded-pill">
                    <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i>
                    Add <?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?>

                </a>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- end page title -->



<?php echo Form::open(['method' => 'POST', 'route' => 'admin.'.request()->segment(2).'.store', 'class' => 'form-horizontal','files'=>true]); ?>

    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('title', 'Title'); ?>

                            <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Collection Title']); ?>

                            <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                        </div> 



                        <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('description', 'Description'); ?>

                            <?php echo Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => 'Description']); ?>

                            <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                        </div>

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

                    <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('status', 'Select Status'); ?>

                        <?php echo Form::select('status', [0=>'Draft', 1=>'Publish'], null, ['id' => 'my_status', 'class' => 'form-control get_category_list', 'placeholder' => 'Select status',]); ?>

                        <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                    </div>


                    <div class="form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('image', 'Image'); ?>

                        <?php echo Form::file('image', ['class'=>'dropify']); ?>

                        <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                    </div>

                </div>
            </div>
        </div>

    </div>
<?php echo Form::close(); ?>







        <div class="card">
            <div class="card-content">
                <div class="card-body">
                   
                    <div class="row">

                        <div class="col-md-7 col-sm-12"> 

                          

                           <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', 'Title'); ?>

                                <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Collection Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                            </div> 



                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('description', 'Description'); ?>

                                <?php echo Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => 'Description']); ?>

                                <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                            </div>

                            <div class="btn-group">
                                <?php echo Form::submit("Add Category", ['class' => 'btn btn-soft-secondary waves-effect waves-light']); ?>

                            </div>

                           
                        </div>
                        <div class="col-md-5 col-sm-12">

                        

                            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('status', 'Select Status'); ?>

                                <?php echo Form::select('status', [0=>'Draft', 1=>'Publish'], null, ['id' => 'my_status', 'class' => 'form-control get_category_list', 'placeholder' => 'Select status',]); ?>

                                <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                            </div>


                            <div class="form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('image', 'Image'); ?>

                                <?php echo Form::file('image', ['class'=>'dropify']); ?>

                                <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                            </div>

                             


                        </div>


                    </div>
                    
                   




                </div>
            </div>
        </div>
    </div>
    












<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('admin-assets/libs/dropify/js/dropify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/libs/dropify/dropify.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/libs/summernote/summernote-bs4.min.js')); ?>"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('textarea').summernote({
        height: 200,
      });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/collection/create.blade.php ENDPATH**/ ?>