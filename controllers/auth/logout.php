<?php

require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
unset($_SESSION['user']);

header("Location: " .URL . "login.php");



