<!doctype html>
<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
</head>

    
    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <!--===============================================================================================-->
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
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/main.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/dashboard/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/dashboard/ie10-viewport-bug-workaround.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/dashboard/layout.css')); ?>">
    

</head>

<body>

<?php echo $__env->make('dashboard.dashboardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="py-4">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<?php echo $__env->make('dashboard.dashboardFooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo e(URL::asset('js/ie10-viewport-bug-workaround.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
    });
</script>

</body>
</html>
<?php /**PATH E:\Code\Laravel\salesc2(0511-complete)\resources\views/layouts/indexLayout.blade.php ENDPATH**/ ?>