<!DOCTYPE html>
<html>
<body>

<?php
function printMessage($number) {
    switch ($number % 5) {
    case 0:
        echo "Hello";
        break;
    case 1:
        echo "How are you?";
        break;
    case 2:
        echo "I’m doing well, thank you";
        break;
    case 3:
        echo "See you later";
        break;
    default: // 4
        echo "Good-bye";
    }
}
?>
 
</body>
</html>
