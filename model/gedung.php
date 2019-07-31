<?php

  class gedung{

    private $koneksi;

    function __construct($conn){
      $this->koneksi = $conn;
    }

    function data(){
      $sql = "select * from aset join gedung on aset.id=gedung.aset_id";
      $data = mysqli_query($this->koneksi,$sql);
      return $data;
    }

    function store($nama = null, $tahun_buku = null, $alamat = null,$kapasitas = null,$pesan = true){
        $sql = "insert INTO aset(nama,tahun_buku) values ('$nama', '$tahun_buku')";

        if($pesan){
          if(!mysqli_query($this->koneksi,$sql)){
                  array_push($_SESSION['pesan'],['eror','Gagal Menambahkan Gedung']);
                  array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
          }else{
            $sql1="insert INTO gedung(alamat,kapasitas,aset_id) values ('$alamat','$kapasitas',LAST_INSERT_ID())";

            if(mysqli_query($this->koneksi,$sql1)){
               array_push($_SESSION['pesan'],['berhasil','Berhasil Menambahkan Gedung']);
            }
          }
          header("location:/peminjaman-aset/view/gedung");
        }else{
          if(mysqli_query($this->koneksi,$sql)){
            echo "<br>Berhasil Menambahkan Data gedung ".$nama;
          }else{
            echo "Gagal Menambahkan Gedung";
          }
        }
    }

    function update($nama = null, $tahun_buku = null, $alamat = null,$kapasitas = null,$aset_id = null){

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
          array_push($_SESSION['pesan'],['eror','Gagal Merubah Gedung']);
          array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
    
        }else{
          $sql1 = "update gedung set alamat='$alamat',kapasitas='$kapasitas' where aset_id='$aset_id'";
          if(!mysqli_query($this->koneksi,$sql1)){
            header("location:/peminjaman-aset/view/gedung");
          }
          array_push($_SESSION['pesan'],['berhasil','Berhasil Merubah Gedung']);
        }
        header("location:/peminjaman-aset/view/gedung");
    }

    
    function delete($aset_id = '')
    {
        $data = mysqli_fetch_assoc($this->data($aset_id));

        if($data != null){
            $sql = "delete FROM gedung WHERE aset_id = '$aset_id'";
            if(mysqli_query($this->koneksi,$sql)){
              $sql2 = "delete FROM aset WHERE id = '$aset_id'";
              if(mysqli_query($this->koneksi,$sql2)){
                array_push($_SESSION['pesan'],['berhasil','Berhasil Menghapus Gedung']);
              }
            }else{
              array_push($_SESSION['pesan'],['eror','Gagal Menghapus Gedung']);
              array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
            }
        }else{
            array_push($_SESSION['pesan'],['eror','kode_kendaraan tidak ditemukan']);
        }
        header("location:/peminjaman-aset/view/gedung");
    }

    function empty()
    {
      $sql = "TRUNCATE `gedung`";
      if(mysqli_query($this->koneksi,$sql)){
        echo "berhasil Membersihkan data<br>";
      }else{
        echo "Gagal Membersihkan data<br>".mysqli_error($this->koneksi)."<br>";
      }
    }
  }

?>
