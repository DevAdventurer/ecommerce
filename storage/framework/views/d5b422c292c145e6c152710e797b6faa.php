<?php $__env->startSection('title','Edit Bread'); ?>
<?php $__env->startPush('links'); ?>
<style type="text/css">
    span.permissionbox {
        border: 1px solid gray;
        padding: 8px;
        margin: 10px 10px;
/*height: 57px !important;*/
display: inline-block;
position: relative;
}
span.permissionbox i {
    right: -5px;
    top: 9px;
}
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?></h4>

            <div class="page-title-right">
                <a href="<?php echo e(route('admin.'.request()->segment(2).'.create')); ?>"  class="btn-sm btn btn-primary btn-label rounded-pill">
                    <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i>
                    Add <?php echo e(Str::title(str_replace('-', ' ', request()->segment(2)))); ?>

                </a>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <?php echo Form::open(['route'=>['admin.'.request()->segment(2).'.update',$menu->slug],'method'=>'put','id'=>'breadForm']); ?>

                    <div class="form-group">
                        <label for="">Name</label>
                        <?php echo Form::text('name', ($menu->title)?$menu->title:Str::title(str_replace('_', ' ', $menu->slug)) , ['class'=>'form-control']); ?>

                    </div>
                    <div class="form-group">
                        <label for="">Icon</label>
                        <?php echo Form::text('icon', $menu->icon , ['class'=>'form-control']); ?>

                    </div>

                    <label for="">Permissions</label>
                    <br>
                    <div class="form-group" id="permissions">
                        <?php $__currentLoopData = array_unique(array_merge($permissions,['browse_'.$menu->slug,'read_'.$menu->slug,'add_'.$menu->slug,'edit_'.$menu->slug,'delete_'.$menu->slug])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <button type="button" class="mb-3 permissionbox btn btn-primary btn-label waves-effect waves-light right">
                            <i class=" ri-close-line label-icon align-middle fs-16 ms-2" onClick="removePermission(this)"></i> 

                            <div class="form-check form-check-outline"> 
                                    <?php echo Form::checkbox('permissions[]', $per, in_array( $per,$permissions), ['class'=>'js-switch-sm form-check-input', 'id'=>$per]); ?>

                                <label class="form-check-label m-0" for="<?php echo e(($per)); ?>"><?php echo e(($per)); ?></label>
                            </div>
                        </button>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       


                    </div>


                    <div class="form-group">
                        <button type="button" class="btn btn-soft-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addPermission">Add More Permission</button>
                    </div>


                    <div class="form-group pull-right">
                        <button type="submit" onclick="submitForm()" class="btn btn-soft-secondary waves-effect waves-light" >Submit</button>
                    </div>

                    <?php echo Form::close(); ?>

                    <!-- Modal -->

                    <div id="addPermission" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">New Permission</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                </div>
                                <div class="modal-body">
                                    <label>Permission Type</label>
                                    <input type="text" name="per" class="form-control" autocomplete="off" placeholder="Permission Type">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-soft-danger waves-effect waves-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="addPermission(this)" class="btn btn-soft-secondary waves-effect waves-light">Add New Permission</button>
                                </div>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->



                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<script src="<?php echo e(asset('admin-assets/app-assets/js/scripts/forms/switch.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">
    function addPermission(el){
        var val = $(el).closest('.modal-content').find('input').val();
        var html = '<button type="button" class="mb-3 permissionbox btn btn-primary btn-label waves-effect waves-light right"><i class=" ri-close-line label-icon align-middle fs-16 ms-2" onClick="removePermission(this)"></i>'+'<div class="form-check form-check-outline"><input type="checkbox" name="permissions[]"  value="'+slug(val)+'" class="js-switch-sm form-check-input" id="'+val+'"><label class="form-check-label m-0" for="'+val+'">'+val+'</label></div></button>';
        $('#permissions').append(html);
        $('#addPermission').modal('hide');
        $(el).closest('.modal-content').find('input').val('');
        switchBtn();

    }
    function removePermission(element){
        if(confirm('Are you sure to remove this permission')){
            $(element).parent().remove();
        }
    }
    function slug(string){
        return  string.toLowerCase().split(' ').filter(function(n){ return n != '' }).join('_');
    }

    function switchBtn(){
        var elems2 = $('input[data-switchery!="true"].js-switch-sm');
        for (var i = 0; i < elems2.length; i++) {
            new Switchery(elems2[i],{ size: 'small' });
        }
    }
    function submitForm(){
        $('#breadForm').submit();
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/bread/edit.blade.php ENDPATH**/ ?>