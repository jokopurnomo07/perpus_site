<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();
Header("Location: ../index.php ");
exit();
