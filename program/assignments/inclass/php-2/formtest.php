<?php
$c_name = $_POST['visitor_name'];
setcookie('user',$c_name, time() + 3600, '/');


$c_account = $_POST['account_type'];
setcookie('user',$c_account, time() + 3600, '/');


$c_system = $_POST['system'];
setcookie('user',$c_system, time() + 3600, '/');


$c_options = $_POST['options'];
setcookie('user',$c_options, time() + 3600, '/');


echo "Your name is " . $c_name;
echo nl2br("\nYou selected " . $c_account . " account");
echo nl2br("\nYour OS is " . $c_system);
echo nl2br("\nYour optional features are " . $c_options);
?>