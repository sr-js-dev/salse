<?php $__env->startSection('content'); ?>


<div class="clearfix">&nbsp;</div>
<section class="form-sections">
    <div class="container">
        <div class="row">
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e($message); ?></strong>
            </div>
            <br>
            <?php endif; ?>
            <div class="col-md-12 col-sm-12" align="right">
                <a href="#" class="add-services">Add Customer</a>
                <div class="border-btm"></div>
            </div>
        </div>

        
    <form method="post" action="<?php echo e(url('add-customer')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

            <div class="row empty-space">
                <!--  -->
               
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label>Segment</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="rail-select">
                            <div class="select-side"><i class="glyphicon glyphicon-menu-down black"></i></div>
                            <span class="asterisk">*</span>
                            <select class="form-control" name="segment">
                                <?php $__currentLoopData = $storecustomercustomers_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value = "<?php echo e($data->segment); ?>" ><?php echo e($data->segment); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label>Name</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="rail-select">
                            <div class="select-side"><i class="glyphicon glyphicon-menu-down black"></i></div>
                            <span class="asterisk">*</span>
                            <select class="form-control" name="name" >
                                <?php $__currentLoopData = $storecustomercustomers_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value = "<?php echo e($data->name); ?>" ><?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label>Division</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="rail-select">
                            <div class="select-side"><i class="glyphicon glyphicon-menu-down black"></i></div>
                            <span class="asterisk">*</span>
                            <select class="form-control" name="division">
                                <?php $__currentLoopData = $storecustomercustomers_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value = "<?php echo e($data->division); ?>" ><?php echo e($data->division); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label>Address</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="rail-select">
                            <div class="select-side"><i class="glyphicon glyphicon-menu-down black"></i></div>
                            <span class="asterisk">*</span>
                            <select class="form-control" name="address">
                                <?php $__currentLoopData = $storecustomercustomers_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value = "<?php echo e($data->address); ?>" ><?php echo e($data->address); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label>City</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <input type="text" name="city" value=""  class="form-control" id="city" placeholder="GURGAON" />
                    </div>
                </div>
                <!--  -->
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label>State</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <input type="text" name="state" value=""  class="form-control" id="state" placeholder="Haryana" />
                    </div>
                </div>
                <!--  -->
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label>Zip</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <input type="text" name="zip" value=""  class="form-control" id="zip" placeholder="122001" />
                    </div>
                </div>
                <!--  -->
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label>Poc Name</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <input type="text" name="pocname" value=""  class="form-control" id="pocname" placeholder="LOREM IPSUM" />
                    </div>
                </div>
                <!--  -->
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label for="phone">Phone</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <input type="text" name="phone" value=""  class="form-control" id="phone" placeholder="+91 8826281444" />
                    </div>
                </div>
                <!--  -->
                <div class="form-group">
                    <div class="col-md-3 col-sm-4">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <input type="text" name="email" value=""  class="form-control" id="email" placeholder="info@test.com" />
                    </div>
                </div>
                <!--  -->
                <div class="form-group top-spacer">
                    <div class="col-md-12 col-md-12 text-right">
                        <button type="submit" name="cancel" id="cancel" class="cancel-btn">Cancel</button>
                        <button  name="add" id="add" class="add-btn">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Code\Laravel\salesc2(0511-complete)\resources\views/dashboard/customers.blade.php ENDPATH**/ ?>