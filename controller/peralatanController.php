<?php
  include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/controller/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/model/peralatan.php';
  $peralatan = new peralatan($conn);

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
  $link = '/peminjaman-aset/view/peralatan';

  //validasi dan inisiasi
  if(isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];
  }
  if($aksi=='create'){
    $peralatan->store($_POST['nama'], $_POST['tahun_buku'], $_POST['jumlah']);
  }

  elseif($aksi=='update'){
    $peralatan->update($_POST['nama'],$_POST['tahun_buku'],$_POST['jumlah'],$_POST['id']);
  }

  elseif($aksi=='delete'){
    $peralatan->delete($_POST['id']);
  }
?>
