<?php require 'header.inc.php' ?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Patients</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add-patient.php" class="btn btn btn-primary btn-rounded float-right"><i
                        class="fa fa-plus"></i> Add Patient</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-border table-striped custom-table datatable mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query=mysqli_query($con,"select * from patients");
                            while($list=mysqli_fetch_assoc($query)){
                        ?>
                            <tr>
                                <td><?php echo $list['fName'].' '.$list['lName'] ?></td>
                                <td><?php echo $list['age'] ?></td>
                                <td><?php echo $list['address'] ?></td>
                                <td><?php echo $list['phone'] ?></td>
                                <td><?php echo $list['email'] ?></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="add-patient.php?edit_id=<?php echo $list['id'] ?>"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#delete_patient" data-id="<?php echo $list['id']; ?>"><i
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
<div id="delete_patient" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Patient?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger" id="confirm-delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        let patientId;
        $('[data-target="#delete_patient"]').on('click', function () {
            patientId = $(this).data('id');
        });

        $('#confirm-delete').on('click', function () {
            $.ajax({
                url: 'data_transfer.php',
                type: 'POST',
                data: `type=deleteRecord&table=patients&id=${patientId}`,
                success: function (response) {
                    res = JSON.parse(response)
                    if (res['status'] === 'success') {
                        location.reload();
                    } else {
                        console.error('An error occurred while deleting the Patient.');
                    }
                },
                error: function () {
                    console.error('An error occurred while deleting the Patient.');
                }
            });
        });
    });
</script>
<?php require 'footer.inc.php' ?>