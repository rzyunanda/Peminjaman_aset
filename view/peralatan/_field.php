<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Peralatan</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="<?php if(isset($data['nama'])){echo $data['nama'];} ?>"  id="nama" name="nama" placeholder="ex : infokus" required>
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

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-3">
        <input type="number" class="form-control" value="<?php if(isset($data['jumlah'])){echo $data['jumlah'];} ?>"  id="jumlah" name="jumlah" placeholder="" required>
        <span class="messages popover-valid"></span>
    </div>
</div>