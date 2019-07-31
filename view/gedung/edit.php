<?php
include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/blank.php';
include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/model/gedung.php';
$gedung = new gedung($conn);
?>
<?php

  if(isset($hak_akses)){
    if($hak_akses==3){
      array_push($_SESSION['pesan'],['eror','Anda Tidak Memiliki Akses Kesini']);
      header("location:/peminjaman-aset/view/");
    }
  }

?>
<?php startblock('title') ?> Edit Data Gedung <?php endblock() ?>
<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="/peminjaman-aset/view/gedung">Gedung</a>
<li class="breadcrumb-item"><a href="#!">Edit</a>
<?php endblock() ?>
<?php startblock('breadcrumb-title') ?>
Edit Data Gedung
<?php endblock() ?>

<?php startblock('content') ?>
<div class="card">
    <div class="card-block">
        <form id="second" action="/peminjaman-aset/controller/gedungController.php?aksi=update" method="post" novalidate>
            <?php
              $aset_id = $_GET['aset_id'];
              $sql = "SELECT aset.*,gedung.* FROM aset join gedung on aset.id=gedung.aset_id WHERE aset.id='$aset_id'";
              $mysqli_query= mysqli_query($conn,$sql);
              while($data = mysqli_fetch_array($mysqli_query)){
            ?>
            <input type="hidden" value="<?php echo $aset_id;?>"  id="aset_id" name="aset_id">
            <?php include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/view/gedung/_field.php'; ?>
            <?php } ?>
            <div class="row">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endblock() ?>
