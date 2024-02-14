<?php 
    require 'header.inc.php';
    $result = mysqli_query($con, "SELECT aid FROM appointments ORDER BY id DESC LIMIT 1");
    $lastAid = mysqli_fetch_assoc($result)['aid'];

    // Extract the numeric part, increment it and append it to 'APT-'
    $numericPart = intval(substr($lastAid, 4)) + 1;
    $aid = 'APT-' . str_pad($numericPart, 4, '0', STR_PAD_LEFT);
    if(isset($_POST['submit'])){
        $pName=$_POST['pName'];
        $department=$_POST['department'];
        $doctor=$_POST['doctor'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $pEmail=$_POST['pEmail'];
        $pPhone=$_POST['pPhone'];
        $msg=$_POST['msg'];
        $status=$_POST['status'];
        $query=mysqli_query($con,"INSERT INTO appointments(aid, pName, department, doctor, date, time, pEmail, pPhone, msg, status) 
        VALUES ('$aid', '$pName', '$department', '$doctor', '$date', '$time', '$pEmail', '$pPhone', '$msg', '$status')");
        if($query){
            redirect('appointments.php');
        }
    }
?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Appointment</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Appointment ID</label>
                                <input class="form-control" type="text" name="aid" value="<?php echo $aid ?>" readonly="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Patient Name</label>
                                <select class="form-control" name="pName" id="patient">
                                    <option>Select</option>
                                    <?php 
                                        $query=mysqli_query($con,"select * from patients");
                                        while($list=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value="<?php echo $list['id'] ?>"><?php echo $list['fName'].' '.$list['lName'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control" name="department" id="department">
                                    <option>Select</option>
                                    <?php 
                                        $query=mysqli_query($con,"select * from department");
                                        while($list=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value=<?php echo $list['id'] ?>><?php echo $list['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctor</label>
                                <select class="form-control" name="doctor" id="doctor">
                                    <option>Select</option>
                                    <?php 
                                        $query=mysqli_query($con,"select * from doctors");
                                        while($list=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value=<?php echo $list['id'] ?>><?php echo $list['dfName'].$list['dlName'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time</label>
                                <div class="time-icon">
                                    <input type="text" class="form-control" id="datetimepicker3" name="time">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Patient Email</label>
                                <input class="form-control" type="email" name="pEmail">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Patient Phone Number</label>
                                <input class="form-control" type="text" name="pPhone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea cols="30" rows="4" class="form-control" name="msg"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="display-block">Appointment Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="product_active"
                                value="1" checked>
                            <label class="form-check-label" for="product_active">
                                Active
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="product_inactive"
                                value="0">
                            <label class="form-check-label" for="product_inactive">
                                Inactive
                            </label>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn" name="submit">Create Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#department').change(function(){
        let department=$('#department').val();
        $.ajax({
            url:'data_transfer.php',
            method:'post',
            data:`type=getDoctor&department=${department}`,
            success:function(result){
                data=JSON.parse(result);
                html=`<option>Select</option>`;
                data.forEach(function (element, index, array){
                    html+=`<option value="${element[0]}">${element[1]} ${element[2]}</option>`;
                })
                $('#doctor').html(html);
            }
        })
    });
</script>
<?php 
    require 'footer.inc.php';
?>