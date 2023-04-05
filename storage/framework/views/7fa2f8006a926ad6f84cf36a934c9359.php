<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/dropify/css/dropify.min.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/summernote/summernote-bs4.min.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/flatpickr/flatpickr.min.css')); ?>"> 
<?php $__env->stopPush(); ?>




<?php $__env->startSection('main'); ?>



<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>

            <div class="page-title-right">
                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'browse_collection')): ?>
                    <a href="<?php echo e(route('admin.'.request()->segment(2).'.index')); ?>"  class="btn-sm btn btn-secondary waves-effect waves-light btn-label rounded-pill">
                        <i class="bx bx-list-ul label-icon align-middle rounded-pill fs-16 me-2"></i>
                        <?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?> List
                    </a>
                <?php endif; ?>

                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_collection')): ?>
                    <a href="<?php echo e(route('admin.'.request()->segment(2).'.create')); ?>"  class="btn-sm btn btn-success waves-effect waves-light btn-label rounded-pill">
                        <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i>
                        Add <?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?>

                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->



<?php echo Form::open(['method' => 'PUT', 'route' => ['admin.'.request()->segment(2).'.update', $collection->id], 'class' => 'form-horizontal','files'=>true]); ?>

    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('title', 'Title'); ?>

                            <?php echo Form::text('title', $collection->title, ['class' => 'form-control', 'placeholder' => 'Collection Title']); ?>

                            <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                        </div> 



                        <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('description', 'Description'); ?>

                            <?php echo Form::textarea('description', $collection->body, ['class' => 'form-control editor', 'placeholder' => 'Description']); ?>

                            <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                        </div>

                    </div>
                </div>
            </div>


            <div class="card">

                <div class="card-header">
                    <h6 class="card-title mb-0">SEO Metas</h6>
                </div>

                <div class="card-body">
                    <div class="form-group<?php echo e($errors->has('meta_title') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('meta_title', 'Meta Title'); ?>

                        <?php echo Form::text('meta_title', $collection->meta_title, ['class' => 'form-control', 'placeholder' => 'Meta Title']); ?>

                        <small class="text-danger"><?php echo e($errors->first('meta_title')); ?></small>
                    </div>

                    <div class="form-group<?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('meta_description', 'Meta Description'); ?>

                        <?php echo Form::textarea('meta_description', $collection->meta_description, ['class' => 'form-control', 'placeholder' => 'Meta Description', 'rows'=>5]); ?>

                        <small class="text-danger"><?php echo e($errors->first('meta_description')); ?></small>
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

                        <?php echo Form::select('status', [0=>'Draft', 1=>'Publish'], $collection->status, ['id' => 'my_status', 'class' => 'form-control get_category_list', 'placeholder' => 'Select status',]); ?>

                        <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                    </div>


                    <div class="form-group<?php echo e($errors->has('published_date') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('published_date', 'Publish Date'); ?>

                        <?php echo Form::text('published_date',  $collection->published_at->format('d-m-y'), ['class' => 'dateSelector form-control', 'placeholder' => 'Publish Date']); ?>

                        <small class="text-danger"><?php echo e($errors->first('published_date')); ?></small>
                    </div>

                     <div class="btn-group">
                        <?php echo Form::submit("Save ".Str::title(str_replace('-', ' ', request()->segment(2))), ['class' => 'btn btn-soft-success btn-border waves-effect waves-light']); ?>

                    </div>

                </div>
            </div>
            


             <div class="card">
                <div class="card-body">
                    <div class="form-group<?php echo e($errors->has('parrent') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('parrent', 'Parent Collection'); ?>

                        <?php echo Form::select('parrent', $collections, $collection->parent, ['id' => 'parrent', 'class' => 'form-control', 'placeholder' => 'Choose Parent Collection']); ?>

                        <small class="text-danger"><?php echo e($errors->first('parrent')); ?></small>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Featured Image</h6>
                </div>
                <div class="card-body">

                    <div class="media-area">

                        <div class="media-file-value">
                            <?php if($collection->media_id): ?>
                                <input type="hidden" name="file[]" value="<?php echo e($collection->media_id); ?>" class="fileid<?php echo e($collection->media_id); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="media-file">
                            <?php if($collection->media_id): ?>
                                <div class="file-container d-inline-block fileid<?php echo e($collection->media_id); ?>">
                                    <span data-id="<?php echo e($collection->media_id); ?>" class="remove-file">✕</span>
                                    <img class="w-100 d-block img-thumbnail" src="<?php echo e(asset($collection->media->file)); ?>" alt="<?php echo e($collection->media->name); ?>">
                                </div>
                            <?php endif; ?>
                        </div>


                        <p><br></p>
                        <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Media File</a>

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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/collection/edit.blade.php ENDPATH**/ ?>