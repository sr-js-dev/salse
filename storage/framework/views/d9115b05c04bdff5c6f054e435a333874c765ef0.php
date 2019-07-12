<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo e(URL::asset('img/favicon.ico')); ?>" type="image/x-icon">
    <title>Welcome to Sales</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/main.css')); ?>">
    <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/ie10-viewport-bug-workaround.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/layout.css')); ?>" rel="stylesheet">
    

    <script src="<?php echo e(URL::asset('vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
    <link rel="icon" type="image/png" href="<?php echo e(URL::asset('img/icons/favicon.ico')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('fonts/iconic/css/material-design-iconic-font.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('vendor/animate/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('vendor/css-hamburgers/hamburgers.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('vendor/animsition/css/animsition.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('vendor/select2/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('vendor/daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('vendor/noui/nouislider.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/util.css')); ?>">
    

    <link href="<?php echo e(asset('bootstrap-toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css">

    <script src="<?php echo e(URL::asset('js/login-register.js')); ?>" type="text/javascript"></script>

</head>
<body>
<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="py-4">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--===============================================================================================-->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/ie10-viewport-bug-workaround.js')); ?>"></script>

<script src="<?php echo e(URL::asset('bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
                return false;
            }
        }
    });

</script>

<script>

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "3000",
        "timeOut": "10000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    <?php
        if ($errors->has('name')){ ?>
            var val = "<?php echo $errors->first('name') ?>";
            toastr['error'](val, "Try again!");
    <?php } ?>

    <?php
        if ($errors->has('phone')){ ?>
            var val = "<?php echo $errors->first('phone') ?>";
            toastr['info'](val, "Try again!");
    <?php } ?>

    <?php
        if ($errors->has('email')){ ?>
            var val = "<?php echo $errors->first('email') ?>";
            toastr['warning'](val, "Try again!");
    <?php } ?>

    <?php
        if ($errors->has('password')){ ?>
        var val = "<?php echo $errors->first('password') ?>";
        toastr['error'](val, "Try again!");
    <?php } ?>
    <?php
        if ($errors->has('message')){ ?>
        var val = "<?php echo $errors->first('message') ?>";
        toastr['error'](val, "Try again!");
    <?php } ?>

         

</script>

</body>
</html>
<?php /**PATH E:\Code\Laravel\salesc2(0511-complete)\resources\views/layouts/frontLayout.blade.php ENDPATH**/ ?>