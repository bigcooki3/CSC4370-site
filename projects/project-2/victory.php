<?php
    setcookie('user', null, -1, '/');
    setcookie('gender', null, -1, '/');
    if (isset($_COOKIE['leaders'])) {
        $leaders = unserialize($_COOKIE['leaders']);
    }
    else {
        $leaders = [
            'Amper Sand',
            'Sir Cumference',
            'Hal Apenyo',
            'Trump'
        ];
    }
    if (!is_null($_GET['name'])) {
        array_unshift($leaders, $_GET['name']);
        setcookie('leaders', serialize($leaders), 2147483647, '/');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Leaderboards</title>
    <link type="text/css" media="screen" rel="stylesheet" href="./style.css" />
</head>

<body>


<div id="main">
    <div class="leaderboard">
        <h1>Leaders</h1>
        <table>
            <?php
                for($i = 1; $i <= count($leaders); $i++) {
                    echo "<tr>";
                        echo "<td>".$i.". </td>";
                        echo "<td>".$leaders[$i-1]."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <a href="./index.php">Play again?</a>
    </div>
</div>
</body>

</html>
    