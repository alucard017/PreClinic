<?php 
    require 'header.inc.php';
?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Appointments</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add-appointment.php" class="btn btn btn-primary btn-rounded float-right"><i
                        class="fa fa-plus"></i> Add Appointment</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Patient Name</th>
                                <th>Age</th>
                                <th>Doctor Name</th>
                                <th>Department</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query=mysqli_query($con,"select appointments.*,patients.fName,patients.lName,patients.age,doctors.dfName,doctors.dlName,department.name 
                            from appointments,patients,doctors,department 
                            where appointments.department=department.id && appointments.doctor=doctors.id && appointments.pName=patients.id");
                            while($list=mysqli_fetch_assoc($query)){
                        ?>
                            <tr>
                                <td><?php echo $list['aid'] ?></td>
                                <td><?php echo $list['fName'].' '.$list['lName'] ?></td>
                                <td><?php echo $list['age'] ?></td>
                                <td><?php echo $list['dfName'].' '.$list['dlName'] ?></td>
                                <td><?php echo $list['name'] ?></td>
                                <td><?php echo $list['date'] ?></td>
                                <td><?php echo $list['time'] ?></td>
                                <td><span class="custom-badge status-<?php echo $list['status']==0?"red":"green" ?>"><?php echo $list['status']==0?"Inactive":"Active" ?></span></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i>
                                                Delete</a>
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
    
    <div id="delete_appointment" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Appointment?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    require 'footer.inc.php';
    ?>