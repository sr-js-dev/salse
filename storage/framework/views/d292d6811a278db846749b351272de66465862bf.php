<?php $__env->startSection('content'); ?>


<div class="clearfix">&nbsp;</div>
<section class="form-sections">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3" style="float:right;">
                <button type="button" class="btn btn-lg table-btn add-task" data-toggle="modal" data-target="#addServiceModal">ADD SERVICE</button>
            </div>
        </div>
    </div>
</section>
<section class="empty-space">

    <div class="container justify-content-center table-responsive">

        <div class="col-md-auto">
            <table id="datatable" class="table table-striped table-bordered" style="color:black;font-family:'sans-serif'">
                <thead>
                    <tr style="color:#2E488A;">
                        <th class="col">Classification</th>
                        <th class="col">Service</th>
                        <th class="col">Type</th>
                        <th class="col">Product 1</th>
                        <th class="col">Model 1</th>
                        <th class="col">Product 2</th>
                        <th class="col">Model 2</th>
                        <th class="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="col"><?php echo e($services->classification); ?></td>
                        <td class="col"><?php echo e($services->service); ?></td>
                        <td class="col"><?php echo e($services->type); ?></td>
                        <td class="col"><?php echo e($services->product_1); ?></td>
                        <td class="col"><?php echo e($services->model_1); ?></td>
                        <td class="col"><?php echo e($services->product_2); ?></td>
                        <td class="col"><?php echo e($services->model_2); ?></td>
                        <td class="col">
                            <i class="fa fa-edit fa-xs" style="color: #337ab7;cursor: pointer;" onclick="editServiceModal(<?php echo e($services->id); ?>)"></i>
                            <i class="fa fa-trash fa-xs" style="color:#d9534f;cursor: pointer;"  onclick="deleteServiceModal(<?php echo e($services->id); ?>)"></i>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>
</section>
<!-- Add Account Modal -->

<div class="modal fade" id="addServiceModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-sales">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Service</h4>
            </div>
            <div class="modal-body" style="display: inline;">
                <form method="post" id="add_service" action="<?php echo e(url('add-service')); ?>" class="needs-validation">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="control-label col-md-3">Classification</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="classification_add_service" name="classification" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Service</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="service_add_service" name="service" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Type</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="type_add_service" name="type" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product 1</label>
                        <div class="col-md-9" id="product_add_service" name="product">
                            <input type="text" class="form-control" id="product_1_add_service" name="product_1" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Model 1</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="model_1_add_service" name="model_1" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product 2</label>
                        <div class="col-md-9" id="product_add_service" name="product">
                            <input type="text" class="form-control" id="product_2_add_service" name="product_2"  />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Model 2</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="model_2_add_service" name="model_2"  />
                            <p></p>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn table-btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn table-btn" id="btnAddService">Add Account</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!--  Edit Accounts modal  -->

<div class="modal fade" id="editServiceModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-sales">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Service</h4>
            </div>
            <div class="modal-body" style="display: inline;">
                <form method="post" id="edit_service" action="<?php echo e(url('update-service')); ?>" class="needs-validation">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="control-label col-md-3">Classification</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="classification_edit_service" name="classification" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Service</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="service_edit_service" name="service" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Type</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="type_edit_service" name="type" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product 1</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="product_1_edit_service" name="product_1" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Model 1</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="model_1_edit_service" name="model_1" required />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product 2</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="product_2_edit_service" name="product_2"  />
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Model 2</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="model_2_edit_service" name="model_2"  />
                            <p></p>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" value='' id="current_id">
                <button type="button" class="btn table-btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn table-btn" id="btnUpdate">Update</button>
            </div>
                </form>

        </div>
    </div>
</div>

<!-- Delete Team Member -->
<div class="modal fade" id="deleteServiceModal" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-sales">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Team Member</h4>
      </div>
      <div class="modal-body" style="display: inline;">
        <form method="post" id="deleteService" action="<?php echo e(url('delete-service')); ?>" class="needs-validation">
          <?php echo csrf_field(); ?>
          <div class="form-group text-center">
            <h1>Do you want to remove this service?</h1>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" value='' id="current_delete_id">
            <button type="button" class="btn table-btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn table-btn" id="btnUpdate">Yes</button>
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
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );
    function editServiceModal(id) {

        $.get("/dashboard/services/" + id, function(res) {
            $("#current_id").val(id)
            $("#classification_edit_service").val(res.classification)
            $("#service_edit_service").val(res.service)
            $("#type_edit_service").val(res.type)
            $("#product_1_edit_service").val(res.product_1)
            $("#model_1_edit_service").val(res.model_1)
            $("#product_2_edit_service").val(res.product_2)
            $("#model_2_edit_service").val(res.model_2)
            $("#editServiceModal").modal("show");
        });
    }
</script>
<script>
  function deleteServiceModal(id){
    console.log(id);
    $("#current_delete_id").val(id);
    $("#deleteServiceModal").modal("show");
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Code\Laravel\salesc2(0511-complete)\resources\views/dashboard/services.blade.php ENDPATH**/ ?>