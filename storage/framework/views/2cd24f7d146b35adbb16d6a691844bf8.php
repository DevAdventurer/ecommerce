<?php $__env->startPush('links'); ?>
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


<?php echo Form::open(['route'=>['admin.'.request()->segment(2).'.update',$slider->id],'method'=>'put', 'files'=>true]); ?>


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">

                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('title', 'Title'); ?>

                    <?php echo Form::text('title', $slider->title, ['class' => 'form-control','placeholder'=>'Title']); ?>

                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('subtitle') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('subtitle', 'Subtitle'); ?>

                    <?php echo Form::text('subtitle', $slider->subtitle, ['class' => 'form-control', 'placeholder'=>'Subtitle']); ?>

                    <small class="text-danger"><?php echo e($errors->first('subtitle')); ?></small>
                </div>
                

                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('description', 'Description'); ?>

                    <?php echo Form::textarea('description', $slider->body, ['class' => 'form-control', 'placeholder' => 'Description']); ?>

                    <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                </div>

            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">

                <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('status', 'Status'); ?>

                    <?php echo Form::select('status', [0 => 'Draft', 1 => 'Publish'], $slider->status, ['class' => 'form-control', 'id' => 'slider_status', 'placeholder'=>'Status']); ?>

                    <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                </div>


                <div class="form-group<?php echo e($errors->has('button_text') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('button_text', 'Text On Button'); ?>

                    <?php echo Form::text('button_text', $slider->button_text, ['class' => 'form-control','placeholder'=>'Text On Button']); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_text')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('button_link') ? ' has-error' : ''); ?>">
                    <?php echo Html::decode(Form::label('button_link','Link On Button <span class="text-danger">*</span>')); ?>

                    <?php echo Form::text('button_link', $slider->button_link, ['class' => 'form-control','placeholder'=>'Link On Button']); ?>

                    <small class="text-danger"><?php echo e($errors->first('button_link')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('content_align') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('content_align', 'Content Align'); ?>

                    <?php echo Form::select('content_align', ['justify-content-end'=>'Right', 'justify-content-start'=>'Left'], $slider->content_align, ['id' => 'content_align', 'class' => 'form-control', 'placeholder' => 'Content Align']); ?>

                    <small class="text-danger"><?php echo e($errors->first('content_align')); ?></small>
                </div>

                 <div class="btn-group">
                    <?php echo Form::submit("Update ".Str::title(str_replace('-', ' ', request()->segment(2))), ['class' => 'btn btn-soft-success btn-border waves-effect waves-light']); ?>

                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Slider Image</h6>
            </div>
            <div class="card-body">

                <div class="media-area" file-name="slider_image">

                    <div class="media-file-value">
                        <?php if($slider->media): ?>
                            <input type="hidden" name="slider_image[]" value="<?php echo e($slider->media_id); ?>" class="fileid<?php echo e($slider->media_id); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="media-file">
                        <?php if($slider->media): ?>
                            <div class="file-container d-inline-block fileid<?php echo e($slider->media_id); ?>">
                                <span data-id="<?php echo e($slider->media_id); ?>" class="remove-file">✕</span>
                                <img class="w-100 d-block img-thumbnail" src="<?php echo e(asset($slider->media->file)); ?>" alt="<?php echo e($slider->media->name); ?>">
                            </div>
                        <?php endif; ?>
                    </div>


                    <p><br></p>
                    <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Image</a>

                </div>



                <div class="media-area" file-name="slider_image_small">

                    <div class="media-file-value">
                        <?php if($slider->smallMedia): ?>
                            <input type="hidden" name="slider_image_small[]" value="<?php echo e($slider->small_media_id); ?>" class="fileid<?php echo e($slider->small_media_id); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="media-file">
                        <?php if($slider->smallMedia): ?>
                            <div class="file-container d-inline-block fileid<?php echo e($slider->small_media_id); ?>">
                                <span data-id="<?php echo e($slider->small_media_id); ?>" class="remove-file">✕</span>
                                <img class="w-100 d-block img-thumbnail" src="<?php echo e(asset($slider->smallMedia->file)); ?>" alt="<?php echo e($slider->smallMedia->name); ?>">
                            </div>
                        <?php endif; ?>
                    </div>


                    <p><br></p>
                    <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Small Image</a>

                </div>

            </div>
        </div>

    </div>


</div>


<?php echo Form::close(); ?>





<?php $__env->stopSection(); ?>




<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/libs/summernote/summernote-bs4.min.js')); ?>"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('textarea').summernote({
        height: 200,
      });
    });
</script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/slider/edit.blade.php ENDPATH**/ ?>