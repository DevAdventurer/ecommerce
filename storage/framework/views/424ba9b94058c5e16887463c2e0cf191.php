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
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_admin')): ?>
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

<div class="row">
    <div class="col-lg-12">
<div class="card">
    <div class="card-content">
        <div class="card-body">
          <?php echo Form::open(['method' => 'POST', 'route' => 'admin.slider.store', 'class' => 'form-horizontal','files'=>true]); ?>


            <div class="row my-1">
                <div class="col-lg-7 col-7">

                    
                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('title', 'Title'); ?>

                            <?php echo Form::text('title', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'title']); ?>

                            <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('sub_title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('sub_title', 'Sub Title'); ?>

                            <?php echo Form::text('sub_title', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Sub title']); ?>

                            <small class="text-danger"><?php echo e($errors->first('sub_title')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('button_text') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('button_text', 'Text On Button'); ?>

                            <?php echo Form::text('button_text', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Text On Button']); ?>

                            <small class="text-danger"><?php echo e($errors->first('button_text')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('button_link') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('button_link', 'Link On Button'); ?>

                            <?php echo Form::text('button_link', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Link On Button']); ?>

                            <small class="text-danger"><?php echo e($errors->first('button_link')); ?></small>
                        </div>
                    
                        <div class="btn-group">
                            <?php echo Form::submit("Add Slider", ['class' => 'btn btn-info']); ?>

                        </div>
                    

                </div>

                <div class="col-lg-5 col-5">

                    
                   
                    <div class="form-group">
                        <div class="checkbox<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('status', 'Status'); ?><br>
                             <?php echo Form::checkbox('status', '1', 1, ['id' => 'switch1','class'=>'switch']); ?> 
                        </div>
                        <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                    </div>

                  <div class="form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">

                            <?php echo Form::label('image', 'Slider Image'); ?>


                            <?php echo Form::file('image', ['class'=>'dropify']); ?>


                            <small class="text-danger"><?php echo e($errors->first('image')); ?></small>

                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>


        </div>
             
    </div>
</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/vendor/create.blade.php ENDPATH**/ ?>