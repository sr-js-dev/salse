<?php $__env->startSection('content'); ?>
    <section class="home-page">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <h1 class="home-banner-slogan">Field Sales<br/>Optimization<br/>Software</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <a href="#section01" class="arrow-down"><img src="<?php echo e(URL::asset('img/down-arrow.png')); ?>" alt="" /></a>
                </div>
            </div>
        </div>
    </section>
    <section class="how-sales-to-help" id="section01">
        <h2>How SalesC2 Helps</h2>
        <div class="line-hr"></div>
    </section>
    <section class="images-section">
        <div class="container">
            <div class="row p-t">
                <div class="col-md-6 col-sm-6">
                    <img src="<?php echo e(URL::asset('img/img-sm-one.jpg')); ?>" alt="" />
                </div>
                <div class="col-md-6 col-sm-6">
                    <h3>Optimize Operations Through<br class="hidden-xs hidden-sm hidden-md" />Efficient Territory Management</h3>
                    <div class="paragraph">Utilizing SalesC2 will allow your field sales teams to automate processes, better manage time, and enable real time task organization/prioritization to meet the needs of your customers.   Leverage the mobile app to manage the constantly changing dynamics of your schedule.</div>
                </div>
            </div>
            <div class="row p-t-b">
                <div class="col-md-7 col-sm-7 p-t-b-para">
                    <h3>Improve Business Intelligence Through<br class="hidden-xs hidden-sm hidden-md"/>Data Analytics and Reporting</h3>
                    <div class="paragraph">Support forecasting and staffing decisions with qualified data on the operating requirements of your Area, Region, or Territory. </div>
                </div>
                <div class="col-md-5 col-sm-5">
                    <img src="<?php echo e(URL::asset('img/img-sm-two.png')); ?>" alt="" style="border: 0" />
                </div>
            </div>
            <div class="row p-t-b">
                <div class="col-md-6 col-sm-6">
                    <img src="<?php echo e(URL::asset('img/img-sm-three.jpg')); ?>" alt="" />
                </div>
                <div class="col-md-6 col-sm-6">
                    <h3>Transparent Team Execution Through<br class="hidden-xs hidden-sm hidden-md"/>Efficient Communication and Coordination</h3>
                    <div class="paragraph">Easily and efficiently communicate and coordinate customer requirements to your field sales team.  Extend your planning cycle and mitigate scheduling vulnerabilities.  Meet unexpected scheduling needs head on through the capabilities provided by knowing who is available to support at all times.</div></div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Code\Laravel\salesc2(0511-complete)\resources\views/home.blade.php ENDPATH**/ ?>