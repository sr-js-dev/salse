<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" >
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed dashboard-mobile" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="<?php echo e(URL::asset('/')); ?>">
               <!-- <img src="<?php echo e(URL::asset('img/logo.png')); ?>" alt="Sales C2" class="img-responsive" /> -->
                    <img width="209px" height="77px" src="<?php echo e(URL::asset('img/logo.png')); ?>" alt="Sales C2" class="img-responsive" />
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse navbar-right" style="display:flex!important;">
                
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" type="button" name="login" value="Logout" class="login-btn"><p style="color:#bb0000;margin:0px 0 0px;!important;"><?php echo e(Auth::user()->name); ?></p>/Logout</button>
                
                <a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal"><img src="<?php echo e(URL::asset('img/humburger-menu.png')); ?>" alt="" class="humburger-menu" /></a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: one;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <section class="nav-bg">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar5" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar5" class="collapse navbar-collapse">
                <div  class="container">
                    <ul class="nav navbar-nav sales-nav">
                        <li><a href="<?php echo e(URL::asset('dashboard/')); ?>">Dashboard</a></li>
                        <li><a href="<?php echo e(URL::asset('dashboard/team')); ?>">Team</a></li>
                        <li><a href="<?php echo e(URL::asset('dashboard/accounts')); ?>">Accounts</a></li>
                        <li><a href="<?php echo e(URL::asset('dashboard/services')); ?>">Services</a></li>
                        <li><a href="<?php echo e(URL::asset('dashboard/tasks')); ?>">Tasks</a></li>
                        <li><a href="<?php echo e(URL::asset('dashboard/calendar')); ?>">Calendar</a></li>
                        <li><a href="<?php echo e(URL::asset('dashboard/map')); ?>">Map</a></li>
                        <li><a href="<?php echo e(URL::asset('dashboard/reporting')); ?>">Reporting</a></li>                        
                    </ul>
                </div>
            </div>
        </section>
    </nav>
</header>

<!-- Hamburger Menu -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-md loginmodalbox">
            <div class="modal-content" style="background:#2e488a;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="" id="myModalLabel"><img src="<?php echo e(URL::asset('img/footer-logo.png')); ?>" alt="" width="100" /></h4>
                </div>
                <div class="modal-body" style="color:white;">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <div class="title-lg" style="color:white;">Locate Us</div>
                            <div class="title-md ptb" style="color:white;">Head Office</div>
                            <div class="title-sm" style="color:white;">Address will come here</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="title-lg" style="font-weight: 600; color:white;">Service and Support</div>
                            <div class="title-sm ptb" style="color:white;">For any queries/service support,  <a href="mailto:administrator@salesc2.com" style="color:white;">administrator@salesc2.com</a></div>
                        </div>
                        <div class="col-md-4 col-sm-6 txt-right">
                            

                            <div><a onClick="event.preventDefault(); document.getElementById('logout-form').submit();" class="loginmodalbox a request-modal-btn"><p style="color:#bb0000;"><?php echo e(Auth::user()->name); ?></p>logout</button></a></div>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: one;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </div>
                    </div>
                    <div class="row p-t-b p-b-0" style="color:white;">
                        <div class="col-md-12 col-sm-12 txt-right">
                            <div class="menu-links">
                                <a href="<?php echo e(URL::asset('about-us')); ?>" style="color:white;">About Us</a><br/>
                                <a href="<?php echo e(URL::asset('products')); ?>" style="color:white;">Products</a><br/>
                                <a href="<?php echo e(URL::asset('contact-us')); ?>" style="color:white;">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="row top-minus">
                        <div class="col-md-12 col-sm-12">
                            <div class="social-icons">
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Hamburger menu END-->


<?php /**PATH E:\Code\salesc2\resources\views/dashboard/dashboardHeader.blade.php ENDPATH**/ ?>