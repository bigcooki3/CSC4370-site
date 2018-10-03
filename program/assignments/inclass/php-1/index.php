<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PHP Inclass </title>
</head>
<body>

<p>
<?php 
    // Number 1
    echo "<i>\"Good morning, Dave,\" said HAL. </i>";
?>
<br>
<?php 
    // Number 2
    function calculateArea($a) {
        $area = $a * $a * pi();
        return round($area, 2);
    }

    $radius = 2;
    echo "Area of a circle with radius " . $radius . ": " . calculateArea(2);
?>
<br>
<?php
    // Number 3
    function convertTemperature($celFahr) {
        $c = (5/9)*($celFahr - 32);
        return round($c, 2);
    }

    $fahr = -459.67;
    echo $fahr . "°F is " . convertTemperature($fahr) . "°C.";
?>
<br>
<?php
    // Number 4
    $x = "PHP is fun";
    echo $x;
    echo nl2br("\nThe above string has " . strlen($x) . " characters");
    ?>
    <br>
<?php
    // Number 5
    function indexOfPos($hay, $ned) {
        return strpos($hay, $ned) + strlen($ned);
    }
    $key = "WWW";
    $str = "WDWWLWWWLDDWDLL";
    echo "The first letter after WWW in the string " . $str . " is " . substr($str, indexOfPos($str, $key), 1);
?>
<br>
<?php
    // Number 6
    function isPalindrome ($s) {
        return $s === strrev($s);
    }
    $str = "kayak";
    $str2 = "kayuk";
    echo "Is " . $str . " a palindrome? " . (isPalindrome($str) ? 'true' : 'false');
    echo nl2br("\nIs " . $str2 . " a palindrome? " . (isPalindrome($str2) ? 'true' : 'false'));
?>
<br>
<?php
    // Number 7
    function isOdd($n) {
        return $n % 2;
    }
    $num = 7;
    echo "\nIs " . $num . " odd? " . (isOdd($num) ? 'true' : 'false');
?>
<br>
<?php
    // Number 8
    function isLeapYear() {
        return date('L');
    }
    echo "\n Is this year a leap year? <b>" . (isLeapYear() ? 'It is' : 'It isn\'t') . "</b>"
?>
</p>
</body>
</html>