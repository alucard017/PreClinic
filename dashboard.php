<?php require 'header.inc.php' ?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo mysqli_num_rows(mysqli_query($con,"select * from doctors")) ?></h3>
                        <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo mysqli_num_rows(mysqli_query($con,"select * from patients")) ?></h3>
                        <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo mysqli_num_rows(mysqli_query($con,"select * from appointments where status='1'")) ?></h3>
                        <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3><?php echo mysqli_num_rows(mysqli_query($con,"select * from appointments where status='0'")) ?></h3>
                        <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-title">
                            <h4>Patient Total</h4>
                            <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15%
                                Higher than Last Month</span>
                        </div>
                        <canvas id="linegraph"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-title">
                            <h4>Patients In</h4>
                            <div class="float-right">
                                <ul class="chat-user-total">
                                    <li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
                                    <li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
                                </ul>
                            </div>
                        </div>
                        <canvas id="bargraph"></canvas>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.php"
                            class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="d-none">
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Timing</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                            $query=mysqli_query($con,"select appointments.*,patients.*,department.*,doctors.* from appointments,patients,department,doctors where appointments.pName=patients.id && appointments.department=department.id && appointments.doctor=doctors.id");
                            while($list=mysqli_fetch_assoc($query)){
                        ?>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <img width="28" height="28" class="rounded-circle" src="assets/img/userimage.jpg"
                                                alt="">
                                            <h2><?php echo $list['fName'].'&nbsp;'.$list['lName'] ?></h2>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Appointment With</h5>
                                            <p><?php echo $list['dfName'].'&nbsp;'.$list['dlName'] ?></p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Timing</h5>
                                            <p><?php echo $list['time'] ?></p>
                                        </td>
                                        <td class="text-right">
                                            <a href="appointments.php" class="btn btn-outline-primary take-btn">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card member-panel">
                    <div class="card-header bg-white">
                        <h4 class="card-title mb-0">Doctors</h4>
                    </div>
                    <div class="card-body">
                        <ul class="contact-list">
                        <?php 
                                    $query=mysqli_query($con,"select * from doctors");
                                    while($list=mysqli_fetch_assoc($query)){
                                ?>
                            <li>
                                <div class="contact-cont">
                                    <div class="user-img m-r-10">
                                        <a href="#" title="John Doe"><img src="<?php echo AVATAR_IMAGE_SERVER_PATH.$list['avatar'] ?>" alt=""
                                                class="w-40 rounded-circle"><span class="status online"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis"><?php echo $list['dfName'].' '.$list['dlName'] ?></span>
                                        <span class="contact-date"><?php $list['department'] ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="card-footer text-center bg-white">
                        <a href="doctors.php" class="text-muted">View all Doctors</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.php"
                            class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table mb-0 new-patient-table">
                                <tbody>
                                <?php 
                                    $query=mysqli_query($con,"select * from patients");
                                    while($list=mysqli_fetch_assoc($query)){
                                ?>
                                    <tr>
                                        <td>
                                            <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg"
                                                alt="">
                                            <h2><?php echo $list['fName'].' '.$list['lName'] ?></h2>
                                        </td>
                                        <td><?php echo $list['email'] ?></td>
                                        <td><?php echo $list['phone'] ?></td>
                                        <!-- <td><button class="btn btn-primary btn-primary-one float-right">Fever</button>
                                        </td> -->
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <div class="hospital-barchart">
                    <h4 class="card-title d-inline-block">Hospital Management</h4>
                </div>
                <div class="bar-chart">
                    <div class="legend">
                        <div class="item">
                            <h4>Level1</h4>
                        </div>

                        <div class="item">
                            <h4>Level2</h4>
                        </div>
                        <div class="item text-right">
                            <h4>Level3</h4>
                        </div>
                        <div class="item text-right">
                            <h4>Level4</h4>
                        </div>
                    </div>
                    <div class="chart clearfix">
                    <?php 
                        $query=mysqli_query($con,"select * from department");
                        while($list=mysqli_fetch_assoc($query)){
                    ?>
                        <div class="item">
                            <div class="bar">
                                <span class="percent">16%</span>
                                <div class="item-progress" data-percent="16">
                                    <span class="title"><?php $list['name'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.inc.php' ?>