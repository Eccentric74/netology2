<?php
session_start();
$digit = intval($_POST['guess']);

if($digit == $_SESSION['digit']) {
	echo 'Вы угадали!';
}

if($digit > $_SESSION['digit']) {
	echo 'Слишком много';
}

if($digit < $_SESSION['digit']) {
	echo 'Слишком мало';
}