<?php $__env->startSection('content'); ?>


<div class="clearfix">&nbsp;</div>
<section class="form-sections">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3" style="float:right;">
                <button type="button" class="btn btn-lg table-btn add-task" data-toggle="modal" data-target="#addAccountModal">ADD ACCOUNT</button>
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
                        <th class="col">Customer</th>
                        <th class="col">Division</th>
                        <th class="col">Address</th>
                        <th class="col">City</th>
                        <th class="col">State</th>
                        <th class="col">POC Name</th>
                        <th class="col">Phone</th>
                        <th class="col">Email</th>
                        <th class="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="col"><?php echo e($accounts->customer); ?></td>
                        <td class="col"><?php echo e($accounts->division); ?></td>
                        <td class="col"><?php echo e($accounts->address); ?></td>
                        <td class="col"><?php echo e($accounts->city); ?></td>
                        <td class="col"><?php echo e($accounts->state); ?></td>
                        <td class="col"><?php echo e($accounts->pocname); ?></td>
                        <td class="col"><?php echo e($accounts->phone); ?></td>
                        <td class="col"><?php echo e($accounts->email); ?></td>
                        <td class="col">
                          <i class="fa fa-edit fa-xs" style="color: #337ab7;cursor: pointer;" onclick="editAccountModal(<?php echo e($accounts->id); ?>)" class="btn btn-success"></i>
                          <i class="fa fa-trash fa-xs" style="color:#d9534f;cursor: pointer;" onclick="deleteAccountModal(<?php echo e($accounts->id); ?>)" class="btn btn-danger"></i>                      
                        </td>
                        <!-- <td class="col"><a href="/dashboard/accounts/remove/<?php echo e($accounts->id); ?>" class="btn btn-danger" data-method="DELETE" data-confirm="Are you sure?"><i class="fa fa-trash"></a></td> -->
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>
</section>
<!-- Add Account Modal -->

<div class="modal fade" id="addAccountModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-sales">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Account</h4>
      </div>
      <div class="modal-body" style="display: inline;">
        <form method="post" id="add_account" action="<?php echo e(url('add-account')); ?>" class="needs-validation">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label class="control-label col-md-3">Customer</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="customer_add_account" name="customer" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Division</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="division_add_account" name="division" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Address</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="address_add_account" name="address" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">City</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="city_add_account" name="city" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">State</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="state_add_account" name="state" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">POC Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="pocname_add_account" name="pocname" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Phone</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="phone_add_account" name="phone" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="email_add_account" name="email" required />
              <p></p>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn table-btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn table-btn" id="btnAddAccount">Add Account</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!--  Edit Accounts modal  -->

<div class="modal fade" id="editAccountModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-sales">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Account</h4>
      </div>
      <div class="modal-body" style="display: inline;">
        <form method="post" id="edit_account" action="<?php echo e(url('update-account')); ?>" class="needs-validation">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label class="control-label col-md-3">Customer</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="customer_edit_account" name="customer" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Division</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="division_edit_account" name="division" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Address</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="address_edit_account" name="address" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">City</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="city_edit_account" name="city" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">State</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="state_edit_account" name="state" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Poc Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="pocname_edit_account" name="pocname" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Phone</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="phone_edit_account" name="phone" required />
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="email_edit_account" name="email" required />
              <p></p>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value='' id="current_id">
        <button type="button" class="btn table-btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn table-btn" id="btnUpdate">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-sales">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Account</h4>
      </div>
      <div class="modal-body" style="display: inline;">
        <form method="post" id="deleteAccount" action="<?php echo e(url('delete-account')); ?>" class="needs-validation">
          <?php echo csrf_field(); ?>
          <div class="form-group text-center">
            <h1>Do you want to remove this account?</h1>
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

function editAccountModal(id) {

$.get("/dashboard/accounts/" + id, function(res) {
  $("#current_id").val(id)
  $("#customer_edit_account").val(res.customer)
  $("#division_edit_account").val(res.division)
  $("#address_edit_account").val(res.address)
  $("#city_edit_account").val(res.city)
  $("#state_edit_account").val(res.state)
  $("#pocname_edit_account").val(res.pocname)
  $("#phone_edit_account").val(res.phone)
  $("#email_edit_account").val(res.email)
  $("#editAccountModal").modal("show");
});
}
</script>
<script>
function deleteAccountModal(id){
  console.log(id);
  $("#current_delete_id").val(id)
  $("#deleteAccountModal").modal("show");

}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Code\salesc2\resources\views/dashboard/accounts.blade.php ENDPATH**/ ?>