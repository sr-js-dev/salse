<?php $__env->startSection('content'); ?>
<div class="clearfix">&nbsp;</div>


<div class="container">

    <div class="panel panel-primary" style="margin-top:210px; color: #fff;background-color: #2e488a;border-color: #2e488a;">
        <div class="panel-heading" style="color: #fff;background-color: #2e488a;border-color: #fff;">Salesc2 Schedule</div>
        <div class="panel-body">

            <?php echo Form::open(array('route' => 'events.add', 'method'=>'POST', 'files'=>'true')); ?>

            <div class="row">
                <?php if(Session::has('success')): ?>
                <div class="alert alter-success"><?php echo e(Session::get('success')); ?></div>
                <?php elseif(Session::has('warning')): ?>
                <div class="alert alert-danger"><?php echo e(Session::get('warning')); ?></div>
                <?php endif; ?>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('customer', 'Customer:'); ?>

                    <div class="">
                        <?php echo Form::text('customer', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('customer', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('division', 'Division:'); ?>

                    <div class="">
                        <?php echo Form::text('division', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('division', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('service', 'Service:'); ?>

                    <div class="">
                        <?php echo Form::text('service', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('service', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('type', 'Type:'); ?>

                    <div class="">
                        <?php echo Form::text('type', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('type', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('product_1', 'Product1:'); ?>

                    <div class="">
                        <?php echo Form::text('product_1', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('product_1', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('model_1', 'Model1:'); ?>

                    <div class="">
                        <?php echo Form::text('model_1', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('model_1', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('product_2', 'Product2:'); ?>

                    <div class="">
                        <?php echo Form::text('product_2', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('product_2', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('model_2', 'Model2:'); ?>

                    <div class="">
                        <?php echo Form::text('model_2', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('model_2', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('date', 'Date:'); ?>

                    <div class="">
                        <?php echo Form::date('date', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('date', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('time', 'Time:'); ?>

                    <div class="">
                        <?php echo Form::time('time', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('time', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('completion_date', 'Completion Date:'); ?>

                    <div class="">
                        <?php echo Form::date('completion_date', null, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('completion_date', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div>
    

            <div class="col-xs-2 col-sm-2 col-md-2 text-center" style="margin-top:40px;display:flex;justify-content: center;">
                <?php echo Form::submit('Add Task', ['class'=>'table-btn', 'id'=>'add_task_calendar']); ?>

            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

    <div class="container">
        <div class="col-md-12">
            <?php echo $calendar->calendar(); ?>

            <?php echo $calendar->script(); ?></div>
    </div>

</div>

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:100%;">
        <div class="modal-sales">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Task</h4>
            </div>
            <div class="modal-body">
                <div class="row table-responsive">
                <table class="table">
                    <thead>
                        <tr style="color:white;border-top:1px solid;">
                            <th scope="col">Customer</th>
                            <th scope="col">Division</th>
                            <th scope="col">Service</th>                            
                            <th scope="col">Type</th>
                            <th scope="col">Product_1</th>
                            <th scope="col">Model_1</th>
                            <th scope="col">Product_2</th>
                            <th scope="col">Model_2</th>
                            <th scope='col'>Date</th>
                            <th scope='col'>Time</th>
                            <th scope='col'>Completion_Date</th>
                            <th scope='col'>Assigned Sales Rep</th>
                            <th scope='col'>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="color:white;border-bottom:1px solid;">
                            <td><strong id="modal_task_customer"></strong></td>
                            <td><strong id="modal_task_division"></strong></td>
                            <td><strong id="modal_task_service"></strong></td>
                            <td><strong id="modal_task_type"></strong></td>
                            <td><strong id="modal_task_product_1"></strong></td>
                            <td><strong id="modal_task_model_1"></strong></td>
                            <td><strong id="modal_task_product_2"></strong></td>
                            <td><strong id="modal_task_model_2"></strong></td>
                            <td><strong id="modal_task_date"></strong></td>
                            <td><strong id="modal_task_time"></strong></td>
                            <td><strong id="modal_task_completion_date"></strong></td>
                            <td><strong id="modal_task_assigned_sales_rep"></strong></td>
                            <td><strong id="modal_task_status"></strong></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="table-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<script>
    function calendarEventClickHandler(event) {

        $.get("/dashboard/calendar/" + event.id, function(res) {
            $("#modal_task_customer").html(res.customer)  
            $("#modal_task_division").html(res.division)
            $("#modal_task_service").html(res.service)
            $("#modal_task_type").html(res.type)
            $("#modal_task_product_1").html(res.product_1)
            $("#modal_task_model_1").html(res.model_1)
            $("#modal_task_product_2").html(res.product_2)
            $("#modal_task_model_2").html(res.model_2)
            $("#modal_task_date").html(res.date)
            $("#modal_task_time").html(res.time)
            $("#modal_task_completion_date").html(res.completion_date)
            $("#modal_task_assigned_sales_rep").html(res.assigned_sales_rep)
            $("#modal_task_status").html(res.status)
            $("#eventModal").modal("show");
        })
    }
</script>
<script>
dayRender: function(date, cell) {
                var today = $.fullCalendar.moment();
                var end = $.fullCalendar.moment().add(7, 'days');
                if (date.get('date') == today.get('date')) {
                    cell.css("background", "#e8e8e8");
     }
}
</script>
<?php echo $__env->make('layouts.calendarLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Code\Laravel\salesc2(0511-complete)\resources\views/dashboard/calendar.blade.php ENDPATH**/ ?>