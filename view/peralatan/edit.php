<?php
include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/blank.php';
include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/model/peralatan.php';
$peralatan = new peralatan($conn);
?>
<?php

  if(isset($hak_akses)){
    if($hak_akses==3){
      array_push($_SESSION['pesan'],['eror','Anda Tidak Memiliki Akses Kesini']);
      header("location:/peminjaman-aset/view/");
    }
  }

?>
<?php startblock('title') ?> Edit Peralatan <?php endblock() ?>
<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="/peminjaman-aset/view/kendaraan">Peraltan</a>
<li class="breadcrumb-item"><a href="#!">Edit</a>
<?php endblock() ?>
<?php startblock('breadcrumb-title') ?>
Edit Peralatan
<?php endblock() ?>

<?php startblock('content') ?>
<div class="card">
    <div class="card-block">
        <form id="second" action="/peminjaman-aset/controller/peralatanController.php?aksi=update" method="post" novalidate>
            <?php
              $id = $_GET['id'];
              $sql = "SELECT * from aset where id='$id'";

              $mysqli_query= mysqli_query($conn,$sql);
              while($data = mysqli_fetch_array($mysqli_query)){
            ?>
            <input type="hidden" value="<?php echo $id;?>"  id="id" name="id">
            <?php include $_SERVER['DOCUMENT_ROOT'].'/peminjaman-aset/view/peralatan/_field.php'; ?>
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
