


<!DOCTYPE html>
<html>

<head>
    <title>Cập nhật xe - Lab7 - Nguyễn Tuấn Anh - 1733403</title>
    <?php include 'header.php';?>
    <?php
    $id = $name = $year = $err_name = $err_year = "";
    $validInput = true;
    require_once "conn.php";
    if (count($_POST) > 0) {
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
            mysqli_query($conn, "UPDATE cars set  name='" . $name . "', year='" . $year . "' WHERE id='" . $id . "'");
            header("location: index.php");
            exit();
        }
        
    } else {
        $result = mysqli_query($conn, "SELECT * FROM cars WHERE id='" . $_GET['id'] . "'");
        $row = mysqli_fetch_array($result);
        $validInput = True;
        $err_name = $err_year = "";
    
        
        $id = $row['id'];
        $name = $row['name'];
        $year = $row['year'];
    }
    
?>
</head>

<body>
    <div class="container-fluid my-2">
        <div class="col-6 m-auto">
            <div class="text-center">
                <h1>Cập nhật xe</h1>
            </div>
            <form action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" method="post">
                <div class="form-group">
                    <label>Tên <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Hãng sản xuất" value="<?php echo $name; ?>" maxlength="50" required>
                    <small class="form-text text-danger"><?php echo "$err_name"; ?></small>
                </div>
                <div class="form-group ">
                    <label>Năm sản xuất <span class="text-danger">*</span></label>
                    <input type="number" name="year" class="form-control" placeholder="Năm sản xuất" value="<?php echo $year; ?>" required>
                    <small class="form-text text-danger"><?php echo "$err_year"; ?></small>
                </div>
                <div class="form-group">
                    <!-- <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" /> -->
                    <input type="submit" class="btn btn-primary" value="Lưu">
                    <a href="index.php" class="btn btn-default">Hủy bỏ</a>
                </div>

            </form>
        </div>
    </div>
    </div>
</body>

</html>