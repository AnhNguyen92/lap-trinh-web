<!DOCTYPE html>
<html>
<body>

<?php

for ($x = 1; $x <= 7; $x++) {
    for ($y = 1; $y <= 7; $y++) {
        echo "<div style='border : 1px solid #000;background-color:yellow;width: 19px;height: 17px;text-align: center;display: inline-block;vertical-align: middle;padding: 10px;'>$x * $y</div>";
    }
    echo "<br>";
}
?>

</body>
</html>
