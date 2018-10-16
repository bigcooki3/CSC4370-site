<?php
    function action($type) {
        // Use probability to return character action
        $rand_int = rand(1, 100);
        if($type == "enemy") {
            switch ($rand_int) {
                case in_array($rand_int,range(1, 30)): 
                    return "atk";
                case in_array($rand_int,range(31, 50)): 
                    return "mgc";
                case in_array($rand_int,range(61, 80)):
                    return "def";
                case in_array($rand_int,range(51, 60)):
                    return "heal";
                default: 
                    return "idle";
            }
        }
        else if($type == "asst") {
            switch ($rand_int) {
                case in_array($rand_int,range(1, 10)): 
                    return "heal";
                case in_array($rand_int,range(11, 30)): 
                    return "atk";
                default: 
                    return "idle";
            }
        }
    }
    function print_action($actor, $action, $target = "", $damage = -1) {
        $msg_list = [
            "atk" => [
                " punches ",
                " kicks ",
                " slaps ",
                " throws a shoe at ",
                " shoots an arrow at "
            ],
            "def" => [
                " holds up a shield. ",
                " puts on a suit of armor. ",
                " hides behind a bystander. ",
                " ducks behind a rock. "
            ],
            "mgc" => [
                " casts a spell on ",
                " fires a beam at "
            ], 
            "heal" => [
                " feeds a leek to ",
                " heals ",
                " tosses a healing potion at "
            ],
            "idle" => [
                " is standing around! ",
                " is staring off into space. ",
                " is inspecting his fingernails. ",
                " is busy finishing his web programming project. ",
                " is thinking about what's for dinner. "
            ]
        ];
        $output = $actor.$msg_list[$action][rand(0, count($msg_list[$action]) - 1)].$target;
        if ($damage > -1) {
            $output = $output." for ".strval($damage)." damage!";
        }
        return $output."<br />";
    }
    function checkDeath($int) {
        if ($int <= 0)
        return true;
    }

    // Game variables
    if ($_POST['user']) {
        setcookie('user', $_POST['user'], time() + 3600, '/');
        $user = $_POST['user'];
    }
    else {
        $user = $_COOKIE['user'];
    }


    if ($_POST['gender']) {
        setcookie('gender', $_POST['gender'], time() + 3600, '/');
        $gender = $_POST['gender'];
    }
    else {
        $gender = $_COOKIE['gender'];
    }
    

    $asst = "The Great Catsby";
    $enemy = "Rick Axely";

    // Turn variables
    if (is_null($_POST['turn'])) {
        $turn = 0;
        $health = 7;
        $health_enemy = 12;
    }
    else {
        $turn = $_POST['turn'];
        $health = $_POST['health'];
        $health_enemy = $_POST['health_enemy'];
        $act_user = $_POST['action'];
    }
    
    // Game calculations
    if ($turn != 0) {
        $act_enemy = action("enemy");
        $act_asst = action("asst");
    } 
    $turn++;

    $msgs = [];
    if (!is_null($act_user)) {
        if ($act_user == "def") {
            array_push($msgs, print_action($user, $act_user));
        }
        else if (($act_user == "atk" || $act_user == "mgc" ) && $act_enemy == "def") {
            array_push($msgs, print_action($user, $act_user, $enemy, 0));
        }
        else if ($act_user == "atk" && $act_enemy != "def") {
            array_push($msgs, print_action($user, $act_user, $enemy, 1));
            $health_enemy--;
        }
        else if ($act_user == "mgc" && $act_enemy != "def"){
            array_push($msgs, print_action($user, $act_user, $enemy, 3));
            $health_enemy -= 3;
        }
    }
    $dead = checkDeath($health);
    $enemy_dead = checkDeath($health_enemy);

    if (!($dead || $enemy_dead)) {
        if ($act_enemy == "def" || $act_enemy == "idle") {
            array_unshift($msgs, print_action($enemy, $act_enemy));
        }
        else if ($act_enemy == "heal") {
            array_unshift($msgs, print_action($enemy, $act_enemy, "himself"));
            $health_enemy++;
        }
        else if (($act_enemy == "atk" || $act_enemy == "mgc") && $act_user == "def") {
            array_push($msgs, print_action($enemy, $act_enemy, $user, 0));
        }
        else if ($act_enemy == "atk" && $act_user != "def") {
            array_push($msgs, print_action($enemy, $act_enemy, $user, 1));
            $health--;
        }
        else if ($act_enemy == "mgc" && $act_user != "def") {
            array_push($msgs, print_action($enemy, $act_enemy, $user, 3));
            $health -= 3;
        }
    }

    $dead = checkDeath($health);
    $enemy_dead = checkDeath($health_enemy);

    if (!($dead || $enemy_dead)) {
        if ($act_asst == "idle") {
            array_push($msgs, print_action($asst, $act_asst));
        }
        else if ($act_asst == "heal") {
            array_push($msgs, print_action($asst, $act_asst, $user));
            $health++;
        }
        else if ($act_asst == "atk" && $act_enemy == "def" && $act_user == "def") {
            array_push($msgs, print_action($asst, $act_asst, $enemy, 0));
        }
        else if (($act_asst == "atk" && $act_enemy == "def" && $act_user != "def") || ($act_asst == "atk" && $act_enemy != "def")) {
            array_push($msgs, print_action($asst, $act_asst, $enemy, 1));
            $health_enemy--;
        }
    }

    $dead = checkDeath($health);
    $enemy_dead = checkDeath($health_enemy);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Battle</title>
    <link type="text/css" media="screen" rel="stylesheet" href="./battle.css" />
