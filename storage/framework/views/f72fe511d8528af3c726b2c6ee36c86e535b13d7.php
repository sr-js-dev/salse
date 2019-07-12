<?php $__env->startSection('content'); ?>

<div class="clearfix">&nbsp;</div>
<section class="form-sections">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 p-t">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="task-status text-center">
              <h4 class="text-black">TOTAL TASK</h4>
              <span class="text-black empty-space"><?php echo e($total_events); ?></span>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="task-status text-center">
              <h4>ONGOING TASK</h4>
              <span class="empty-space"><?php echo e($inprogress_events); ?></span>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="task-status text-center">
              <h4 class="text-red">CANCELED TASK</h4>
              <span class="text-red empty-space"><?php echo e($canceled_events); ?></span>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="task-status text-center">
              <h4 class="text-green">COMPLETED TASK</h4>
              <span class="text-green empty-space"><?php echo e($complete_events); ?></span>
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
          <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="col"><?php echo e($event->customer); ?></td>
            <td class="col"><?php echo e($event->division); ?></td>
            <td class="col"><?php echo e($event->service); ?></td>
            <td class="col"><?php echo e($event->type); ?></td>
            <td class="col"><?php echo e($event->product_1); ?></td>
            <td class="col"><?php echo e($event->model_1); ?></td>
            <td class="col"><?php echo e($event->product_2); ?></td>
            <td class="col"><?php echo e($event->model_2); ?></td>
            <td class="col"><?php echo e($event->date); ?></td>
            <td class="col"><?php echo e($event->time); ?></td>
            <td class="col"><?php echo e($event->completion_date); ?></td>
            <td class="col"><?php echo e($event->assigned_sales_rep); ?></td>
            <?php if($event->status =='Complete'): ?>
            <td style="font-size:16px;" class="col complete-blinking"><b><?php echo e($event->status); ?></td>
            <?php elseif($event->status =='Incomplete'): ?>
            <td style="font-size:16px;" class="col incomplete-blinking"><b><?php echo e($event->status); ?></td>
            <?php elseif($event->status =='Canceled'): ?>
            <td style="font-size:16px;" class="col canceled-blinking"><b><?php echo e($event->status); ?></td>
            <?php elseif($event->status =='Inprogress'): ?>
            <td style="font-size:16px;" class="col inprogress-blinking"><b><?php echo e($event->status); ?></td>
            <?php elseif($event->status =='Unassigned'): ?>
            <td style="font-size:16px;" class="col text-black"><b><?php echo e($event->status); ?></td>
            <?php endif; ?>
            <td class="col view_notes"><?php echo e($event->notes); ?></td>

            <td style="display:flex;">
              <i class="fa fa-eye fa-sm" style="color: #5cb85c;cursor: pointer;" onclick="viewModal(<?php echo e($event->id); ?>)"></i>
              <i class="fa fa-edit fa-xs" style="color: #337ab7;cursor: pointer;" onclick="editModal(<?php echo e($event->id); ?>)"></i>
              <i class="fa fa-trash fa-xs" style="color:#d9534f;cursor: pointer;" onclick="deleteTaskModal(<?php echo e($event->id); ?>)"></i>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      <form method="post" id="updateModalForm" action="<?php echo e(url('update-task')); ?>" class="needs-validation">
          <?php echo csrf_field(); ?>
          <div class="row">
            <div class="col-md-4">
              <label>Customer</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="modal_task_customer" name="customer" required>                
                <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option><?php echo e($cus->customer); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
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
                    <?php $__currentLoopData = $division; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $div): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option><?php echo e($div->division); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
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
                    <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option><?php echo e($ser->service); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
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
                  <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($typ->type); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
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
                  <?php $__currentLoopData = $product_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($pro1->product_1); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
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
                  <?php $__currentLoopData = $model_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($mod1->model_1); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
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
                  <?php $__currentLoopData = $product_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($pro2->product_2); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
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
                  <?php $__currentLoopData = $model_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($mod2->model_2); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
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
                <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option><?php echo e($rep->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <form method="post" id="newModalForm" action="<?php echo e(url('add-task')); ?>" class="needs-validation">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label class="control-label col-md-3">Customer</label>
            <div class="col-md-9">
                <select class="form-control" id="customer_add_task" name="customer" required>                
                  <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($cus->customer); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Division</label>
            <div class="col-md-9">
                <select class="form-control" id="division_add_task" name="division" required>                
                  <?php $__currentLoopData = $division; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $div): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($div->division); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Service</label>
            <div class="col-md-9">
                <select class="form-control" id="service_add_task" name="service" required>                
                  <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($ser->service); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Type</label>
            <div class="col-md-9">
              <select class="form-control" id="type_add_task" name="type" required>                
                  <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($typ->type); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Product1</label>
            <div class="col-md-9">
              <select class="form-control" id="product_1_add_task" name="product_1" required>                
                  <?php $__currentLoopData = $product_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($pro1->product_1); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Model1</label>
            <div class="col-md-9">
              <select class="form-control" id="model_1_add_task" name="model_1" required>                
                  <?php $__currentLoopData = $model_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($mod1->model_1); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Product2</label>
            <div class="col-md-9">
              <select class="form-control" id="product_2_add_task" name="product_2" required>                
                  <?php $__currentLoopData = $product_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($pro2->product_2); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Model2</label>
            <div class="col-md-9">
              <select class="form-control" id="model_2_add_task" name="model_2" required>                
                  <?php $__currentLoopData = $model_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($mod2->model_2); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
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
                <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option><?php echo e($rep->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <form method="post" id="deleteTask" action="<?php echo e(url('delete-task')); ?>" class="needs-validation">
          <?php echo csrf_field(); ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Code\Laravel\salesc2(0511-complete)\resources\views/dashboard/tasks.blade.php ENDPATH**/ ?>