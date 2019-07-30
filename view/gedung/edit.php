<?php
include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/blank.php';

include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/model/kendaraan.php';
$kendaraan = new kendaraan($conn);
?>
<?php

  if(isset($hak_akses)){
    if($hak_akses==3){
      array_push($_SESSION['pesan'],['eror','Anda Tidak Memiliki Akses Kesini']);
      header("location:/peminjaman-aset/view/");
    }
  }

?>
<?php startblock('title') ?> Edit Kendaraan <?php endblock() ?>
<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="/peminjaman-aset/view/kendaraan">Kendaraan</a>
<li class="breadcrumb-item"><a href="#!">Edit</a>
<?php endblock() ?>
<?php startblock('breadcrumb-title') ?>
Edit Kendaraan
<?php endblock() ?>

<?php startblock('content') ?>
<div class="card">
    <div class="card-block">
        <form id="second" action="/peminjaman-aset/controller/kendaraanController.php?aksi=update" method="post" novalidate>
            <?php
              $aset_id = $_GET['aset_id'];
              foreach ($kendaraan->data($aset_id) as $data) {
            ?>
            <input type="hidden" value="<?php echo $aset_id;?>"  id="aset_id" name="aset_id">
            <?php include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/view/kendaraan/_field.php'; ?>
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
