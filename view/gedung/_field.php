<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Gedung</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="<?php if(isset($data['nama'])){echo $data['nama'];} ?>"  id="nama" name="nama" placeholder="" required>
        <span class="messages popover-valid"></span>
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal Pembukuan</label>
    <div class="col-sm-3">
        <input type="date" class="form-control" value="<?php if(isset($data['tahun_buku'])){echo $data['tahun_buku'];} ?>"  id="tahun_buku" name="tahun_buku" placeholder="" required>
        <span class="messages popover-valid"></span>
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-3">
        <input type="textArea" class="form-control" value="<?php if(isset($data['alamat'])){echo $data['alamat'];} ?>"  id="alamat" name="alamat" placeholder="" required>
        <span class="messages popover-valid"></span>
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kapasitas (orang)</label>
    <div class="col-sm-3">
        <input type="number" class="form-control" value="<?php if(isset($data['kapasitas'])){echo $data['kapasitas'];} ?>"  id="kapasitas" name="kapasitas" placeholder="" required>
        <span class="messages popover-valid"></span>
    </div>
</div>