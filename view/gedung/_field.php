<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Gedung</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="<?php if(isset($data['nama'])){echo $data['nama'];} ?>"  id="nama" name="nama" placeholder="ex : Bus isi 30" required>
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="<?php if(isset($data['kapasitas'])){echo $data['kapasitas'];} ?>"  id="kapasitas" name="kapasitas" placeholder="" required>
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Bahan Bakar</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="<?php if(isset($data['bahan_bakar'])){echo $data['bahan_bakar'];} ?>"  id="bahan_bakar" name="bahan_bakar" placeholder="" required>
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal Pembukuan</label>
    <div class="col-sm-3">
        <input type="date" class="form-control" value="<?php if(isset($data['tahun_buku'])){echo $data['tahun_buku'];} ?>"  id="tahun_buku" name="tahun_buku" placeholder="BA 4925 EZ" required>
        <span class="messages popover-valid"></span>
    </div>
</div>
