<?php
    require_once 'dbh.inc.php';

    $id = trim(mysqli_real_escape_string($con, $_POST['id']));
    
    $sql = "DELETE FROM blood WHERE id='$id'";
    $result = mysqli_query($con, $sql) or die("Unable to execute query. Error: ".mysqli_error($con));

    if($result) {
        echo "A record was deleted successfully.";
    } else {
        echo "There was an error deleting the record.";
    }