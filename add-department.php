<?php 
    require 'header.inc.php';

    $edit = false;
    if (isset($_GET['edit_id'])) {
        $edit = true;
        $edit_id = $_GET['edit_id'];
        $edit_query = mysqli_query($con, "SELECT * FROM department WHERE id = '$edit_id'");
        $edit_data = mysqli_fetch_assoc($edit_query);
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $status = $_POST['status'];

        if ($edit) {
            $query = mysqli_query($con, "UPDATE department SET name = '$name', description = '$description', status = '$status' WHERE id = '$edit_id'");
        } else {
            $query = mysqli_query($con, "INSERT INTO department(name, description, status) VALUES ('$name', '$description', '$status')");
        }

        if($query){
            redirect('departments.php');
        }
    }
?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title"><?php echo $edit ? "Edit" : "Add"; ?> Department</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form active="" method="post">
                    <div class="form-group">
                        <label>Department Name</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $edit ? $edit_data['name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea cols="30" rows="4" class="form-control" name="description"><?php echo $edit ? $edit_data['description'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="display-block">Department Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="product_active"
                                value="1" <?php echo $edit && $edit_data['status'] == 1 ? "checked" : ""; ?>>
                            <label class="form-check-label" for="product_active">
                                Active
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="product_inactive"
                                value="0" <?php echo $edit && $edit_data['status'] == 0 ? "checked" : ""; ?>>
                            <label class="form-check-label" for="product_inactive">
                                Inactive
                            </label>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn" type="submit" name="submit"><?php echo $edit ? "Update" : "Create"; ?> Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.inc.php' ?>
