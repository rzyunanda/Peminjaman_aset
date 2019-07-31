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
<?php startblock('title') ?> Gedung Management <?php endblock() ?>

<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="#!">Gedung Management</a>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Gedung Management
<?php endblock() ?>

<?php startblock('content') ?>
<div class="card">
  <div class="card-block">
      <div class="dt-responsive table-responsive">
          <table id="tblgedung" class="table table-striped table-bordered nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Kapasitas</th>
                      <th>alamat</th>
                      <?php if($hak_akses=="admin" || $hak_akses=="operator"){ ?>
                      <th style="width:100px">Action</th>
                      <?php } ?>
                  </tr>
              </thead>
              <tbody>
              <?php $no=1;
                  foreach ($gedung->data() as $data) {
                   
                ?>
                  <tr>
                      <td><?php echo $no;?></td>  
                      <td><?php echo $data['nama'];?></td>
                      <td><?php echo $data['alamat'];?></td>
                      <td><?php echo $data['kapasitas'];?></td>
                      <td style="width:100px">
                        <?php if($hak_akses=="admin" || $hak_akses=="operator"){ ?>
                        <a href="/peminjaman-aset/view/gedung/edit.php?aset_id=<?php echo $data['aset_id']; ?>" class="btn btn-primary btn-mini waves-effect waves-light">Edit</a>
                        <?php } ?>
                        <?php if($hak_akses=="admin" || $hak_akses=="operator"){ ?>
                        <a href="/peminjaman-aset/controller/kendaraanController.php?aksi=delete" class="btn btn-danger btn-mini waves-effect waves-light" onclick="hapus('<?php echo $data['aset_id']; ?>')">Delete</a>
                        <?php } ?>
                      </td>
                  </tr>
                <?php  $no++; } ?>
              </tbody>
          </table>
          <form class="" id="formdelete" style="display:none" action="/peminjaman-aset/controller/gedungController.php?aksi=delete" method="post">
            <input type="text" name="aset_id" value="" id="delete_id">
          </form>
                </div>
            </div>
          </div>
<?php endblock() ?>

<?php startblock('table') ?>
  <!-- info lebih lanjut bisa di cek di : -->
  <!--editor/assets/pages/data-table/js/data-table-custom.js"-->
  <script type="text/javascript">
      $('#tblgedung').DataTable(
        {
        "info":     false,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data Gedung',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              window.location.assign("/peminjaman-aset/view/gedung/create.php");
            }
        },
        {
            extend: 'copy',
            className: 'btn-inverse',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'print',
            className: 'btn-inverse',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'excel',
            className: 'btn-inverse',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'pdf',
            className: 'btn-inverse',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        }]
      });
  </script>

  <script type="text/javascript">
    function hapus(id) {
      if(confirm('yakin ingin menghapus data ini?') == true){
        document.getElementById('delete_id').value = id;
        document.getElementById('formdelete').submit();
      }
    }
  </script>
<?php endblock() ?>
