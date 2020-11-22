<?php

class Database{
//Protected Berfungsi melindungi variabel dari akses luar class

   protected $host = "localhost",
             $uname = "root",
             $pass = "",
             $dbname = "profile_card";

   protected $koneksi; //menyimpan koneksi



function __construct()
{
    $this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->dbname);

}


function getData()
{
    $qry = mysqli_query($this->koneksi,"SELECT * FROM data");
    return mysqli_fetch_array($qry);
}


function getWeb()
{
    $qry = mysqli_query($this->koneksi,"SELECT * FROM web");
    return mysqli_fetch_array($qry);
}


function getLogin($kode)
{
    $qry = mysqli_query($this->koneksi,"SELECT * FROM login WHERE kode='$kode' ");
    return $qry;
}


function cekLogin($kode){
    return mysqli_num_rows($this->getLogin($kode));
}


function Proteks($input) 
{
    return mysqli_real_escape_string($this->koneksi,stripslashes(strip_tags(htmlspecialchars($input,ENT_QUOTES))));

}
}


class InsertData extends Database
{
    function Web($title, $desc){
       $qry = mysqli_query($this->koneksi,
        "UPDATE `web` SET `title`='$title', `descweb`='$desc' WHERE id='1'");
        if ($qry == true) {
            return 1;
        }else {
            return 0;
        }
    }

    
    function Sosmed($fb, $ig, $tw, $web){
        mysqli_query($this->koneksi,
        "UPDATE `data` SET `fb_link`='$fb',`ig_link`='$ig',`tw_link`='$tw',`web_link`='$web'  WHERE id='1'");
        return 1;  
    }
    
    function Data($nama, $desc, $lokasi){
        mysqli_query($this->koneksi,
        "UPDATE `data` SET `nama`='$nama',`descr`='$desc',`lokasi`='$lokasi' WHERE id='1'");
        return 1;  
    }
}




$db = new Database(); //Memanggil Class Database Sebagai Object
$insert = new InsertData();


