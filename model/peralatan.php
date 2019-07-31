<?php

  class peralatan{

    private $koneksi;

    function __construct($conn){
      $this->koneksi = $conn;
    }

    function data(){
      $sql = "select * from aset where id not in (select aset.id from aset where aset.id in (select aset_id from kendaraan) or aset.id in (select aset_id from gedung))";
      $data = mysqli_query($this->koneksi,$sql);
      return $data;
    }

    function store($nama = null, $tahun_buku = null, $jumlah = null,$pesan = true){
        $sql = "insert INTO aset(nama,tahun_buku,jumlah) values ('$nama', '$tahun_buku','$jumlah')";

        if($pesan){
          if(!mysqli_query($this->koneksi,$sql)){
                  array_push($_SESSION['pesan'],['eror','Gagal Menambahkan Peralatan']);
                  array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
          }else{  
               array_push($_SESSION['pesan'],['berhasil','Berhasil Menambahkan peralatan']);
          }
          header("location:/peminjaman-aset/view/peralatan");
        }else{
          if(mysqli_query($this->koneksi,$sql)){
            echo "<br>Berhasil Menambahkan Data Peralatan ".$nama;
          }else{
            echo "Gagal Menambahkan Peralatan";
          }
        }
    }

    function update($nama = null, $tahun_buku = null,$jumlah = null,$id = null){

        $data = mysqli_fetch_assoc($this->data($aset_id));

        $sql = "update aset SET nama='$nama',tahun_buku='$tahun_buku',jumlah='$jumlah' where id='$id'";

        if($id==''){
          array_push($_SESSION['pesan'],['eror','Data Kendaraan Tidak Ditemukan']);
        }

        if(!mysqli_query($this->koneksi,$sql)){
          array_push($_SESSION['pesan'],['eror','Gagal Merubah Peralatan']);
          array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
        }else{
          array_push($_SESSION['pesan'],['berhasil','Berhasil Merubah Peralatan']);
        }
        header("location:/peminjaman-aset/view/peralatan");
    }

    
    function delete($id ='')
    {
        $data = mysqli_fetch_assoc($this->data($id));

        if($data != null){
            $sql = "delete FROM aset WHERE id = '$id'";
            if(mysqli_query($this->koneksi,$sql)){
              array_push($_SESSION['pesan'],['berhasil','Berhasil Menghapus Peralatan']);
            }else{
              array_push($_SESSION['pesan'],['eror','Gagal Menghapus Peralatan']);
              array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
            }
        }else{
            array_push($_SESSION['pesan'],['eror','tidak ditemukan']);
        }
        header("location:/peminjaman-aset/view/peralatan");
    }
  }
?>
