<?php
require_once "conn.php";

$name = $year = $err_name = $err_year = "";
$validInput = True;
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $year = $_POST['year'];
    if ( empty(trim($name)) ||  strlen($name) < 5 || strlen($name) > 40 ) {
        $err_name = "Tên hãng không được để trống, độ dài từ 5 đến 40 ký tự";
        $validInput = false;
    }
    if ( empty(trim($year)) || $year < 1990 || $year > 2015 ) {
        $err_year = "Năm sản xuất phải nằm trong khoảng 1990 đến 2015";
        $validInput = false;
    }
    if ($validInput) {
        $sql = "INSERT INTO cars (name, year) VALUES ('$name','$year')";
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }       

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tạo thông tin xe mới - Lab7 - Nguyễn Tuấn Anh - 1733403</title>
    <?php include 'header.php';?>
</head>

<body>
    
    <div class="container-fluid my-2">
        <div class="col-6 m-auto">
            <div class="text-center">
                <h1>Tạo xe mới</h1>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Tên <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Hãng sản xuất" class="form-control" value="<?php echo "$name"; ?>" required>
                    <small class="form-text text-danger"><?php echo "$err_name"; ?></small>
                </div>
                <div class="form-group">
                    <label>Năm sản xuất <span class="text-danger">*</span></label>
                    <input type="number" name="year" placeholder="Năm sản xuất" class="form-control" value="<?php echo "$year"; ?>" required>
                    <small class="form-text text-danger"><?php echo "$err_year"; ?></small>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Lưu">
                    <a href="index.php" class="btn btn-default">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>