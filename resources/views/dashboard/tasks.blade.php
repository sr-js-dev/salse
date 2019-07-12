@extends('layouts.dashboardLayout')
@section('content')

<div class="clearfix">&nbsp;</div>
<section class="form-sections">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 p-t">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="task-status text-center">
              <h4 class="text-black">TOTAL TASK</h4>
              <span class="text-black empty-space">{{$total_events}}</span>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="task-status text-center">
              <h4>ONGOING TASK</h4>
              <span class="empty-space">{{$inprogress_events}}</span>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="task-status text-center">
              <h4 class="text-red">CANCELED TASK</h4>
              <span class="text-red empty-space">{{$canceled_events}}</span>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="task-status text-center">
              <h4 class="text-green">COMPLETED TASK</h4>
              <span class="text-green empty-space">{{$complete_events}}</span>
            </div>
          </div>
        </div>
        <div class="border-btm"></div>
      </div>
    </div>

    <!-- Search Dropdown Start-->

    <div class="row">

      <div class="col-md-3 col-sm-3" style="float:right;">
        <button type="button" class="btn btn-lg table-btn add-task" data-toggle="modal" data-target="#addTaskModal" style="margin-bottom:0px;">ADD TASK</button>
      </div>
    </div>
  </div>
</section>

<section class="empty-space">
  <div class="justify-content-center table-responsive container-sales">

    <div class="col-md-auto">
      <table id="datatable" class="table table-striped table-bordered" style="color:black;font-family:'sans-serif'">
        <thead>
          <tr style="color:#2E488A;">
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
            <th class="col">Notes</th>
            <th class="col all">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($events as $event)
          <tr>
            <td class="col">{{$event->customer}}</td>
            <td class="col">{{$event->division}}</td>
            <td class="col">{{$event->service}}</td>
            <td class="col">{{$event->type}}</td>
            <td class="col">{{$event->product_1}}</td>
            <td class="col">{{$event->model_1}}</td>
            <td class="col">{{$event->product_2}}</td>
            <td class="col">{{$event->model_2}}</td>
            <td class="col">{{$event->date}}</td>
            <td class="col">{{$event->time}}</td>
            <td class="col">{{$event->completion_date}}</td>
            <td class="col">{{$event->assigned_sales_rep}}</td>
            @if($event->status =='Complete')
            <td style="font-size:16px;" class="col complete-blinking"><b>{{$event->status}}</td>
            @elseif($event->status =='Incomplete')
            <td style="font-size:16px;" class="col incomplete-blinking"><b>{{$event->status}}</td>
            @elseif($event->status =='Canceled')
            <td style="font-size:16px;" class="col canceled-blinking"><b>{{$event->status}}</td>
            @elseif($event->status =='Inprogress')
            <td style="font-size:16px;" class="col inprogress-blinking"><b>{{$event->status}}</td>
            @elseif($event->status =='Unassigned')
            <td style="font-size:16px;" class="col text-black"><b>{{$event->status}}</td>
            @endif
            <td class="col view_notes">{{$event->notes}}</td>

            <td style="display:flex;">
              <i class="fa fa-eye fa-sm" style="color: #5cb85c;cursor: pointer;" onclick="viewModal({{$event->id}})"></i>
              <i class="fa fa-edit fa-xs" style="color: #337ab7;cursor: pointer;" onclick="editModal({{$event->id}})"></i>
              <i class="fa fa-trash fa-xs" style="color:#d9534f;cursor: pointer;" onclick="deleteTaskModal({{$event->id}})"></i>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</section>
