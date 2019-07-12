    <?php if(auth()->guard()->guest()): ?>
    <?php if(Route::has('register')): ?>
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo e(URL::asset('/')); ?>">
                        <img width="220px" height="120px" src="<?php echo e(URL::asset('img/logo.png')); ?>" alt="Sales C2" class="img-responsive" />
                    </a>
                </div>
                <div id="navbar" class="collapse navbar-collapse navbar-right">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#myLogin"><button type="button" name="login" value="Login" class="login-btn" >Login</button></a>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#requestDemo"><button type="button" name="" value="" class="request-demo-btn">Request Demo</button></a>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal"><img src="<?php echo e(URL::asset('img/humburger-menu.png')); ?>" alt="" class="humburger-menu" /></a>
                </div>
                <!--<div id="navbar" class="collapse navbar-collapse navbar-right">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">About Us</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                  </div> -->
            </div>
        </nav>
    </header>
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

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-md loginmodalbox" style="font-family:none">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="" id="myModalLabel"><img src="<?php echo e(URL::asset('img/footer-logo.png')); ?>" alt="" width="100" /></h4>
                </div>
                <div class="modal-body" style="background:#2e488a;">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <div class="title-lg">Locate Us</div>
                            <div class="title-md ptb">Head Office</div>
                            <div class="title-sm">Address will come here</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="title-lg" style="font-weight: 600;">Service and Support</div>
                            <div class="title-sm ptb">For any queries/service support,  <a href="mailto:administrator@salesc2.com" style="color: white;">administrator@salesc2.com</a></div>
                        </div>
                        <div class="col-md-4 col-sm-6 txt-right">
                            <div><a href="javascript:void(0);" data-toggle="modal" data-target="#requestDemo" class="request-modal-btn">Request Demo</a></div>

                            <div><a href="javascript:void(0);" data-toggle="modal" data-target="#myLogin" class="request-modal-btn">Login</a></div>
                        </div>
                    </div>
                    <div class="row p-t-b p-b-0">
                        <div class="col-md-12 col-sm-12 txt-right">
                            <div class="menu-links">
                                <a href="<?php echo e(URL::asset('about-us')); ?>" style="color: white;">About Us</a><br/>
                                <a href="<?php echo e(URL::asset('products')); ?>" style="color: white;">Products</a><br/>
                                <a href="<?php echo e(URL::asset('contact-us')); ?>" style="color: white;">Contact Us</a>
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

    <!--modal myLogin contents-->
    <div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">

        <div class="modal-dialog modal-md loginmodalbox" style="font-family:none">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="" id="myModalLabel"><img src="<?php echo e(URL::asset('/img/footer-logo.png')); ?>" alt="" width="100" /></h4>
            </div>


            <div style="color:white;">
                <div class="login-form-2 loginBox">
                    <h3>Login</h3>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input id="email" type="email" class="form-login form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" required autocomplete="email" autofocus placeholder="Email *" value="" />
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-login form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password" placeholder="Password *" value="" />
                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                            <span class="invalid-feedback" role="alert">
                                        
                                    </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <div>
                            <input type="checkbox" id="remember_me" name="_remember_me" />
                            <label for="remember_me">Keep me logged in</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btnSubmit" style="font-size:17px;">
                                <?php echo e(__('Login')); ?>

                            </button>

                            <?php if(Route::has('password.request')): ?>
                                <a class="btn btn-link" style="color:white;" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>

                <div class="login-form-2 registerBox" style="display:none;">
                    <h3>Register</h3>

                    <form method="POST" class="register-form" id="login-form" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input id="name" type="text" class="form-login form-control <?php echo e($errors->has('name') ? 'is-invalid':''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus placeholder="Full Name *" />
                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <input id="phone" type="text" class="form-login form-control <?php echo e($errors->has('phone') ? 'is-invalid':''); ?>" placeholder="Phone Number *" value="" name="phone" required autocomplete="phone"/>
                            <?php if($errors->has('phone')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('phone')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input id="register_email" type="email" class="form-login form-control <?php echo e($errors->has('email') ? 'is-invalid':''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email *"/>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input id="register_password" type="password" class="form-login form-control <?php echo e($errors->has('password') ? 'is-invalid':''); ?>" name="password" required autocomplete="new-password" placeholder="Password *" value="" />
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <input id="register_password-confirm" type="password" class="form-login form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                        </div>
                        <div>
                            <input type="checkbox" id="register_remember_me" name="_remember_me" />
                            <label for="remember_me">Remember Me</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btnSubmit">
                                <?php echo e(__('Register')); ?>

                            </button>
                        </div>
                    </form>

                </div>
                <div class="modalFooter" style="background:#2e488a;border-top:1px solid;">
                    <div class="login-footer">
                       
                             <a href="javascript: showRegisterForm();" class="btn btn-link" style="color:white;"><strong style="font-size:20px;color:#ffffff;">Create an account</strong></a>
                    </div>
                    <div class= "register-footer" style="display:none">
                        <span>Already have an account?</span>
                        <a href="javascript: showLoginForm();" class="btn btn-link" style="color:white;"><strong style="font-size:20px;color:#ffffff;">Login</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--modal myLogin contents end-->



    <!--modal Request demo contents start-->
    <div class="modal fade" id="requestDemo" tabindex="-1" role="dialog" aria-labelledby="request-demo" aria-hidden="true">
        <div class="modal-dialog modal-md loginmodalbox" style="font-family:none">

            <div class="container-contact100">

                <div class="wrap-contact100">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <?php if(Session::has('flash_message')): ?>
                     <div class="alert alert-success"><?php echo e(Session::get('flash_message')); ?></div>
                    <?php endif; ?>
                    <form class="contact100-form validate-form" method="post" action="<?php echo e(route('request.store')); ?>">
                        <?php echo csrf_field(); ?>
                            <span class="contact100-form-title">
                            Request Demo

                            </span>
                                
                                    <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                                        <span class="label-input100">FULL NAME *</span>
                                        <input class="input100" type="text" name="name" placeholder="Enter Your Name">
                                        <!-- <?php if($errors->has('name')): ?>
                                        <small class="form-text invalid-feedback"><?php echo e($errors->first('name')); ?></small>
                                        <?php endif; ?> -->
                                    </div>

                                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
                                        <span class="label-input100">Email *</span>
                                        <input class="input100" type="text" name="email" placeholder="Enter Your Email ">
                                    </div>

                                    <div class="wrap-input100 bg1 rs1-wrap-input100">
                                        <span class="label-input100">Phone</span>
                                        <input class="input100" type="text" name="phone" placeholder="Enter Number Phone">
                                    </div>


                                    <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
                                        <span class="label-input100">Message</span>
                                        <textarea id="message" class="input100" name="message" placeholder="Your message here..."></textarea>
                                    </div>

                                    <div class="container-contact100-form-btn">
                                        <button class="contact100-form-btn">
                                <span>
                                Request Demo
                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                </span>
                                        </button>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?php endif; ?>
     <?php else: ?>



    <header>
    <nav class="navbar-inverse navbar-fixed-top">
        <div class="container">
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
            <button onclick="location.href='<?php echo e(URL::asset('dashboard/')); ?>';" type="button" name="dashboard" value="Dashboard" class="login-btn">Dashboard</button>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" type="button" name="login" value="Logout" style="display:flex;"class="login-btn"><p style="color:#bb0000;margin:0px 0 0px;!important;"><?php echo e(Auth::user()->name); ?></p>/Logout</button>
                
                <a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal"><img src="<?php echo e(URL::asset('img/humburger-menu.png')); ?>" alt="" class="humburger-menu" /></a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: one;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <section class="nav-bg">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed dashboard-mobile" data-toggle="collapse" data-target="#navbar5" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </section>
    </nav>
</header>

<!-- Hamburger Menu -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-md loginmodalbox" style="font-family:none">
            <div class="modal-content">
                <div class="modal-header" style="color:white;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><img src="<?php echo e(URL::asset('img/footer-logo.png')); ?>" alt="" width="100" /></h4>
                </div>
                <div class="modal-body" style="background:#2e488a;">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <div class="title-lg">Locate Us</div>
                            <div class="title-md ptb">Head Office</div>
                            <div class="title-sm">Address will come here</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="title-lg" style="font-weight: 600;">Service and Support</div>
                            <div class="title-sm ptb">For any queries/service support,  <a href="mailto:administrator@salesc2.com" style="color:white;">administrator@salesc2.com</a></div>
                        </div>
                        <div class="col-md-4 col-sm-6 txt-right">
                            

                            <div><a onClick="event.preventDefault(); document.getElementById('logout-form').submit();" style="width: auto!important; height: auto!important;" class="loginmodalbox a request-modal-btn"><p style="color:#bb0000;"><?php echo e(Auth::user()->name); ?></p>logout</button></a></div>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: one;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </div>
                    </div>
                    <div class="row p-t-b p-b-0">
                        <div class="col-md-12 col-sm-12 txt-right">
                            <div class="menu-links" style="color:white;">
                                <a href="<?php echo e(URL::asset('about-us')); ?>">About Us</a><br/>
                                <a href="<?php echo e(URL::asset('products')); ?>">Products</a><br/>
                                <a href="<?php echo e(URL::asset('contact-us')); ?>">Contact Us</a>
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

    <?php endif; ?>   
<?php /**PATH E:\Code\Laravel\salesc2(0511-complete)\resources\views/frontend/header.blade.php ENDPATH**/ ?>