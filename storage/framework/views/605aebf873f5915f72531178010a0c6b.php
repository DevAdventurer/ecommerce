

    <?php
        $count = 0; 
    ?>  
<div class="variant-container">
    <?php $__currentLoopData = $matrix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row g-2">

       
        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('variant') ? ' has-error' : ''); ?>">
                <?php echo Form::label('variant', 'Variant'); ?>

                <?php echo Form::text('variants['.$count.'][value]', implode('/', $items), ['class' => 'form-control', 'required' => 'required', 'readonly'=>'readonly']); ?>

                <small class="text-danger"><?php echo e($errors->first('variant')); ?></small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('quantity_on_hand') ? ' has-error' : ''); ?>">
                <?php echo Form::label('quantity_on_hand', 'Quantity On Hand'); ?>

                <?php echo Form::text('variants['.$count.'][quantity_on_hand]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Quantity On Hand']); ?>

                <small class="text-danger"><?php echo e($errors->first('quantity_on_hand')); ?></small>
            </div>
        </div>


        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('quantity_available') ? ' has-error' : ''); ?>">
                <?php echo Form::label('quantity_available', 'Quantity Available'); ?>

                <?php echo Form::text('variants['.$count.'][quantity_available]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Quantity Available']); ?>

                <small class="text-danger"><?php echo e($errors->first('quantity_available')); ?></small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('sku') ? ' has-error' : ''); ?>">
                <?php echo Form::label('sku', 'SKU'); ?>

                <?php echo Form::text('variants['.$count.'][sku]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'SKU']); ?>

                <small class="text-danger"><?php echo e($errors->first('sku')); ?></small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('variant_price') ? ' has-error' : ''); ?>">
                <?php echo Form::label('variant_price', 'Variant Price'); ?>

                <?php echo Form::text('variants['.$count.'][variant_price]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Variant Price']); ?>

                <small class="text-danger"><?php echo e($errors->first('variant_price')); ?></small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group<?php echo e($errors->has('variant_sale_price') ? ' has-error' : ''); ?>">
                <?php echo Form::label('variant_sale_price', 'Variant Sale Price'); ?>

                <?php echo Form::text('variants['.$count.'][variant_sale_price]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Variant Sale Price']); ?>

                <small class="text-danger"><?php echo e($errors->first('variant_sale_price')); ?></small>
            </div>
        </div>
    </div>
    <?php
        $count++; 
    ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
</div><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/product/ajax-variant-calculate.blade.php ENDPATH**/ ?>