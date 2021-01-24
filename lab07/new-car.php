<?php
require_once "conn.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $year = $_POST['year'];
    $sql = "INSERT INTO cars (name, year) VALUES ('$name','$year')";
    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tạo thông tin xe mới - Lab7 - Nguyễn Tuấn Anh - 1733403</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/449b38c131.js" crossorigin="anonymous"></script>
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
                    <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                </div>
                <div class="form-group">
                    <label>Năm sản xuất <span class="text-danger">*</span></label>
                    <input type="number" name="year" class="form-control" value="" required="">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>