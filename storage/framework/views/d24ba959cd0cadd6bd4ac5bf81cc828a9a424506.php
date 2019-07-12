<!doctype html>
<html lang="en">
<head>
   
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo e(URL::asset('img/favicon.ico')); ?>" type="image/x-icon">
    <title>Welcome to Sales</title>




    <script src="<?php echo e(URL::asset('vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>


    
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
    <?php if(isset($map)): ?><?php echo $map['js']; ?><?php endif; ?>

</head>
<style>
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9
  {
      padding:5px!important;
}
@media (max-width:786px){
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9
  {
    display:contents;
}
}
</style>
<body>

<?php echo $__env->make('dashboard.dashboardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="py-4">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<?php echo $__env->make('dashboard.dashboardFooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>
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
<?php /**PATH E:\Code\salesc2\resources\views/layouts/calendarLayout.blade.php ENDPATH**/ ?>