<!--   Edit Modal  -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document" style="width:50%;">
    <div class="modal-sales">
      <div class="modal-header">
        <h5 class="modal-title">Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" id="updateModalForm" action="{{url('update-task')}}" class="needs-validation">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <label>Customer</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="modal_task_customer" name="customer" required>                
                @foreach($customer as $cus)
                  <option>{{$cus->customer}}</option>
                @endforeach              
              </select>
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Division</label>
            </div>
            <div class="col-md-8">
                <select class="form-control" id="modal_task_division" name="division" required>                
                    @foreach($division as $div)
                      <option>{{$div->division}}</option>
                    @endforeach              
                  </select>
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Service</label>
            </div>
            <div class="col-md-8">
                <select class="form-control" id="modal_task_service" name="service" required>                
                    @foreach($service as $ser)
                      <option>{{$ser->service}}</option>
                    @endforeach              
                </select>
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Type</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="modal_task_type" name="type" required>                
                  @foreach($type as $typ)
                    <option>{{$typ->type}}</option>
                  @endforeach              
              </select>
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Product1</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="modal_task_product_1" name="product_1" required>                
                  @foreach($product_1 as $pro1)
                    <option>{{$pro1->product_1}}</option>
                  @endforeach              
              </select>
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Model1</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="modal_task_model_1" name="model_1" required>                
                  @foreach($model_1 as $mod1)
                    <option>{{$mod1->model_1}}</option>
                  @endforeach              
              </select>
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Product2</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="modal_task_product_2" name="product_2" required>                
                  @foreach($product_2 as $pro2)
                    <option>{{$pro2->product_2}}</option>
                  @endforeach              
              </select>
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Model2</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="modal_task_model_2" name="model_2" required>                
                  @foreach($model_2 as $mod2)
                    <option>{{$mod2->model_2}}</option>
                  @endforeach              
              </select>              
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Date</label>
            </div>
            <div class="col-md-8">
              <input type="date" class="form-control" id="modal_task_date" name="date" required />
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Time</label>
            </div>
            <div class="col-md-8">
              <input type="time" class="form-control" id="modal_task_time" name="time" required />
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Completion Date</label>
            </div>
            <div class="col-md-8">
              <input type="datetime-local" value="" class="form-control" id="modal_task_completion_date" name="completion_date" required />
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Assigned Sales Rep</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="modal_task_assigned_sales_rep" name="assigned_sales_rep" required>
                @foreach($name as $rep)
                <option>{{$rep->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Status</label>
            </div>
            <div class="col-md-8">
              <select name="status" id="modal_task_status" name="status" class="form-control">
                <option value="Inprogress">
                  <div class="inprogress-blinking">Inprogress</div>
                </option>
                <option value="Complete">
                  <div class="complete-blinking">Complete</div>
                </option>
                <option value="Canceled">
                  <div class="canceled-blinking">Canceled</div>
                </option>
                <option value="Incomplete">
                  <div class="incomplete-blinking">Incomplete</div>
                </option>
                <option value="Unassigned">
                    <div class="text-black">Unassigned</div>
                  </option>
              </select>
            </div>
          </div>   <p></p>
          <div class="row">
            <div class="col-md-4">
              <label>Notes</label>
            </div>
            <div class="col-md-8">
              <input type="text" value="" class="form-control" id="modal_task_notes" name="notes" required />
            </div>
          </div>
       
       
      </div>
      <div class="modal-footer">
      <input type="hidden" name="id" value='' id="current_edit_id">
        <button type="submit" class="btn btn-primary" data-id="" id="btnUpdate">Save changes</button>
        <button type="button" class="btn table-btn" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
</div>

<!--   View Modal  -->
<div class="modal fade" tabindex="-1" role="dialog" id="viewModal">
  <div class="modal-dialog" role="document" style="width:100%;">
    <div class="modal-sales">
      <div class="modal-header">
        <h5 class="modal-title">Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr style="border-top:1px solid;">
                <th scope="col">Customer</th>
                <th scope="col">Division</th>
                <th scope="col">Service</th>
                <th scope="col">Type</th>
                <th scope="col">Product1</th>
                <th scope="col">Model1</th>
                <th scope="col">Product2</th>
                <th scope="col">Model2</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Compeltion Date</th>
                <th scope="col">Assigned Sales Rep</th>
                <th scope="col">Status</th>
                <th scope="col" >Notes</th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom:1px solid;">
                <td id="modal_view_customer"></td>
                <td id="modal_view_division"></td>
                <td id="modal_view_service"></td>
                <td id="modal_view_type"></td>
                <td id="modal_view_product_1"></td>
                <td id="modal_view_model_1"></td>
                <td id="modal_view_product_2"></td>
                <td id="modal_view_model_2"></td>
                <td id="modal_view_date"></td>
                <td id="modal_view_time"></td>
                <td id="modal_view_completion_date"></td>
                <td id="modal_view_assigned_sales_rep"></td>
                <td id="modal_view_status"></td>
                <td id="modal_view_notes"></td>
              </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn table-btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Task ADD Button Modal-->

<div class="modal fade" id="addTaskModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-sales">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Task</h4>
      </div>
      <div class="modal-body" style="display: inline;">
        <form method="post" id="newModalForm" action="{{url('add-task')}}" class="needs-validation">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-3">Customer</label>
            <div class="col-md-9">
                <select class="form-control" id="customer_add_task" name="customer" required>                
                  @foreach($customer as $cus)
                    <option>{{$cus->customer}}</option>
                  @endforeach              
                </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Division</label>
            <div class="col-md-9">
                <select class="form-control" id="division_add_task" name="division" required>                
                  @foreach($division as $div)
                    <option>{{$div->division}}</option>
                  @endforeach              
                </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Service</label>
            <div class="col-md-9">
                <select class="form-control" id="service_add_task" name="service" required>                
                  @foreach($service as $ser)
                    <option>{{$ser->service}}</option>
                  @endforeach              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Type</label>
            <div class="col-md-9">
              <select class="form-control" id="type_add_task" name="type" required>                
                  @foreach($type as $typ)
                    <option>{{$typ->type}}</option>
                  @endforeach              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Product1</label>
            <div class="col-md-9">
              <select class="form-control" id="product_1_add_task" name="product_1" required>                
                  @foreach($product_1 as $pro1)
                    <option>{{$pro1->product_1}}</option>
                  @endforeach              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Model1</label>
            <div class="col-md-9">
              <select class="form-control" id="model_1_add_task" name="model_1" required>                
                  @foreach($model_1 as $mod1)
                    <option>{{$mod1->model_1}}</option>
                  @endforeach              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Product2</label>
            <div class="col-md-9">
              <select class="form-control" id="product_2_add_task" name="product_2" required>                
                  @foreach($product_2 as $pro2)
                    <option>{{$pro2->product_2}}</option>
                  @endforeach              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Model2</label>
            <div class="col-md-9">
              <select class="form-control" id="model_2_add_task" name="model_2" required>                
                  @foreach($model_2 as $mod2)
                    <option>{{$mod2->model_2}}</option>
                  @endforeach              
              </select>   
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Date</label>
            <div class="col-md-9">
              <input type="date" class="form-control" id="date_add_task" name="date" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Time</label>
            <div class="col-md-9">
              <input type="time" class="form-control" id="time_add_task" name="time" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Completion Date</label>
            <div class="col-md-9">
              <input type="datetime-local" class="form-control" id="completion_date_add_task" name="completion_date" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Assigned Sales Rep</label>
            <div class="col-md-9">
              <select class="form-control" id="assigned_sales_rep_add_task" name="assigned_sales_rep" required>
                @foreach($name as $rep)
                <option>{{$rep->name}}</option>
                @endforeach
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Status</label>
            <div class="col-md-9">
              <select name="status" id="task-status" class="form-control">
                <option value="Inprogress">Inprogress</option>
                <option value="Complete">Complete</option>
                <option value="Canceled">Canceled</option>
                <option value="Incomplete">Incomplete</option>
                <option value="Unassigned">Unassigned</option>
              </select><p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Notes</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="notes_add_task" name="notes" required />
              <p></p>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn table-btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn table-btn" id="btnAddTask">Add Task</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Delete Task Modal -->
<div class="modal fade" id="deleteTaskModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-sales">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Task</h4>
      </div>
      <div class="modal-body" style="display: inline;">
        <form method="post" id="deleteTask" action="{{url('delete-task')}}" class="needs-validation">
          @csrf
          <div class="form-group text-center">
            <h1>Do you want to remove this task?</h1>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" value='' id="current_delete_id">
            <button type="button" class="btn table-btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn table-btn" id="btnRemove">Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  $(function() {
    $('#datatable').DataTable({
      responsive: true
    });
  });
 
</script>
<script>
  function viewModal(id) {

    $("#viewModal").modal("show")

    $.get("/dashboard/tasks/" + id, function(res) {
      console.log(id);
      
      $("#modal_view_customer").html(res.customer)
      $("#modal_view_division").html(res.division)
      $("#modal_view_service").html(res.service)
      $("#modal_view_type").html(res.type)
      $("#modal_view_product_1").html(res.product_1)
      $("#modal_view_model_1").html(res.model_1)
      $("#modal_view_product_2").html(res.product_2)
      $("#modal_view_model_2").html(res.model_2)
      $("#modal_view_date").html(res.date)
      $("#modal_view_time").html(res.time)
      $("#modal_view_completion_date").html(res.completion_date)
      $("#modal_view_assigned_sales_rep").html(res.assigned_sales_rep)
      $("#modal_view_status").html(res.status)
      $("#modal_view_notes").html(res.notes)

      $("#viewModal").modal("show");
    });
  }

  function editModal(id) {
    console.log(id);
    $("#editModal").modal("show")
    $.get("/dashboard/tasks/" + id, function(res) {
      $("#current_edit_id").val(id)
      $("#modal_task_customer").val(res.customer)
      $("#modal_task_division").val(res.division)
      $("#modal_task_service").val(res.service)
      $("#modal_task_type").val(res.type)
      $("#modal_task_product_1").val(res.product_1)
      $("#modal_task_model_1").val(res.model_1)
      $("#modal_task_product_2").val(res.product_2)
      $("#modal_task_model_2").val(res.model_2)
      $("#modal_task_date").val(res.date)
      $("#modal_task_time").val(res.time)
      $("#modal_task_completion_date").val(res.completion_date)
      $("#modal_task_assigned_sales_rep").val(res.assigned_sales_rep)
      $("#modal_task_status").val(res.status)
      $("#modal_task_notes").val(res.notes)
      $("#eventModal").modal("show");
    })
  }
</script>

<script>
  function deleteTaskModal(id) {
    console.log(id);
    $("#current_delete_id").val(id)
    $("#deleteTaskModal").modal("show");

  }
</script>
@endsection