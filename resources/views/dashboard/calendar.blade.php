@extends('layouts.calendarLayout')
@section('content')
<div class="clearfix">&nbsp;</div>


<div class="container">

    <div class="panel panel-primary" style="margin-top:210px; color: #fff;background-color: #2e488a;border-color: #2e488a;">
        <div class="panel-heading" style="color: #fff;background-color: #2e488a;border-color: #fff;">Salesc2 Schedule</div>
        <div class="panel-body">

            {!! Form::open(array('route' => 'events.add', 'method'=>'POST', 'files'=>'true')) !!}
            <div class="row">
                @if (Session::has('success'))
                <div class="alert alter-success">{{ Session::get('success') }}</div>
                @elseif (Session::has('warning'))
                <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                @endif
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('customer', 'Customer:') !!}
                    <div class="">
                        {!! Form::text('customer', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('customer', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('division', 'Division:') !!}
                    <div class="">
                        {!! Form::text('division', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('division', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('service', 'Service:') !!}
                    <div class="">
                        {!! Form::text('service', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('service', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('type', 'Type:') !!}
                    <div class="">
                        {!! Form::text('type', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('type', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('product_1', 'Product1:') !!}
                    <div class="">
                        {!! Form::text('product_1', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('product_1', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('model_1', 'Model1:') !!}
                    <div class="">
                        {!! Form::text('model_1', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('model_1', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('product_2', 'Product2:') !!}
                    <div class="">
                        {!! Form::text('product_2', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('product_2', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('model_2', 'Model2:') !!}
                    <div class="">
                        {!! Form::text('model_2', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('model_2', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('date', 'Date:') !!}
                    <div class="">
                        {!! Form::date('date', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('date', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('time', 'Time:') !!}
                    <div class="">
                        {!! Form::time('time', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('time', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('completion_date', 'Completion Date:') !!}
                    <div class="">
                        {!! Form::date('completion_date', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('completion_date', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
    {{--  <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('assigned_sales_rep', 'Assigned Sales Rep:') !!}
                    <div class="">
                       {!! Form::select('assigned_sales_rep', $tasks->pluck('assigned_sales_rep'), null, [ 'class' => 'form-control margin']) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    <div class="">
                        {!! Form::select('status', array('Inprogress'=> 'Inprogress', 'Complete' => 'Complete','Canceled'=>'Canceled','Incomplete'=>'Incomplete', 'Not Assinged'=>'Not Assigned'), null, ['class' => 'form-control']); !!}
                        {!! $errors->first('status', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>  --}}

            <div class="col-xs-2 col-sm-2 col-md-2 text-center" style="margin-top:40px;display:flex;justify-content: center;">
                {!! Form::submit('Add Task', ['class'=>'table-btn', 'id'=>'add_task_calendar']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <div class="container">
        <div class="col-md-12">
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}</div>
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

@endsection
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