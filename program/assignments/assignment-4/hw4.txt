<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PHP Assignment 4</title>
    <link type="text/css" media="screen" rel="stylesheet" href="./hw4.css" />
</head>

<body>

<div id="problem1" class="box">
    <div class="boxhead">
        <h1>Problem 1</h1>
    </div>
    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="minibox">
            Background color: <input name="background" type="color" value="#ffffff"><br />
            Text color: <input name="textcolor" type="color"><br />
            Font: <select name="font">
                <option>Karla</option>
                <option>Krub</option>
                <option>Kosugi</option>
                <option>Arbutus</option>
            </select>
            <input type="Submit" value="Submit"><input type="Reset" value="Reset">
        </div>
        <textarea name="text" rows="7" cols="60">
            ASIANS CAN ACTUALLY READ MINDS!!!!!!!!!!!! they can hear, and see what your visually thinking. this is the complete truth. The reason a lot of Asians have completely expressionless faces, segregate from everybody else-only associate with Asians and don't associate with non Asians that much, and are very unfriendly in general is to avoid accidentally revealing that they can read minds. If all over a billion Asians where to show facial expressions all the time just as much as non Asians, integrate and associate with non Asians much more, and be much more friendly and talkative, then a lot of them might accidentally reveal that they can read minds by accidentally showing a facial expression or dirty look when someone thinks, or visually pictures something in their mind they don't like, find astonishing, or funny etc because those people might see that and and really wonder what that was that just happened there and see the connection, and they might accidentally say something similar to what the person was just thinking and going to say. If they all associated with non Asians a lot more then there would be a lot more people around for them to accidentally show facial expressions when those people think things they don't like etc, so they segregate and only associate with Asians so there won't be anyone around for them to see that and have any accidents happen in the first place.
        </textarea><br />
    </form>
    <div class="minibox">
        <?php
            date_default_timezone_set("US/Eastern"); 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $font = "";
                switch ($_POST["font"]) {
                    case 'Karla': 
                        $font = 'Karla';
                        break;
                    case 'Krub': 
                        $font = 'Krub';
                        break;
                    case 'Kosugi': 
                        $font = 'Kosugi Maru';
                        break;
                    case 'Arbutus': 
                        $font = 'Arbutus Slab';
                        break;
                }
                echo "<div class=\"minibox\" style=\"".
                "color:".$_POST["textcolor"].";".
                "background:".$_POST["background"].";".
                "font-family:".$font.";\">\n";
                echo $_POST["text"];
                echo "</div>";
            }
        ?>
    </div>
</div>
<div id="problem2" class="box">
    <div class="boxhead">
        <h1>Problem 2</h1>
    </div>
    <div class="minibox">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
            Hours to show: <input name="hours" type="number" value="3" min="1" max="12">
            <input type="Submit" value="Submit">
        </form>
        <?php echo "Calendar of ".date("h:i A, F d, Y")?>
        <table>
            <tr>
                <th>Time</th>
                <th>Name</th>
            </tr>
            <?php
                function get_hour_string($time) {
                    return date('h:i A', $time);
                }
                $people = [
                    'May',
                    'June',
                    'Mint',
                    'Vanilla',
                    'Paul',
                    'Johnny',
                    'Steve',
                    'Kevin',
                    'Jennifer',
                    'Jack',
                    'Jill',
                    'Hannah'
                ];
                if ($_GET["hours"] > 0) {
                    $hours_to_show = $_GET["hours"];
                }
                else {
                    $hours_to_show = 3;
                }
                for($i = 0; $i < $hours_to_show; $i++) {
                    echo "<tr>";
                        echo "<td>".get_hour_string(time() + $i * 3600)."</td>";
                        echo "<td>".$people[$i]."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>

</body>

</html>