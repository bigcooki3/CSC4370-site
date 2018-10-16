<?php
    setcookie('user', null, -1, '/');
    setcookie('gender', null, -1, '/');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Game Title</title>
    <link type="text/css" media="screen" rel="stylesheet" href="./style.css" />
</head>

<body>


<div id="main">
    <form action="./battle.php" method="POST">
        <div id="character-section">
            <h1 id="character-title">Select your character: </h1>
            <label>
                <input name="gender" type="radio" checked="checked" value="m" />
                <img src="./img/user-m.png">
            </label>
            <label>
                <input name="gender" type="radio" value="f" />
                <img src="./img/user-f.png">
            </label>
        </div>
        <div>
            <h2>Name: </h2>
            <input name="user" type="text" required>
            <br />
            <input type="submit" value="PLAY!">
        </div>            
    </form>
</div>
</body>

</html>
    