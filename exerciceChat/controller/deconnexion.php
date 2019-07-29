<?php
session_start();
if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
}echo 'Bienvenu '.$_SESSION['user']['username'];
	header('location:../index.php');
		?>
