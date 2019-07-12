@extends('layouts.calendarLayout')
@section('content')
<div class="clearfix">&nbsp;</div>
<section class="form-sections">
    <div class="container">
        <div class="row customer-dashboard">
            <div class="col-sm-5" style="padding:0 15px 0 15px!important;">
                <div class="dashboard-table">&nbsp;&nbsp;&nbsp;TASK<a class="dashboard-table" href="{{URL::asset('dashboard/tasks')}}"><i class="dashboard-zoom-icon glyphicon glyphicon-fullscreen blinking"></i></a></div>
                <div class="dashboard dashboard-task table-responsive">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-black">Customer</th>
                                <th scope="col" class="text-black">Service</th>
                                <th scope="col" class="text-black">Date</th>
                                <th scope="col" class="text-black">Time</th>
                                <th scope="col" class="text-black">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedule as $value)
                            <tr>
                                <td style="font-size:12px;">{{$value->customer}}</th>
                                <td style="font-size:12px;">{{$value->service}}</td>
                                <td style="font-size:12px;">{{$value->date}}</td>
                                <td style="font-size:12px;">{{$value->time}}</td>
                                @if($value->status =='Complete')
                                <td style="font-size:15px;" class="col complete-blinking"><b>{{$value->status}}</td>
                                @elseif($value->status =='Incomplete')
                                <td style="font-size:15px;" class="col incomplete-blinking"><b>{{$value->status}}</td>
                                @elseif($value->status =='Canceled')
                                <td style="font-size:15px;" class="col canceled-blinking"><b>{{$value->status}}</td>
                                @elseif($value->status =='Inprogress')
                                <td style="font-size:15px;" class="col inprogress-blinking"><b>{{$value->status}}</td>
                                @elseif($value->status =='Unassigned')
                                <td style="font-size:15px;" class="col text-black"><b>{{$value->status}}</td>

                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="dashboard dashboard-schedule">
                    <div class="dashboard-table">&nbsp;&nbsp;&nbsp;SCHEDULE<a class="dashboard-table" href="{{URL::asset('dashboard/calendar')}}"><i class="dashboard-zoom-icon glyphicon glyphicon-fullscreen blinking"></i></a></div>

                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                </div>

                <div class="dashboard report">
                    <div class="dashboard-table">&nbsp;&nbsp;&nbsp;REPORT<a class="dashboard-table" href="{{URL::asset('dashboard/reporting')}}"><i class="dashboard-zoom-icon glyphicon glyphicon-fullscreen blinking"></i></a></div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="text-center" style="font-size:30px;font-weight:600;">
                                    <h4 class="text-light" style="font-size:16px;">SALES REP</h4>
                                    <span class="empty-space">{{$assigned_rep_sales_count}}</span>
                                </td>
                                <td class="text-center" style="font-size:30px;font-weight:600;">
                                    <h4 class="text-black" style="font-size:16px";>TOTAL TASK</h4>
                                    <span class="empty-space text-black">{{$total_tasks}}</span>
                                </td>
                                <td class="text-center" style="font-size:30px;font-weight:600;">
                                    <h4 class="complete-blinking" style="font-size:16px;">COMPLETED TASK</h4>
                                    <span class="empty-space complete-blinking">{{$complete_tasks}}</span>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-center" style="font-size:30px;font-weight:600;">
                                    <h4 class="inprogress-blinking" style="font-size:16px;">IN PROGRESS</h4>
                                    <span class="empty-space inprogress-blinking">{{$inprogress_tasks}}</span>
                                </td>
                                <td class="text-center" style="font-size:30px;font-weight:600;">
                                    <h4 class="canceled-blinking" style="font-size:16px;">CANCELED</h4>
                                    <span class="empty-space canceled-blinking">{{$canceled_tasks}}</span>
                                </td>
                                <td class="text-center" style="font-size:30px;font-weight:600;">
                                    <h4 class="incomplete-binking" style="font-size:16px;">INCOMPLETED TASK</h4>
                                    <span class="empty-space incomplete-binking">{{$incomplete_tasks}}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-7 dashboard-map">{!! $map['html'] !!}</div>
        </div>
    </div>


    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-sales">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Task</h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="color:white;border-top:1px solid;">
                                <th class="col">Customer</th>
                                <th class="col">Division</th>
                                <th class="col">Service</th>
                                <th class="col">Type</th>
                                <th class="col">Product1</th>
                                <th class="col">Model1</th>
                                <th class="col">Product2</th>
                                <th class="col">Model2</th>
                                <th class="col">Date</th>
                                <th class="col">Time</th>
                                <th class="col">Completion Date</th>
                                <th class="col">Assigned Sales Rep</th>
                                <th class="col">Status</th>
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
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1px solid;" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Map Modal -->
<div id="markerDetailModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:100%" ;>

        <!-- Modal content-->
        <div class="modal-sales">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Task Details in <b>{{$location}}</b></h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endsection
<script>
    function calendarEventClickHandler(event) {

        $.get("/dashboard/calendar/" + event.id, function(res) {
            $("#modal_task_customer").html(res.customer)
            $("#modal_task_service").html(res.service)
            $("#modal_task_division").html(res.division)
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
    function showTasksofMember(id) {
        $.get('/dashboard/map/task/' + id, function(result) {
            console.log(result);
            $("#markerDetailModal .modal-body").html(result)
            $("#markerDetailModal").modal('show')
        })
        console.log(id)
    }
    function showTasksofMember_member(id) {
        $.get('/dashboard/map/task_member/' + id, function(result) {
            console.log(result);
            $("#markerDetailModal .modal-body").html(result)
            $("#markerDetailModal").modal('show')
        })
        console.log(id)
    }
</script>