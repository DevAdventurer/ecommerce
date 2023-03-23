<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/dropify/css/dropify.min.css')); ?>"> 
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>
<?php echo Form::open(['method' => 'POST', 'route' => 'admin.site-setting.logo', 'class' => 'form-horizontal','files'=>true, 'id'=>'appsetting']); ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>


            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'logo_site_setting')): ?>
                <div class="page-title-right">
                    <div class="page-title-right">
                        <?php echo Form::submit("Update Setting", ['class' => 'btn-sm btn btn-primary rounded-pill']); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<div class="row my-1">
    <div class="col-lg-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-header bg-transparent border-primary">
                    <h5 class="my-0 text-primary">Site Details</h5>
                </div>

                <div class="card-body">



                   <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('title', 'Title'); ?>

                    <?php echo Form::text('title', $logo->title, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Title']); ?>

                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('description', 'Description'); ?>

                    <?php echo Form::textarea('description', $logo->description, ['class' => 'form-control', 'placeholder' => 'Description', 'rows'=>5]); ?>

                    <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                </div>

                <div class="form-group <?php echo e($errors->has('logo') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('logo', 'Logo'); ?>


                    <?php echo Form::file('logo', ['class'=>'dropify','data-default-file'=>asset(@$logo->logo)]); ?>


                    <?php echo Form::hidden('checkfile',@$logo->logo, ['id' => 'checkfile']); ?>


                    <small class="text-danger"><?php echo e($errors->first('logo')); ?></small>

                </div> 

                <div class="form-group <?php echo e($errors->has('favicon') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('favicon', 'Favicon Icon'); ?>


                    <?php echo Form::file('favicon', ['class'=>'dropify','data-default-file'=>asset(@$logo->favicon)]); ?>


                    <?php echo Form::hidden('checkfile',@$logo->favicon, ['id' => 'checkfile']); ?>


                    <small class="text-danger"><?php echo e($errors->first('favicon')); ?></small>

                </div> 

            </div>
        </div>
    </div>

</div>


<div class="col-lg-6 col-sm-12 col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-header bg-transparent border-primary">
                <h5 class="my-0 text-primary">Site Information</h5>
            </div>

            <div class="card-body">
                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('email', 'Email'); ?>

                    <?php echo Form::email('email', @$logo->email, ['class' => 'form-control', 'placeholder' => 'Email']); ?>

                    <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('contact_no') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('contact_no', 'Contact No.'); ?>

                    <?php echo Form::text('contact_no', @$logo->contact_no, ['class' => 'form-control', 'placeholder' => 'Contact No.']); ?>

                    <small class="text-danger"><?php echo e($errors->first('contact_no')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('country', 'Country'); ?>

                    <?php echo Form::text('country', @$logo->country, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Country']); ?>

                    <small class="text-danger"><?php echo e($errors->first('country')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('state', 'State'); ?>

                    <?php echo Form::text('state', @$logo->state, ['class' => 'form-control', 'placeholder' => 'State', 'required'=>'required']); ?>

                    <small class="text-danger"><?php echo e($errors->first('state')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('city', 'City'); ?>

                    <?php echo Form::text('city', @$logo->city, ['class' => 'form-control', 'required' => 'required','placeholder'=>'City']); ?>

                    <small class="text-danger"><?php echo e($errors->first('city')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('address', 'Address'); ?>

                    <?php echo Form::textarea('address', @$logo->address, ['class' => 'form-control', 'placeholder' => 'Address', 'rows'=>5]); ?>

                    <small class="text-danger"><?php echo e($errors->first('address')); ?></small>
                </div>
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


<script type="text/javascript">
    function appSettingUpdate(element){
        var button = new Button(element);
        button.process();
        clearErrors();
        var requestData,otpdata,data;
        formData = new FormData(document.querySelector('#appsetting'));

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:'<?php echo e(route('admin.'.request()->segment(2).'.logo')); ?>',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success:function(response){
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "success",

                }).showToast();
                //toastr.success(response.message); 
                button.normal();
                document.querySelector('#appsetting').reset();
            },
            error:function(error){
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "error",

                }).showToast();
               // toastr.error(error.responseJSON.message); 
                button.normal();
                handleErrors(error.responseJSON);

            }
        });
    }
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/site-setting/index.blade.php ENDPATH**/ ?>