</head>

<body>

<div id="main">
    <div id="graphics">
        <!-- Character images / Character action icons go here -->
        <div id="left">
            <div class="characters">
                <img id="action-user" src="<?php echo $act_user ? "./img/".$act_user.".png" : "" ;?>">
                <img id="user" src="./img/user-<?php echo $gender; ?>.png">
                <p id="health"><?php echo $health; ?></p>
                <p id="name-user"><?php echo $user; ?></p>
            </div>
            <div class="characters">
                <img id="action-asst" src="<?php echo $act_asst ? "./img/".$act_asst.".png" : "" ;?>">
                <img id="asst" src="./img/asst-cat.png">
                <p id="name-asst"><?php echo $asst; ?></p>
            </div>
        </div>
        <div id="right">
            <img id="action-enemy" src="<?php echo $act_enemy ? "./img/".$act_enemy.".png" : "" ;?>">
            <img id="enemy" src="./img/enemy.png">
            <p id="health-enemy"><?php echo $health_enemy; ?></p>
            <p id="name-enemy"><?php echo $enemy; ?></p>
        </div>
    </div>
    <div id="battle">
        <div id="battle-text">
            <!-- Battle text goes here -->
           <div id="turn">
                Turn: <?php echo $turn ?>
            </div> 
            <div id="messages">
                <?php
                    foreach($msgs as $msg) {
                        echo $msg;
                    }
                    if ($enemy_dead) {
                        echo $user." defeated ".$enemy.". <br />You win! <br />";
                        echo "<a href=\"victory.php?name=".$user."\">Click here to visit the leaderboards!</a>";
                    }
                    else if ($dead) {
                        echo $user." died. <br />GAME OVER! ";
                        echo "<a href=\"index.php\">Click here to try again?</a>";
                    }
                ?>
            </div>
            
        </div>
        <div id="battle-actions">
            <!-- Actions go here -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <input type="hidden" name="turn" value="<?php echo $turn; ?>">
                <input type="hidden" name="health" value="<?php echo $health; ?>">
                <input type="hidden" name="health_enemy" value="<?php echo $health_enemy; ?>">

                <button name="action" type="submit" value="atk" <?php if ($dead || $enemy_dead) echo "disabled";?>>Attac</button>
                <button name="action" type="submit" value="def" <?php if ($dead || $enemy_dead) echo "disabled";?>>Protec</button>
                <button name="action" type="submit" value="mgc" <?php if ($turn % 5 || $dead || $enemy_dead) echo "disabled";?>>Magic</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>