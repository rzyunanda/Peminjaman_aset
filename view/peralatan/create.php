<?php include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/blank.php'; ?>
<?php

  if(isset($hak_akses)){
    if($hak_akses==3){
      array_push($_SESSION['pesan'],['eror','Anda Tidak Memiliki Akses Kesini']);
      header("location:/peminjaman-aset/view/");
    }
  }
?>
<?php startblock('title') ?> Create Peralatan <?php endblock() ?>
<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="/peminjaman-aset/view/peralatan">Peralatan</a>
<li class="breadcrumb-item"><a href="#!">Create</a>
<?php endblock() ?>
<?php startblock('breadcrumb-title') ?>
Create Kendaraan
<?php endblock() ?>

<?php startblock('content') ?>
<div class="card">
    <div class="card-block">
        <form id="second" action="/peminjaman-aset/controller/peralatanController.php?aksi=create" method="post" novalidate>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/view/peralatan/_field.php'; ?>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endblock() ?>
