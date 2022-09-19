<?php
    require_once 'dbh.inc.php';

        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $bg = mysqli_real_escape_string($con, $_POST['bg']);
        $age = mysqli_real_escape_string($con, $_POST['age']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        date_default_timezone_set("Asia/Manila");
        $date = date("F j, Y");
        
        if(empty($lname) || empty($fname) || empty($bg) || empty($address) || empty($age) || empty($mobile)) {
            echo "There are empty fields.";
            exit();
        } else if(!is_numeric($age)) {
            echo 'Age must be numeric.';
            exit();
        } else if(strlen($mobile) < 11 && is_numeric($mobile)) {
            echo 'Invalid mobile number.';
            exit();
        }

        $sql = "INSERT INTO blood (lname, fname, bg, age, address, mobile, date) VALUES ('$lname', '$fname', '$bg', '$age', '$address', '$mobile', '$date')";

        mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

        echo "A record was successfully added to blood bank.";

?>


