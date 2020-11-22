
<?php
session_start();
require('config.php');
$web = $db->getWeb();
$data = $db->getData();


if (!empty($_SESSION['datalogin'])) {
  header("Location: admin.php");
}

if (isset($_POST['submit'])) {
    $kode = $db->Proteks($_POST['kodee']);

    $cek = $db->cekLogin($kode);

    if ($cek == 1) {
      $_SESSION['datalogin'] = $data['nama'];
      $_SESSION['respon'] = array(1 => 'Berhasil Login', 2 => 'Selamat Datang Di Halaman Admin', 3 => 'success');
      header("Location: admin.php"); 
    }else {

       $_SESSION['respon'] =  array(1 => 'Gagal Login', 2 => 'Kode Yang Anda Masukan Salah',3 => 'error');
    }

}
require('header.php');
?>

<div class="profile-card__cntttt">
<form action="" method="post" class="form" enctype="multipart/form-data">
    <h3>Masukan kode : </h3>
                <label for="kode" >Kode </label>
                <input type="text" name="kodee" class="form-content" id="kode" >
                <div class="form-border"></div>
                <br>
                <input type="submit" value="Log in" name="submit" class="profile-card__button button--blue">
            
</form>

        
        </div>
</body>
<script  src="assets/script.js"></script>
</html>

