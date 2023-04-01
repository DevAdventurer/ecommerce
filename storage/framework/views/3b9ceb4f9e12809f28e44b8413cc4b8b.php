<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/libs/dropify/css/dropify.min.css')); ?>"> 

<?php $__env->stopPush(); ?>




<?php $__env->startSection('main'); ?>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_attribute')): ?>
            <div class="page-title-right">
                <button type="button" class="btn-sm btn btn-success waves-effect waves-light btn-label rounded-pill" data-bs-toggle="modal" data-bs-target="#attributeValue">
    <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i> Add Attribute Value
</button>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row my-1">


    <div class="col-lg-4 col-4">

        <div class="card">
            <div class="card-content">
                <div class="card-body" id="form">

                    <?php echo Form::open(['method' => 'POST', 'route' => 'admin.'.request()->segment(2).'.store', 'class' => 'form-horizontal','files'=>true]); ?>

                    
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('name', 'Attribute Name'); ?>

                            <?php echo Form::text('name', null, ['class' => 'form-control slugify', 'required' => 'required','placeholder'=>'Enter Attribute Name']); ?>

                            <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                        </div>
                    
                        <div class="btn-group">
                            <?php echo Form::submit("Save Attribute", ['class' => 'btn btn-soft-success btn-border waves-effect waves-light']); ?>

                        </div>
                    
                    <?php echo Form::close(); ?>


                    

                </div>
            </div>
        </div>
        
             
    </div>


    <div class="col-lg-8 col-8">

        <div class="card">
            <div class="card-content">
                <div class="card-body">

                    <table id="dataTableAjax" class="display dataTableAjax table table-striped table-bordered dom-jQuery-events" >
                        <thead>
                            <tr>
                                <th style="width:30px;">Si</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <?php if (\Illuminate\Support\Facades\Blade::check('can', ['edit_attribute','delete_attribute'])): ?>
                                  <th style="width:30px;">Action</th>
                                <?php endif; ?>

                            </tr>
                        </thead>
            
                    </table>

                </div>
            </div>
        </div>

             
    </div>
</div>





<div class="modal fade" id="attributeValue" tabindex="-1" aria-labelledby="attributeValueModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attributeValueModalgridLabel">Grid Modals</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo Form::open(['method' => 'POST', 'route' => 'admin.'.request()->segment(2).'.value.store', 'class' => 'form-horizontal','files'=>true]); ?>

                
                    <div class="form-group<?php echo e($errors->has('attribute') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('attribute', 'Select Attribute'); ?>

                        <?php echo Form::select('attribute', App\Models\Attribute::pluck('name', 'id'), null, ['id' => 'attribute', 'class' => 'form-control', 'placeholder' => 'Select Attribute']); ?>

                        <small class="text-danger"><?php echo e($errors->first('attribute')); ?></small>
                    </div>
                
                    <div class="btn-group">
                        <?php echo Form::submit("Save Attribute Value", ['class' => 'btn btn-soft-success btn-border waves-effect waves-light']); ?>

                    </div>
                
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('admin-assets/libs/dropify/js/dropify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/libs/dropify/dropify.js')); ?>"></script>

<script type="text/javascript">

var table2 = $('#dataTableAjax').DataTable({
    "processing": true,
    "serverSide": true,
    'ajax': {
        'url': '<?php echo e(route('admin.'.request()->segment(2).'.index')); ?>',
        'data': function(d) {
            d._token = '<?php echo e(csrf_token()); ?>';
            d._method = 'PATCH';
        }

    },
    "columns": [
        { "data": "sn" }, 
        { "data": "name" }, 
        { "data": "created_at" }, 
        {
            "data": "action",
            render: function(data, type, row) {
                if (type === 'display') {
                    var btn = '<div class="dropdown d-inline-block"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill align-middle"></i></button><ul class="dropdown-menu dropdown-menu-end">';

                    <?php if (\Illuminate\Support\Facades\Blade::check('can', ['edit_attribute','delete_attribute','read_attribute'])): ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('can', 'read_attribute')): ?>
                    // btn += '<li><a class="dropdown-item" href="<?php echo e(request()->url()); ?>/' + row['id'] + '"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>';
                    <?php endif; ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_attribute')): ?>
                        btn+='<li><a class="dropdown-item edit-item-btn" href="'+window.location.href+'/'+row['id']+'/edit"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>';
                    <?php endif; ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_attribute')): ?>
                        btn += '<li><button type="button" onclick="deleteAjax(\''+window.location.href+'/'+row['id']+'/delete\')" class="dropdown-item remove-item-btn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</button></li>';
                    <?php endif; ?>

                    <?php endif; ?>
                     btn += '</ul></div>';
                    return btn;
                }
                return ' ';
            },
            
    }]

});
</script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/attribute/list.blade.php ENDPATH**/ ?>