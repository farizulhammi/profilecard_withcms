<?php
session_start();
$_SESSION['akses'] = 1;
header("Location: index.php");
