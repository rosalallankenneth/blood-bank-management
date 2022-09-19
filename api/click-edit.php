<?php
    require_once 'dbh.inc.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);

    $sql = "SELECT * FROM blood WHERE id='$id'";
    $result = mysqli_query($con, $sql) or die("Database error: ".mysqli_error($con));
    $count = mysqli_num_rows($result);

	if ($count > 0) {
	
		$response["data"] = array();
        	
		while($row = mysqli_fetch_assoc($result)) {
            $member = array();
            
			$re["lname"] = $row["lname"];
			$re["fname"] = $row["fname"];
			$re["bg"] = $row["bg"];
			$re["age"] = $row["age"];
			$re["address"] = $row["address"];
			$re["mobile"] = $row["mobile"];
			
			array_push($response["data"], $re);
		}
		
        echo json_encode($response);
        
    } else {
        echo "Unable to retrieve info. Please refresh.";
    }
