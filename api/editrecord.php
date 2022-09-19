<?php
    require_once 'dbh.inc.php';

    $id = mysqli_real_escape_string($con, $_GET['id']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $bg = mysqli_real_escape_string($con, $_POST['bg']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);

    if(empty($lname) || empty($fname) || empty($bg) || empty($address) || empty($mobile)) {
        echo "Some required fields are empty.";
        exit();
    } else if(!is_numeric($age)) {
        echo 'Age must be numeric.';
        exit();
    } else if(strlen($mobile) < 11 && is_numeric($mobile)) {
        echo 'Invalid mobile number.';
        exit();
    }

    $sql = "UPDATE blood SET lname='$lname', fname='$fname', bg='$bg', address='$address', age='$age', mobile='$mobile' WHERE id='$id'";

    mysqli_query($con, $sql) or die("Unable to update customer. Error: ".mysqli_error($con));

    echo "A record was updated successfully.";
