<?php
session_start();
session_destroy();
header('Location:administrator_login.php');
?>