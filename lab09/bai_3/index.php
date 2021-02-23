<?php
session_start();
?>
<html>

<head>
    <title>Trang Chủ - Lab 9 - Bài 3 - Nguyễn Tuấn Anh - 1733403</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/449b38c131.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    if (isset($_SESSION["username"])) {
    ?>
        <div class="container mt-5">
            <div class="text-center mb-4">
                <h1>Trang chủ</h1>
                <p>Xin chào: <?php echo $_SESSION["username"]; ?></p>
            </div>
            <div class="text-center mb-4"><input class="btn btn-primary mr-2" type="submit" name="submit" value="Đăng xuất"></div>
        </div>
    <?php
    } else {
        header('location:login.php');
    }
    ?>
</body>

</html>