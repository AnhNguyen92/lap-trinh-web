<!DOCTYPE html>
<html>

<head>
    <title>Cập nhật xe - Lab7 - Nguyễn Tuấn Anh - 1733403</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/449b38c131.js" crossorigin="anonymous"></script>

    <?php
    require_once "conn.php";
    if (count($_POST) > 0) {
        mysqli_query($conn, "UPDATE cars set  name='" . $_POST['name'] . "', year='" . $_POST['year'] . "' WHERE id='" . $_POST['id'] . "'");
        header("location: index.php");
        exit();
    }
    $result = mysqli_query($conn, "SELECT * FROM cars WHERE id='" . $_GET['id'] . "'");
    $row = mysqli_fetch_array($result);
    ?>

</head>

<body>
    <div class="container-fluid my-2">
        <div class="col-6 m-auto">
            <div class="text-center">
                <h1>Cập nhật xe</h1>
            </div>
            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>" maxlength="50" required="">
                </div>
                <div class="form-group ">
                    <label>Year</label>
                    <input type="number" name="year" class="form-control" value="<?php echo $row["year"]; ?>" required="">
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </div>

            </form>
        </div>
    </div>
    </div>
</body>

</html>