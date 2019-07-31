<?php
  include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/controller/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/model/gedung.php';
  $gedung = new gedung($conn);

  if($_SESSION['status'] == 1){
    if($_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "operator"){
      array_push($_SESSION['pesan'],['eror','Anda Tidak Memiliki Akses Kesini']);
      header("location:/peminjaman-aset/view/");
    }
  }else{
      array_push($_SESSION['pesan'],['eror','Anda Belum Login, Silakan Login Terlebih Dahulu']);
      header("location:/peminjaman-aset/view/auth/login.php");
  }

  $aksi = null;
  $link = '/peminjaman-aset/view/gedung';

  //validasi dan inisiasi
  if(isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];
  }

  if($aksi=='create'){
    $gedung->store($_POST['nama'], $_POST['tahun_buku'], $_POST['alamat'], $_POST['kapasitas']);

  }

  elseif($aksi=='update'){
    $gedung->update($_POST['nama'],$_POST['tahun_buku'],$_POST['alamat'],$_POST['kapasitas'],$_POST['aset_id']);
  }

  elseif($aksi=='delete'){
    $gedung->delete($_POST['aset_id']);
  }
  
?>
