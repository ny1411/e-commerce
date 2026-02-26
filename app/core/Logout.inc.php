<?php

require_once __DIR__ . "/../config/session.config.inc.php";

session_unset();
session_destroy();

header("Location: ../../public");
exit();