<?php
session_start();
require('config.php');

$data = $db->getData();
$web = $db->getWeb();


if ((empty($_SESSION['datalogin']))) {
  $_SESSION['respon'] = array(1 => 'Gagal', 2 => 'Silahkan Login Terlebih Dahulu',3 => 'error');
  header("Location: login.php");

} 


if (isset($_POST['simpanweb'])) {
  $title = $db->Proteks($_POST['titleweb']);
  $desc = $db->Proteks($_POST['descweb']);
  $cek = $insert->Web($title,$desc); 

if ($cek == 1) {
   header("Location: admin.php");
   $_SESSION['respon'] = array(1 => 'Update Sukses', 2 => 'Setting Web Berhasil Di Ubah',3 => 'success');
}
}


if (isset($_POST['simpanprofile'])) {
  $nama = $db->Proteks($_POST['fnama']);
  $desc = $db->Proteks($_POST['desc']);
  $lokasi = $db->Proteks($_POST['lokasi']);
  ////////////////////////////////////////
  $move = $_FILES['imgupload']['tmp_name'];
  $name = $_FILES['imgupload']['name'];
  $size = $_FILES['imgupload']['size'];

  if ($size < 1000000) {

  $dizinkan = ['png', 'jpg', 'jpeg'];
  $ex = explode('.', $name);
  $ekstensi = strtolower(end($ex));
  
  if (in_array($ekstensi, $dizinkan, true)) {
  move_uploaded_file($move, 'profile'.$ekstensi);
    
  } else { $_SESSION['respon'] = array(1 => 'Gagal', 2 => 'Ekstensi Yang Di Upload Tidak Di Perbolehkan',3 => 'error');
  }
  } else { $_SESSION['respon'] = array(1 => 'Gagal', 2 => 'Ukuran Gambar Melebihi 1 MB',3 => 'error');
  }
 
  $cek = $insert->Data($nama,$desc,$lokasi);

  if ($cek == 1) {
    header("Location: admin.php");
    $_SESSION['respon'] = array(1 => 'Update Sukses', 2 => 'Setting Profile Berhasil Di Ubah',3 => 'success');
 }
  
 
}
  if (isset($_POST['simpansosmed'])) {
    $fb = $db->Proteks($_POST['fblink']);
    $ig = $db->Proteks($_POST['iglink']);
    $tw = $db->Proteks($_POST['twlink']);
    $web = $db->Proteks($_POST['weblink']);
    $cek = $insert->Sosmed($fb,$ig,$tw,$web); 
  
  if ($cek == 1) {
    header("Location: admin.php");
     $_SESSION['respon'] = array(1 => 'Update Sukses', 2 => 'Setting Sosmed Berhasil Di Ubah',3 => 'success');
  }
  }








require('header.php');

?>

<div class="profile-card__cntttt">
  <form action="" method="post" class="form" enctype="multipart/form-data">
    <h3>Website Setting : </h3>
                <label for="title" >Title </label>
                <input type="text" name="titleweb" class="form-content" id="title"  value="<?= $web['title']; ?>">
                <div class="form-border"></div>
                <br>
                <label for="desc" >Description </label>
                <input type="text" name="descweb" class="form-content" id="desc" value="<?= $web['descweb']; ?>">
                <div class="form-border"></div>
                <br>
                <input type="submit" value="Save" name="simpanweb" class="profile-card__button button--blue">
            
</form>
<br>
<br>
<br>

  <form action="" method="post" class="form" enctype="multipart/form-data">
    <h3>Profile Setting : </h3>
                <label for="imgupload" style="padding-bottom: 13px;">Image </label>
                <input type="file" name="imgupload" id="imgupload">
                <br>
                <label for="fname" >Nama </label>
                <input type="text" name="fnama" class="form-content" id="fname" value="<?= $data['nama']; ?>" >
                <div class="form-border"></div>
                <br>
                <label for="desc" >Desc </label>
                <input type="text" name="desc" class="form-content" id="desc" value="<?= $data['descr']; ?>" >
                <div class="form-border"></div>
                <br>
                <label for="lokasi" >Lokasi </label>
                <input type="text" name="lokasi" class="form-content" id="lokasi" value="<?= $data['lokasi']; ?>">
                <div class="form-border"></div>
                <br>
                <input type="submit" value="Save" name="simpanprofile" class="profile-card__button button--orange">
            
</form>

<br>
<br>
<br>
  <form action="" method="post" class="form" enctype="multipart/form-data">
    <h3>Sosmed Setting:</h3>
                <br>
                <label for="fb_link" >FB Link </label>
                <input type="text" name="fblink" class="form-content" id="fblink" value="<?= $data['fb_link']; ?>">
                <div class="form-border"></div>
                <br>
                <label for="ig_link" >IG Link </label>
                <input type="text" name="iglink" class="form-content" id="iglink" value="<?= $data['ig_link']; ?>">
                <div class="form-border"></div>
                <br>
                <label for="tw_link" >TW Link </label>
                <input type="text" name="twlink" class="form-content" id="twlink" value="<?= $data['tw_link']; ?>">
                <div class="form-border"></div>
                <br>
                <label for="weblink" >WEB Link </label>
                <input type="text" name="weblink" class="form-content" id="weblink" value="<?= $data['web_link']; ?>">
                <div class="form-border"></div>
                <br>

                <input type="submit" value="Save" name="simpansosmed" class="profile-card__button button--orange">
            
</form>
<br>
<br>
<br>

<a style="padding-right: 25%;" href="index.php">Check Website</a>
<a href="logout.php">Log out</a>
        
        </div>
        
</body>
<script  src="assest/script.js"></script>
</html>

