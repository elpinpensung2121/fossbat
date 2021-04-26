<?php 
include("../config/connect.php");
?>
<?php
$title = "FOSSBAT | Form Data Diri";
include("../partial/header.php");
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">FORM DATA DIRI PEMAIN</h3>
                    </div>
                    <div class="card-body">
                        <?php if(!isset($_GET{'tahap'})){ ?>
                        <form method="POST">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                    placeholder="Isi Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="panggilan">Nama Panggilan</label>
                                <input type="text" class="form-control" name="panggilan" id="panggilan"
                                    placeholder="Isi Nama Panggilan" required>
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat/Tanggal Lahir</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                            placeholder="Tempat Lahir" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir"
                                            placeholder="Tanggal Lahir" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat"
                                    placeholder="Isi Alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="ssb">SSB Pemain Saat Ini</label>
                                <input type="text" class="form-control" name="ssb" id="ssb"
                                    placeholder="Isi SSB Pemain Saat Ini" required>
                            </div>
                            <div class="form-group">
                                <label for="ayah">Nama Ayah</label>
                                <input type="text" class="form-control" name="ayah" id="ayah"
                                    placeholder="Isi Nama Ayah" required>
                            </div>
                            <div class="form-group">
                                <label for="ibu">Nama Ibu</label>
                                <input type="text" class="form-control" name="ibu" id="ibu" placeholder="Isi Nama Ibu" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="admin_pemain">Administrasi Pemain</label>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-2">
                                                <input type="checkbox" value="AKTE" class="form-check-input"
                                                    name="admin_pemain[]" id="admin_pemain">
                                                <label class="form-check-label">AKTE</label>
                                            </div>
                                            <div class="col-2">
                                                <input type="checkbox" value="NISN" class="form-check-input"
                                                    name="admin_pemain[]" id="admin_pemain">
                                                <label class="form-check-label">NISN</label>
                                            </div>
                                            <div class="col-2">
                                                <input type="checkbox" value="KK" class="form-check-input"
                                                    name="admin_pemain[]" id="admin_pemain">
                                                <label class="form-check-label">KK</label>
                                            </div>
                                            <div class="col-2">
                                                <input type="checkbox" value="RAPORT" class="form-check-input"
                                                    name="admin_pemain[]" id="admin_pemain">
                                                <label class="form-check-label">RAPORT</label>
                                            </div>
                                            <div class="col-2">
                                                <input type="checkbox" value="PASPOR" class="form-check-input"
                                                    name="admin_pemain[]" id="admin_pemain">
                                                <label class="form-check-label">PASPOR</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="admin_pemain">Golongan Darah</label>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="radio" value="A" class="form-check-input"
                                                    name="gol_darah" id="gol_darah">
                                                <label class="form-check-label">A</label>
                                            </div>
                                            <div class="col-1">
                                                <input type="radio" value="B" class="form-check-input"
                                                    name="gol_darah" id="gol_darah">
                                                <label class="form-check-label">B</label>
                                            </div>
                                            <div class="col-1">
                                                <input type="radio" value="AB" class="form-check-input"
                                                    name="gol_darah" id="gol_darah">
                                                <label class="form-check-label">AB</label>
                                            </div>
                                            <div class="col-1">
                                                <input type="radio" value="O" class="form-check-input"
                                                    name="gol_darah" id="gol_darah">
                                                <label class="form-check-label">O</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label for="kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="kelamin" id="kelamin" required>
                                                    <option value="" selected disabled>Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label for="berat" class="col-sm-4 col-form-label">Berat Badan</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="berat" id="berat"
                                                    placeholder="Isi Berat Badan (kg)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label for="tinggi" class="col-sm-4 col-form-label">Tinggi Badan</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="tinggi" id="tinggi"
                                                    placeholder="Isi Tinggi Badan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6>Riwayat Pendidikan Formal</h6>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label for="berat" class="col-sm-4 col-form-label">SD</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="sd" id="sd"
                                                    placeholder="SD">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label for="tinggi" class="col-sm-4 col-form-label">SMP</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="smp" id="smp"
                                                    placeholder="SMP">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" value="" name="aksi" id="aksi">
                                    <input type="submit" class="btn btn-warning" onclick="$('#aksi').val('lanjut')"
                                        style="margin-top:5px" name="simpan" id="simpan" value="Simpan & Lanjut">
                                    <input type="submit" class="btn btn-primary" onclick="$('#aksi').val('simpan')"
                                        style="margin-top:5px" name="simpan" id="simpan" value="Simpan">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                        <?php } ?>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <?php
include("../partial/footer.php");
?>