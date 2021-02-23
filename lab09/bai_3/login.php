<?php
include 'conn.php';
session_start();
$message = $username = $password = "";
if (count($_POST) > 0) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE username='" . $username . "' and password = '" . $password . "'";
    $result = $conn->query($sql);
    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
    } else {
        $message = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
if (isset($_SESSION["id"])) {
    header("Location:index.php");
}
?>
<html>

<head>
    <title>Trang Login - Lab 9 - Bài 3 - Nguyễn Tuấn Anh - 1733403</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/449b38c131.js" crossorigin="anonymous"></script>
    <style>
        .btn-light {
            color: #212529;
            background-color: #e2e6ea;
            border-color: #dae0e5;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <form name="frmUser" method="post" action="">
            <h1  class="text-center mb-4">Login</h1>
            <div class="form-group row justify-content-center">
                <label for="password" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-6 text-danger"><?php echo $message; ?></div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="username" class="col-sm-2 col-form-label">Username <span class="text-danger">*</span></label>
                <div class="col-sm-6">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Tên đăng nhập" value="<?php echo $username; ?>">
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="password" class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                <div class="col-sm-6">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="password" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-6">
                    <input class="btn btn-primary mr-2" type="submit" name="submit" value="Đăng nhập">
                    <input class="btn btn-light" type="reset" value="Đặt lại">
                    </div>
            </div>
        </form>
    </div>
</body>
<?php
$conn->close();
?>

</html>