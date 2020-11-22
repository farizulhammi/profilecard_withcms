  <!--
   // ____              ______  _____   ________      __ _____  _______ 
  // |  _ \            |  ____||  __ \ |___  /\ \    / // ____||__   __|
  // | |_) | _   _     | |__   | |__) |   / /  \ \  / /| |        | |   
  // |  _ < | | | |    |  __|  |  _  /   / /    \ \/ / | |        | |   
  // | |_) || |_| | _  | |     | | \ \  / /__    \  /  | |____    | |   
  // |____/  \__, |(_) |_|     |_|  \_\/_____|    \/    \_____|   |_|   
  //          __/ |                                                     
  //         |___/                                      
 -->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?= $web['title'];?></title>
  <meta name="description" content="Profile Website">
  <meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="assets/style.css">
<script src="assets/sweetalert.js"></script>
</head>
<body>
<div class="wrapper">

<div class="profile-card js-profile-card">
    <div class="profile-card__img">
      <img src="img/profile.jpg" alt="profile card">
    </div>

<?php
if (isset($_SESSION['respon'])) {
  $respon = $_SESSION['respon']; ?>
<script>swal("<?= $respon[1]?>","<?= $respon[2]?>","<?= $respon[3]?>")</script>

<?php
}
?>