<!DOCTYPE html>
<html>

<head>
    <title>Danh sách xe - Lab7 - Nguyễn Tuấn Anh - 1733403</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/449b38c131.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container-fluid">
        <div class="text-center">
            <h1 class="my-4">Danh sách xe</h1>
        </div>
        <div>
            <div class="my-2">
                <a href="new-car.php"><i class="fa fa-plus" aria-hidden="true" title="Thêm mới"></i></a>
                <strong>Thêm xe mới</strong>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Năm</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    include "conn.php";

                    $sql = "SELECT id, name, year FROM cars";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $i = 1;
                        while($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <th sope="row"><?php echo $i ?></th>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo  $row["name"]; ?></td>
                        <td><?php echo $row["year"]; ?></td>
                        <td>
                            <a class="mr-3" href="update-car.php?id=<?php echo $row["id"]; ?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <a href="delete.php?id=<?php echo $row["id"]; ?>" title="Xóa" onClick="return confirm('Bạn chắc chắn muốn xóa dòng này?');" class="text-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                        <?php
                        $i++;
                        }
                        ?>
                        <?php
                    } else {
                        echo "<tr>";
                        echo "<th></th>";
                        echo "<td colspan='100%' class='text-center'>0 kết quả!</td></tr>";
                    }
                    ?>
                <?php
                    $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>

</html>