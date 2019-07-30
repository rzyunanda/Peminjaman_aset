<?php

  class kendaraan{

    private $koneksi;

    function __construct($conn){
      $this->koneksi = $conn;
    }

    function data(){
      $sql = "select * from aset join gedung on aset.id=gedung.aset_id";
      $data = mysqli_query($this->koneksi,$sql);
      return $data;
    }

    function store($nama = null, $no_plat = null,$bahan_bakar = null,$tahun_buku = null, $pesan = true){
        $sql = "insert INTO aset(nama,tahun_buku) values ('$nama', '$tahun_buku')";

        if($pesan){
          if(!mysqli_query($this->koneksi,$sql)){
                  array_push($_SESSION['pesan'],['eror','Gagal Menambahkan Kendaraan']);
                  array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
          }else{
            $sql1="insert INTO kendaraan(no_plat,bahan_bakar,aset_id) values ('$no_plat','$bahan_bakar',LAST_INSERT_ID())";  
            if(mysqli_query($this->koneksi,$sql1)){
               array_push($_SESSION['pesan'],['berhasil','Berhasil Menambahkan Kendaraan']);
            }
          }
          header("location:/peminjaman-aset/view/kendaraan");
        }else{
          if(mysqli_query($this->koneksi,$sql)){
            echo "<br>Berhasil Menambahkan Data Kendaraan ".$nama;
          }else{
            echo "Gagal Menambahkan Kendaraan";
          }
        }
    }

    function update($nama = null, $no_plat = null, $bahan_bakar = null, $tahun_buku = null,$aset_id = null){

        $data = mysqli_fetch_assoc($this->data($aset_id));

        $sql = "update aset SET nama='$nama'";


        if($tahun_buku != null){
            $sql .= ",tahun_buku='$tahun_buku' ";
        }

        
        $aset_id = $data['aset_id'];
        $sql .= " WHERE id = '$aset_id'";

        if($aset_id==''){
          array_push($_SESSION['pesan'],['eror','Data Kendaraan Tidak Ditemukan']);
        }

        if(!mysqli_query($this->koneksi,$sql)){
          array_push($_SESSION['pesan'],['eror','Gagal Merubah Kendaraan']);
          array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
    
        }else{
          array_push($_SESSION['pesan'],['berhasil','Berhasil Merubah Kendaraan']);
        }
        header("location:/peminjaman-aset/view/kendaraan");
        
    }

    function delete($aset_id = '')
    {
        $data = mysqli_fetch_assoc($this->data($aset_id));
        if($data != null){
            $sql = "delete FROM aset,kendaraan join kendaraan on aset.id=kendaraan.aset_id WHERE aset.id = '$aset_id'";
            if(!mysqli_query($this->koneksi,$sql)){
              array_push($_SESSION['pesan'],['eror','Gagal Menghapus Kendaraan']);
              array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
            }else{
              array_push($_SESSION['pesan'],['berhasil','Berhasil Menghapus Kendaraan']);
            }
        }else{
            array_push($_SESSION['pesan'],['eror','kode_kendaraan tidak ditemukan']);
        }
        header("location:/peminjaman-aset/view/kendaraan");
    }

    function empty()
    {
      $sql = "TRUNCATE `kendaraan`";
      if(mysqli_query($this->koneksi,$sql)){
        echo "berhasil Membersihkan data<br>";
      }else{
        echo "Gagal Membersihkan data<br>".mysqli_error($this->koneksi)."<br>";
      }
    }
  }

?>
