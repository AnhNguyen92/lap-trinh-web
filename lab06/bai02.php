<!DOCTYPE html>
<html>

<head>
    <title>Lab 7.2 - Nguyễn Tuấn Anh - 1733403</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
    </style>
</head>
<body>
    <?php
        $number = $error = $message = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST["number"];
            if (empty($number)) {
                $error = "Bạn chưa nhập số";
            } else {
                $message = printMessage($number);
            }
        }

        function printMessage($number)
        {
            switch ($number % 5) {
                case 0:
                    return  "Hello";
                case 1:
                    return  "How are you?";
                case 2:
                    return  "I’m doing well, thank you";
                case 3:
                    return  "See you later";
                default: // 4
                    return  "Good-bye";
            }
        }

    ?>
    <div class="container col-6 mt-3 mx-auto">
        <div class="text-center mb-2">
            <h2>Hiển thị thông báo tùy theo số nhập</h2>
        </div>
        <div class="col-6 mx-auto">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group row mb-3">
                    <label for="number" class="form-label">Nhập số bất kỳ</label>
                    <input name="number" type="number" placeholder="Nhập số" class="form-control" id="number" value="<?php echo $number;?>">
                    <small class="text-danger"><?php echo $error;?></small>
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary">Hiển thị thông báo</button>
                </div>
                <div class="form-group row">
                    <div class="col-6 mt-2 text-success">
                        <span><?php echo $message;?></span>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</body>

</html>