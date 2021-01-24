<?php
include_once 'conn.php';
$sql = "DELETE FROM cars WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
header("location: index.php");
exit();
} else {
echo "Không thể xóa được record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>