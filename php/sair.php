<?php
    session_start();
    session_destroy();
    setcookie('PHPSESSID', null, -1, '/');
    header("Refresh: 0.1, url=../index.php");
?>