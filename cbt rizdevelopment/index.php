<?php
session_start();
if (isset($_SESSION["login_admin"])) {
	header("Location: admin/dashboard.php");
	exit;
}else if (isset($_SESSION["login_user"])) {
	header("Location: user/index.php");
	exit;
}else if (!isset($_SESSION["login_user"]) && !isset($_SESSION["login_admin"])) {
	header("Location: user/login.php");
	exit;
}