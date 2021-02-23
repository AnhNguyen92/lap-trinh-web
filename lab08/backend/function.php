<?php
require_once "conn.php";

if(count($_POST)> 0) {
    // add new
    if($_POST['type'] == 1) {
		$name = $_POST['name'];
        $year = $_POST['year'];
		
        $sql = "INSERT INTO `cars` (`name`, `year`) VALUES ('$name','$year')";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
	}

    // update
    else if($_POST['type'] == 2) {
		$id=$_POST['id'];
		$name = $_POST['name'];
        $year = $_POST['year'];

        mysqli_query($conn, "UPDATE cars set  name='" . $name . "', year='" . $year . "' WHERE id='" . $id . "'");
		$sql = "UPDATE `cars` SET `name` = '$name',`year` = '$year' WHERE id = $id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode" => 200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

    // delete a row
    else if($_POST['type'] == 3) {
		$id=$_POST['id'];
		$sql = "DELETE FROM cars WHERE id = $id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

    // delete multiple row
    else if($_POST['type'] == 4) {
        $id=$_POST['id'];
        $sql = "DELETE FROM cars WHERE id in ($id)";
        if (mysqli_query($conn, $sql)) {
            echo $id;
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}

?>
