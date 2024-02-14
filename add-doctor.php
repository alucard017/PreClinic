<?php 
    require 'header.inc.php';

    $edit = false;
    if (isset($_GET['edit_id'])) {
        $edit = true;
        $edit_id = $_GET['edit_id'];
        $edit_query = mysqli_query($con, "SELECT * FROM doctors WHERE id = '$edit_id'");
        $edit_data = mysqli_fetch_assoc($edit_query);
    }

    if(mysqli_num_rows(mysqli_query($con,"select * from department"))>0){
        if(isset($_POST['addDoctor'])){
            $fName=$_POST['fName'];
            $lName=$_POST['lName'];
            $email=$_POST['email'];
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];

            if (!empty($_FILES['avatar']['name'])) {
                $avatar=$_FILES['avatar'];
                $avatar_name=$avatar['name'];
                $avatar_error=$avatar['error'];
                $avatar_tmp=$avatar['tmp_name'];
                
                $avatar_name=rand('111111','999999').$avatar_name;
            
                $avatar_ext=explode('.',$avatar_name);
                $avatar_check=strtolower(end($avatar_ext));
                $fileextentionstored=array('jpg','png','jpeg','svg');
            
            
                if(in_array($avatar_check,$fileextentionstored)){
                    $destinationfile='uploads/'.$avatar_name;
                    $application_success=move_uploaded_file($avatar_tmp,$destinationfile);
                }
            } else {
                $avatar_name = $edit_data['avatar'];
            }

            $department=$_POST['department'];
            $bio=$_POST['bio'];
            if ($edit) {
                $query = mysqli_query($con, "UPDATE doctors SET dfName = '$fName', dlName = '$lName', email = '$email', dob = '$dob', gender = '$gender', address = '$address', phone = '$phone', avatar = '$avatar_name', department = '$department', bio = '$bio', status = '0' WHERE id = '$edit_id'");
            } else {
                $query = mysqli_query($con, "INSERT INTO doctors(dfName, dlName, email, dob, gender, address, phone, avatar, department, bio, status) VALUES ('$fName', '$lName', '$email', '$dob', '$gender', '$address', '$phone', '$avatar_name', '$department', '$bio', '0')");
            }
            if($query){
                redirect('doctors.php');
            }
        }
    }else{
        alert('Add A Department To Continue');
        redirect('doctors.php');
    }
?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title"><?php echo $edit ? "Edit" : "Add"; ?> Doctor</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name <span class="
                                text-danger"></span></label>
                                <input class="form-control" type="text" name="fName"
                                    value="<?php echo $edit ? $edit_data['dfName'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="lName"
                                    value="<?php echo $edit ? $edit_data['dlName'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger"></span></label>
                                <input class="form-control" name="email" type="email"
                                    value="<?php echo $edit ? $edit_data['email'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <div class="cal-icon">
                                    <input type="text" name="dob" class="form-control datetimepicker"
                                        value="<?php echo $edit ? $edit_data['dob'] : ''; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label">Gender:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="Male"
                                            <?php echo ($edit && $edit_data['gender'] == 'Male') ? 'checked' : ''; ?>>Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="Female"
                                            <?php echo ($edit && $edit_data['gender'] == 'Female') ? 'checked' : ''; ?>>Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department</label>
                                <select class="select" name="department">
                                    <option>Select</option>
                                    <?php 
                                     $query=mysqli_query($con,"select * from department");
                                     while($list=mysqli_fetch_assoc($query)){
                                 ?>
                                    <option value="<?php echo $list['id'] ?>"
                                        <?php echo ($edit && $edit_data['department'] == $list['id']) ? 'selected' : ''; ?>>
                                        <?php echo $list['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="<?php echo $edit ? $edit_data['address'] : ''; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone </label>
                                <input class="form-control" name="phone" type="text"
                                    value="<?php echo $edit ? $edit_data['phone'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Avatar</label>
                                <div class="profile-upload">
                                    <div class="upload-img">
                                        <img alt=""
                                            src="<?php echo $edit ? $edit_data['avatar'] : 'assets/img/user.jpg'; ?>">
                                    </div>
                                    <div class="upload-input">
                                        <input type="file" name="avatar" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Short Biography</label>
                        <textarea class="form-control" name="bio" rows="3"
                            cols="30"><?php echo $edit ? AVATAR_IMAGE_SERVER_PATH.$edit_data['bio'] : ''; ?></textarea>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn"
                            name="<?php echo $edit ? 'editDoctor' : 'addDoctor'; ?>"><?php echo $edit ? 'Update' : 'Create'; ?>
                            Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php require 'footer.inc.php' ?>