<?php
require 'connection.php';
require 'function.inc.php';
    if(isset($_POST['type'])){
        if($_POST['type']=="getDoctor"){
            $query=mysqli_query($con,"select id,fName,lName from doctors where department='{$_POST['department']}'");
            $arr=mysqli_fetch_all($query);
        }
        if ($_POST['type']=="deleteRecord") {
            $table=$_POST['table'];
            $id = $_POST['id'];
            $query = mysqli_query($con, "DELETE FROM `$table` WHERE id = '$id'");
            if ($query) {
                $arr=["status"=>"success"];
            } else {
                $arr=["status"=>"fail"];
            }
        } else {
            echo 'error';
        }

    }
    echo json_encode($arr);
?>