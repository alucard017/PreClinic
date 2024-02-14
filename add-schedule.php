<?php 
    require 'header.inc.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM doctorSchedule WHERE id = '$id'");
        $edit_data = mysqli_fetch_assoc($query);
    }
    
    if (isset($_POST['addSchedule']) || isset($_POST['editSchedule'])) {
        $doctorId = $_POST['doctorId'];
        $availableDays = $_POST['availableDays'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $message = $_POST['message'];
        $status = $_POST['status'];

        if(isset($_POST['addSchedule'])) {
            $query = mysqli_query($con, "INSERT INTO `doctorSchedule`(`doctorId`, `availableDays`, `startTime`, `endTime`, `message`, `status`) VALUES ('$doctorId','$availableDays','$startTime','$endTime','$message','$status')");
        } elseif(isset($_POST['editSchedule'])) {
            $query = mysqli_query($con, "UPDATE `doctorSchedule` SET `doctorId`='$doctorId', `availableDays`='$availableDays', `startTime`='$startTime', `endTime`='$endTime', `message`='$message', `status`='$status' WHERE id='$id'");
        }

        if($query){
            redirect('schedule.php');
        }
    }
?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Schedule</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctor Name</label>
                                <select class="select" name="doctorId">
                                    <option>Select</option>
                                    <?php 
                                        $query=mysqli_query($con,"select * from doctors");
                                        while($list=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value="<?php echo $list['id'] ?>">
                                        <?php echo $list['dfName'].' '.$list['dlName'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Available Days</label>
                                <select class="select" multiple name="availableDays">
                                    <option>Select Days</option>
                                    <option>Sunday</option>
                                    <option>Monday</option>
                                    <option>Tuesday</option>
                                    <option>Wednesday</option>
                                    <option>Thursday</option>
                                    <option>Friday</option>
                                    <option>Saturday</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Time</label>
                                <div class="time-icon">
                                    <input type="text" class="form-control" id="datetimepicker3" name="startTime">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Time</label>
                                <div class="time-icon">
                                    <input type="text" class="form-control" id="datetimepicker4" name="endTime">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea cols="30" rows="4" class="form-control" name="message"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="display-block">Schedule Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="product_active" value="1"
                                <?php echo isset($edit_data) && $edit_data['status'] == 1 ? "checked" : ""; ?>>
                            <label class="form-check-label" for="product_active">
                                Active
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0"
                                <?php echo isset($edit_data) && $edit_data['status'] == 0 ? "checked" : ""; ?>>
                            <label class="form-check-label" for="product_inactive">
                                Inactive
                            </label>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn"
                            name="<?php echo isset($edit_data) ? 'editSchedule' : 'addSchedule'; ?>"><?php echo isset($edit_data) ? 'Update' : 'Create'; ?>
                            Schedule</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });
</script>
<?php 
    require 'footer.inc.php';
?>