<!DOCTYPE html>
<html>
<head>
    <title>Lab 7.2 - Nguyễn Tuấn Anh - 1733403</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .box {
            border : 1px solid #000;
            background-color:yellow;
            width: 19px;height: 17px;
            text-align: center;
            display: inline-block;
            vertical-align: middle;
            padding: 10px;
        }
    </style>
<body>

<?php

for ($x = 1; $x <= 7; $x++) {
    for ($y = 1; $y <= 7; $y++) {
        $res = $x * $y;
        echo "<div class='box'>$res</div>";
    }
    echo "<br>";
}
?>

</body>
</html>
