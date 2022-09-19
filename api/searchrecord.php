<?php
    require_once 'dbh.inc.php';

    $item = trim(mysqli_real_escape_string($con, $_POST['item']));

    $sql = "SELECT * FROM blood WHERE lname LIKE '%$item%' OR fname LIKE '%$item%' OR age LIKE '%$item%' OR bg LIKE '%$item%' OR address LIKE '%$item%' OR mobile LIKE '%$item%' OR date LIKE '%$item%'";

    $result = mysqli_query($con, $sql) or die("Unable to display data. Error: ".mysqli_error($con));
    
    if(mysqli_num_rows($result) > 0) {
        echo "<tr style='background: #fff !important; color: #000;'><th>ID</th><th>Donor's name</th><th>Blood group</th><th>Age</th><th>Address</th><th>Mobile number</th><th>Date</th><th>Action</th></tr>";

		while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['id']."</td><td>".$row['fname']." ".$row['lname']."</td><td>".$row['bg']."</td><td>".$row['age']."</td><td>".$row['address']."</td><td>".$row['mobile']."</td><td>".$row['date']."</td><td><button id='edit-".$row['id']."' class='btn-edit table-btn btn btn-primary btn-sm'>Edit</button><button id='delete-".$row['id']."' class='btn-delete table-btn btn btn-danger btn-sm'>Delete</button>"."</td></tr>";
        }
        
    } else {
        echo "<div style='text-align: center;'>There are <b>no results</b> for your query.</div>";
    }
    
?>