<?php
$sections = App\Models\TrustedSection::orderBy('created_at','desc')->get();
?>
<!-- trusted badge start -->
<div class="trusted-section overflow-hidden bg-trust-1">
    <div class="trusted-section-inner py-4">
        <div class="container">
            <div class="row justify-content-center trusted-row">

                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="trusted-badge rounded p-0">
                        <div class="trusted-icon">
                            <?php if($section->icon_type == 'image'): ?>
                                <img class="icon-trusted" src="<?php echo e($section->media->file); ?>" alt="icon-1">
                            <?php endif; ?>
                        </div>
                        <div class="trusted-content">
                            <h2 class="heading_18 trusted-heading"><?php echo e($section->title); ?></h2>
                            <p class="text_16 trusted-subheading trusted-subheading-2"><?php echo e($section->subtitle); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>
<!-- trusted badge end --><?php /**PATH /Users/asifjamal/Documents/ecommerce/resources/views/web/snippets/trusted-badge.blade.php ENDPATH**/ ?>