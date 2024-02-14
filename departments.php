<?php require 'header.inc.php' ?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-5">
                <h4 class="page-title">Departments</h4>
            </div>
            <div class="col-sm-7 col-7 text-right m-b-30">
                <a href="add-department.php" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add
                    Department</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department Name</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query=mysqli_query($con,"select * from department");
                            $i=1;
                            while($list=mysqli_fetch_assoc($query)){
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $list['name'] ?></td>
                                <td><span
                                        class="custom-badge status-<?php echo $list['status']==0?"red":"green" ?>"><?php echo $list['status']==0?"Inactive":"Active" ?></span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="add-department.php?edit_id=<?php echo $list['id'] ?>"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <!-- <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i>
                                                Delete</a> -->
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#delete_department" data-id="<?php echo $list['id']; ?>"><i
                                                    class="fa fa-trash-o m-r-5"></i>Delete</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="delete_department" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Department?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                    <button type="submit" class="btn btn-danger" id="confirm-delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let departmentId;
        $('[data-target="#delete_department"]').on('click', function () {
            departmentId = $(this).data('id');
        });

        $('#confirm-delete').on('click', function () {
            $.ajax({
                url: 'data_transfer.php',
                type: 'POST',
                data: `type=deleteRecord&table=department&id=${departmentId}`,
                success: function (response) {
                    res = JSON.parse(response)
                    if (res['status'] === 'success') {
                        location.reload();
                    } else {
                        console.error('An error occurred while deleting the department.');
                    }
                },
                error: function () {
                    console.error('An error occurred while deleting the department.');
                }
            });
        });
    });
</script>

<?php require 'footer.inc.php' ?>