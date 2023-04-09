<ul id="mediafiles-list" class="m-0 p-0 d-flex justify-content-between w-100 flex-wrap" style="list-style: none;">

<?php $__currentLoopData = $medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="d-inline-block get-all-media">
        <input <?php if($type == 'single'): ?> type="radio" <?php else: ?> type="checkbox" <?php endif; ?> name="media[]" id="mediaid<?php echo e($media->id); ?>" value="<?php echo e($media->id); ?>"/>
        <label for="mediaid<?php echo e($media->id); ?>" id="getmedia-<?php echo e($media->id); ?>">
            <img class="d-block" src="<?php echo e(asset($media->file)); ?>" alt="<?php echo e($media->name); ?>">
        </label>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</ul>


<?php /**PATH /Users/asifjamal/Documents/ecommerce/resources/views/admin/media/ajax-list.blade.php ENDPATH**/ ?>