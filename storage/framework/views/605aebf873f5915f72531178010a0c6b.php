

    <?php
        $count = 0; 
    ?>  
<div class="variant-container">
    <?php $__currentLoopData = $matrix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row g-2">

       <div class="variant-inner col" style="max-width: 70px;">
        
            <div class="form-group">
                <span class="default-image" data-image="variant-image-<?php echo e(implode('-', $items)); ?>">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M19 2.5a1.5 1.5 0 0 0-1.5-1.5h-15a1.5 1.5 0 0 0-1.5 1.5v15a1.5 1.5 0 0 0 1.5 1.5h7.5v-2h-6.503c-.41 0-.64-.46-.4-.79l3.553-4.051c.19-.21.52-.21.72-.01l1.63 1.851 3.06-4.781a.5.5 0 0 1 .84.02l.72 1.251a5.98 5.98 0 0 1 2.38-.49h3v-7.5zm-11.5 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm12.207 10.793a1 1 0 0 0-.707-.293h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 0 0 .707-1.707z"></path></svg>
                </span>
            </div>
       </div>


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

    <div class="varinat-images variant-image-<?php echo e(implode('-', $items)); ?>">
        <div class="media-area" file-name="variants[<?php echo e($count); ?>][images]">
            <div class="media-file-value"></div>
            <div class="media-file"></div>
            <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='multiple' onclick="loadMediaFiles($(this))">Select Variant Image</a>
        </div>
    </div>
    <?php
        $count++; 
    ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
</div><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/admin/product/ajax-variant-calculate.blade.php ENDPATH**/ ?>