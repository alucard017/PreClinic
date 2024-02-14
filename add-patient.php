<?php 
    require 'header.inc.php';
    $fName="";
    $lName="";
    $email="";
    $password="";
    $dob="";
    $gender="";
    $address="";
    $phone="";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM patients WHERE id = '$id'");
        $row = mysqli_fetch_assoc($query);
        $fName=$row['fName'];
        $lName=$row['lName'];
        $email=$row['email'];
        $password=$row['password'];
        $dob=$row['dob'];
        $gender=$row['gender'];
        $address=$row['address'];
        $phone=$row['phone'];
    }
    if(isset($_POST['addPatient'])){
        $fName=$_POST['fName'];
        $lName=$_POST['lName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $dobarr=explode('/',$dob);
        $age=$year-$dobarr[2];
        
        $query=mysqli_query($con,"INSERT INTO patients(fName, lName, email, password, dob, age, gender, address, phone,status) 
        VALUES ('$fName', '$lName', '$email', '$password', '$dob', '$age', '$gender', '$address', '$phone', '0')");
        if($query){
            redirect('patients.php');
        }
    }
    if(isset($_POST['edit'])){
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $dobarr = explode('/', $dob);
        $age = $year - $dobarr[2];
      
        $query = mysqli_query($con, "UPDATE patients SET 
          fName = '$fName', 
          lName = '$lName', 
          email = '$email', 
          password = '$password', 
          dob = '$dob', 
          age = '$age', 
          gender = '$gender', 
          address = '$address', 
          phone = '$phone' where id='$id'");
    }

?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title"><?php echo isset($_GET['id']) ? "Edit Patient" : "Add Patient"; ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="fName" value="<?php echo $fName; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="lName" value="<?php echo $lName; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" name="email" type="email" value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input class="form-control" name="password" type="text"
                                    value="<?php echo $password; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <div class="cal-icon">
                                    <input type="text" name="dob" class="form-control datetimepicker"
                                        value="<?php echo $dob; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label">Gender:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="Male"
                                            <?php echo ($gender == 'Male') ? 'checked' : ''; ?>>Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="Female"
                                            <?php echo ($gender == 'Female') ? 'checked' : ''; ?>>Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="<?php echo $address ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone </label>
                                <input class="form-control" name="phone" type="text" value="<?php echo $phone ?>">
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn"
                            name="<?php echo isset($_GET['id']) ? "edit" : "addPatient"; ?>">
                            <?php echo isset($_GET['id']) ? "Update Patient" : "Create Patient"; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.inc.php' ?>