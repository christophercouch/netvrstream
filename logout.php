<?php
session_destroy();
unset($_SESSION['ID']);
unset($_SESSION['email']);
unset($_SESSION['playerName']);
unset($_SESSION['status']);
header("location: login.php");