

                   
    <?php $__currentLoopData = $matrix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row g-2">
        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('variant') ? ' has-error' : ''); ?>">
                <?php echo Form::label('variant', 'Variant'); ?>

                <?php echo Form::text('variant[]', implode('/', $items), ['class' => 'form-control', 'required' => 'required', 'readonly'=>'readonly']); ?>

                <small class="text-danger"><?php echo e($errors->first('variant')); ?></small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('quantity_on_hand') ? ' has-error' : ''); ?>">
                <?php echo Form::label('quantity_on_hand', 'Quantity On Hand'); ?>

                <?php echo Form::text('quantity_on_hand[]', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('quantity_on_hand')); ?></small>
            </div>
        </div>


        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('quantity_available') ? ' has-error' : ''); ?>">
                <?php echo Form::label('quantity_available', 'Quantity available'); ?>

                <?php echo Form::text('quantity_available[]', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('quantity_available')); ?></small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('sku') ? ' has-error' : ''); ?>">
                <?php echo Form::label('sku', 'SKU'); ?>

                <?php echo Form::text('sku[]', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('sku')); ?></small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                <?php echo Form::label('price', 'Price'); ?>

                <?php echo Form::text('price', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('price')); ?></small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('sale_price') ? ' has-error' : ''); ?>">
                <?php echo Form::label('sale_price', 'Sale Price'); ?>

                <?php echo Form::text('sale_price', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('sale_price')); ?></small>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
<?php /**PATH /home/sanix/Documents/ecommerce/resources/views/welcome.blade.php ENDPATH**/ ?>