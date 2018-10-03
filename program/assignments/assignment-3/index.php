<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PHP Assignment 3</title>
    <style>
        #q2 td {
            width: 35px;
            height: 35px;
            border: 1px;
        }
        .q4 td{
            border: 1px solid black;
        }
    </style>
</head>

<body>
<div>
    Question 1: 
    <?php 
    // require 'functions.php';

    function CharlieAteMyLunch() {
        function isBitten() {
            return rand(0, 1);
        }
        if (isBitten()) {
            return "Charlie ate my lunch!";
        }
        else {
            return "Charlie did not eat my lunch!";
        }
    }

    echo CharlieAteMyLunch();
    ?>
</div>

<div>
    Question 2:
    <table id="q2" cellpadding="1" width="300">
    <?php
        function PrintCheckerboard() {
            for ($i = 0; $i < 8; $i++) {
                echo "<tr>\n";
                for ($j = 0; $j < 8; $j++) {
                    if ($i % 2 == $j % 2) {
                        echo "\t<td bgcolor=\"red\"></td>\n";
                    }
                    else {
                        echo "\t<td bgcolor=\"black\"></td>\n";
                    }
                }
                echo "</tr>\n";
            }
        }
        PrintCheckerboard();
    ?>
    </table>
</div>
<br>
<div>
    Question 3: 
    <br>
    <?php
        $month = array ('January', 'February', 'March', 'April', 'May', 'June',  'July', 'August', 'September', 'October', 'November', 'December'); 

        function printArrayValues($arr) {
            $str;
            foreach ($arr as $i => $x) {
                $str.= $x . " ";
            }
            return $str;
        }
        function sortArray ($arr) {
            asort($arr);
            return $arr;
        }
        
        echo "\$months array: " . printArrayValues($month);
        echo nl2br("\nSorted \$months array: " . printArrayValues(sortArray($month)));
    ?>
</div>
<br>
<div>
    Question 4: 
    <br>
    <?php
        $arr_rest = array(
            'Chama Gaucha' => 40.50,
            'Aviva' => 15.00,
            'Bone\'s Restaurant' => 65.00,
            'Umi Sushi Buckhead' => 40.50,
            'Fandangles' => 30.00,
            'Capital Grille' => 60.50,
            'Canoe' => 35.50,
            'One Flew South' => 21.00,
            'Fox Bros. BBQ' => 15.00,
            'South City Kitchen Midtown' => 29.00
        );

        function printArrayObjRows($arr) {
            foreach ($arr as $key => $value) {
                echo "<tr>\n";
                echo "\t<td>$key</td>\n";
                echo "\t<td>\$" . number_format($value, 2) . "</td>\n";
                echo "</tr>\n";
            }
        }
        function sortByKey($arr) {
            ksort($arr);
            return $arr;
        }
        function sortByValue($arr) {
            asort($arr);
            return $arr;
        }
    ?>
    Restaurant table: 
    <table class="q4">
        <?php  printArrayObjRows($arr_rest); ?>
    </table>
    <br>
    Restaurant table sorted by name: 
    <table class="q4">
        <?php  printArrayObjRows(sortByKey($arr_rest)); ?>
    </table>
    <br>
    Restaurant table sorted by average price: 
    <table class="q4">
        <?php  printArrayObjRows(sortByValue($arr_rest)); ?>
    </table>
</div>
<br>
</table>
</body>
</html>