<?php
$sliders = App\Models\Slider::where('status', 1)->get();
?>

<!-- slideshow start -->
<div class="slideshow-section position-relative">
    <div class="slideshow-active activate-slider" data-slick='{
        "slidesToShow": 1, 
        "slidesToScroll": 1, 
        "dots": true,
        "arrows": true,
        "responsive": [
        {
            "breakpoint": 768,
            "settings": {
                "arrows": false
            }
        }
        ]
    }'>


    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="slide-item slide-item-bag position-relative">

        <img class="slide-img d-none d-md-block" src="<?php echo e(asset($slider->media?$slider->media->file:'assets/img/slideshow/f1.jpg')); ?>" alt="slide-1">
        <img class="slide-img d-md-none" src="<?php echo e(asset($slider->smallMedia?$slider->smallMedia->file:'assets/img/slideshow/f1-m.jpg')); ?>" alt="slide-1">
        <div class="content-absolute content-slide">
            <div class="container height-inherit d-flex align-items-center <?php echo e($slider->content_align); ?>">
                <div class="content-box slide-content slide-content-1 py-4">
                    <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp" data-animation="animate__animated animate__fadeInUp">
                        <?php echo e($slider->title); ?>

                    </h2>
                    <p class="slide-subheading heading_24 animate__animated animate__fadeInUp" data-animation="animate__animated animate__fadeInUp">
                        <?php echo e($slider->subtitle); ?>

                    </p>
                    <a class="btn-primary slide-btn animate__animated animate__fadeInUp" href="<?php echo e($slider->button_link); ?>" data-animation="animate__animated animate__fadeInUp"><?php echo e($slider->button_text); ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
    <div class="activate-arrows"></div>
    <div class="activate-dots dot-tools"></div>
</div>
            <!-- slideshow end --><?php /**PATH /home/sanix/Documents/ecommerce/resources/views/web/snippets/slider.blade.php ENDPATH**/ ?>