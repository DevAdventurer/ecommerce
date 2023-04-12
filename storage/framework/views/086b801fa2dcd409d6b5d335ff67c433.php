<!doctype html>
<html lang="en" class="no-js">


<!-- Mirrored from spreethemesprevious.github.io/bisum/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Mar 2023 10:32:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <title>Bisum - eCommerce Bootstrap 5 Template</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="meta description">
    <link rel="shortcut icon" href="<?php echo e(asset(get_app_setting('favicon')??'assets/img/favicon.png')); ?>" type="image/x-icon">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <!-- all css -->
    <style>
        :root {
            --primary-color: #F76B6A;
            --secondary-color: #F0686E;

            --btn-primary-border-radius: 0.25rem;
            --btn-primary-color: #fff;
            --btn-primary-background-color: #F76B6A;
            --btn-primary-border-color: #F76B6A;
            --btn-primary-hover-color: #fff;
            --btn-primary-background-hover-color: #F0686E;
            --btn-primary-border-hover-color: #F0686E;
            --btn-primary-font-weight: 500;

            --btn-secondary-border-radius: 0.25rem;
            --btn-secondary-color: #F76B6A;
            --btn-secondary-background-color: transparent;
            --btn-secondary-border-color: #F76B6A;
            --btn-secondary-hover-color: #fff;
            --btn-secondary-background-hover-color: #F0686E;
            --btn-secondary-border-hover-color: #F0686E;
            --btn-secondary-font-weight: 500;

            --heading-color: #000;
            --heading-font-family: 'Poppins', sans-serif;
            --heading-font-weight: 700;

            --title-color: #000;
            --title-font-family: 'Poppins', sans-serif;
            --title-font-weight: 400;

            --body-color: #000;
            --body-background-color: #fff;
            --body-font-family: 'Poppins', sans-serif;
            --body-font-size: 14px;
            --body-font-weight: 400;

            --section-heading-color: #000;
            --section-heading-font-family: 'Poppins', sans-serif;
            --section-heading-font-size: 48px;
            --section-heading-font-weight: 600;

            --section-subheading-color: #000;
            --section-subheading-font-family: 'Poppins', sans-serif;
            --section-subheading-font-size: 18px;
            --section-subheading-font-weight: 400;
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/vendor.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
</head>

<body>
    <div class="body-wrapper">
        <?php echo $__env->make('web.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main id="MainContent" class="content-for-layout">
            <?php $__env->startSection('main'); ?>
            <?php echo $__env->yieldSection(); ?> 
        </main>

        <!-- footer start -->
        <?php echo $__env->make('web.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- footer end -->

        <!-- scrollup start -->
        <button id="scrollup">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>  
        </button>
        <!-- scrollup end -->

        <!-- drawer menu start -->
        <?php echo $__env->make('web.layouts.drawer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- drawer menu end -->

        <!-- drawer cart start -->
        <?php echo $__env->make('web.layouts.cart-drawer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- drawer cart end -->

        <!-- product quickview start -->
        <?php echo $__env->make('web.layouts.quickview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- product quickview end -->

        <!-- newsletter subscribe modal start -->
        
        <!-- newsletter subscribe modal end -->

        <!-- all js -->
        <script src="<?php echo e(asset('assets/js/vendor.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

        
    </div>
</body>
</html><?php /**PATH /Users/asifjamal/Documents/ecommerce/resources/views/web/layouts/master.blade.php ENDPATH**/ ?>