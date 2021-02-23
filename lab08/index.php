<?php
include 'backend/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách xe - Lab 8 - Nguyễn Tuấn Anh - 1733403</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/449b38c131.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        let url = "http://localhost:8000/";
    </script>
    <script src="js/ajax.js"></script>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        a, a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="text-center">
            <h1 class="my-4 text-uppercase">Danh sách xe</h1>
        </div>
        <div>
            <div class="my-2">
                <a href="#addCarModal" class="btn btn-success mr-2" data-toggle="modal"><i class="fa fa-plus-circle pr-2" aria-hidden="true" title="Thêm mới"></i><strong>Thêm mới</strong></a>
                <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="fas fa-minus-circle pr-2"></i> <span>Xóa</span></a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th scope="col">Id</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Năm</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM cars";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr id="<?php echo $row["id"]; ?>">
                                <td sope="row"><?php echo $i ?></td>   
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
                                        <label for="checkbox2"></label>
                                    </span>
                                </td>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo  $row["name"]; ?></td>
                                <td><?php echo $row["year"]; ?></td>
                                <td>
                                    <a href="#editCarModal" class="edit mr-3" data-toggle="modal">
                                        <i class="fas fa-edit update" data-toggle="tooltip"
                                        data-id="<?php echo $row["id"]; ?>"
                                        data-name="<?php echo $row["name"]; ?>"
                                        data-year="<?php echo $row["year"]; ?>"
                                        title="Chỉnh sửa"></i>
                                    </a>
                                    <a href="#deleteCarModal" class="delete text-danger" data-id="<?php echo $row["id"]; ?>"
                                        data-toggle="modal"><i class="far fa-trash-alt"
                                        data-toggle="tooltip" title="Xóa"></i></a>
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
                    
                </tbody>
            </table>
        </div>
        <!-- Add Modal HTML -->
        <div id="addCarModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="car_form">
                        <div class="modal-header">
                            <h4 class="modal-title text-uppercase text-center mx-auto">Thêm xe mới</h4>
                            <button type="button" class="close ml-0" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tên <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" minlength="5" maxlength="40" class="form-control" required>
                                <small id="error-name" class="d-none error-name form-text text-danger">Tên xe phải có độ dài từ 5 đến 40 ký tự!</small>
                            </div>
                            <div class="form-group">
                                <label>Năm <span class="text-danger">*</span></label>
                                <input type="number" id="year" min="1990" max="2015" name="year" class="form-control" required>
                                <small id="error-year" class="d-none error-year form-text text-danger">Năm sản xuất phải nằm trong khoảng từ 1990 tới 2015!</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="1" name="type">
                            <input type="button" class="btn btn-light" data-dismiss="modal" value="Hủy bỏ">
                            <button type="button" class="btn btn-success" id="btn-add">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="editCarModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="update_form">
                        <div class="modal-header">
                            <h4 class="modal-title text-uppercase text-center mx-auto">Chỉnh sửa thông tin xe</h4>
                            <button type="button" class="close ml-0" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_u" name="id" class="form-control" required>
                            <div class="form-group">
                                <label>Tên <span class="text-danger">*</span></label>
                                <input type="text" id="name_u" name="name" minlength="5" maxlength="40" class="form-control" required>
                                <small id="error-name-u" class="d-none error-name-u form-text text-danger">Tên xe phải có độ dài từ 5 đến 40 ký tự!</small>
                            </div>
                            <div class="form-group">
                                <label>Năm <span class="text-danger">*</span></label>
                                <input type="number" id="year_u" min="1990" max="2015" name="year" class="form-control" required>
                                <small id="error-year-u" class="d-none error-year-u form-text text-danger">Năm sản xuất phải nằm trong khoảng từ 1990 tới 2015!</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="2" name="type">
                            <input type="button" class="btn btn-light" data-dismiss="modal" value="Hủy bỏ">
                            <button type="button" class="btn btn-info" id="update">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteCarModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Xóa thông tin xe</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_d" name="id" class="form-control">
                            <p>Bạn có muốn xóa dữ liệu này?</p>
                            <p class="text-warning"><small>Dữ liệu đã xóa không thể khôi phục.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-light" data-dismiss="modal" value="Hủy bỏ">
                            <button type="button" class="btn btn-danger" id="delete">Xóa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        $conn->close();
    ?>
</body>

</html>