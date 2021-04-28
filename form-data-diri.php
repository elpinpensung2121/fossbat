<?php 
include("../config/connect.php");
include("sessioncheck.php");
?>
<?php
$title = "FOSSBAT | Form Data Diri";
include("../partial/header.php");
if(isset($_GET['id_pemain'])){
    $id = $_GET['id_pemain'];
    $qry = sqlsrv_query($conn,"SELECT * from tbl_data_pemain WHERE id='$id'");
    while($res=sqlsrv_fetch_array($qry)){
        $nama_lengkap = $res['nama_lengkap'];
        $panggilan = $res['panggilan'];
        $tempat_lahir = $res['tempat_lahir'];
        $tgl_lahir = date("m/d/Y",strtotime($res['tgl_lahir']->format("m/d/Y")));
        $ssb = $res['ssb'];
        $ayah = $res['ayah'];
        $ibu = $res['ibu'];
        $alamat = $res['alamat'];
        $admin_pemain = explode(";",$res['admin_pemain']);
        $gol_darah = $res['gol_darah'];
        $kelamin = $res['kelamin'];
        $berat = $res['berat'];
        $tinggi = $res['tinggi'];
        $sd = $res['pendidikan1'];
        $smp = $res['pendidikan2'];
    }
} else {
    $id="new";
    $nama_lengkap = '';
    $panggilan = '';
    $tempat_lahir = '';
    $tgl_lahir = '';
    $ssb = '';
    $ayah = '';
    $ibu = '';
    $alamat = '';
    $admin_pemain = array();
    $gol_darah = '';
    $kelamin = '';
    $berat = '';
    $tinggi = '';
    $sd = '';
    $smp = '';
}
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">FORM DATA DIRI PEMAIN</h3>
                    </div>
                    <div class="card-body">
                        <div class="card">
                        <div class="card-header">
                                <h4 class="card-title">DATA DIRI</h4>
                        </div>
                            <div class="card-body">
                                <?php if(!isset($_GET{'tahap'})){ ?>
                                <form method="POST" id="datadiri" action="process/insert-data-diri.php">
                                <input type="hidden" id="id_pemain" name="id_pemain" value="<?= $id?>">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                            value="<?= $nama_lengkap ?>" placeholder="Isi Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="panggilan">Nama Panggilan</label>
                                        <input type="text" class="form-control" name="panggilan" id="panggilan"
                                        value="<?= $panggilan ?>" placeholder="Isi Nama Panggilan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat">Tempat/Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="tempat_lahir"
                                                value="<?= $tempat_lahir ?>" id="tempat_lahir" placeholder="Tempat Lahir" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir"
                                                value="<?= $tgl_lahir ?>" placeholder="Tanggal Lahir" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat"
                                        value="<?= $alamat ?>" placeholder="Isi Alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ssb">SSB Pemain Saat Ini</label>
                                        <input type="text" class="form-control" name="ssb" id="ssb"
                                        value="<?= $ssb ?>" placeholder="Isi SSB Pemain Saat Ini" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ayah">Nama Ayah</label>
                                        <input type="text" class="form-control" name="ayah" id="ayah"
                                        value="<?= $ayah ?>" placeholder="Isi Nama Ayah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ibu">Nama Ibu</label>
                                        <input type="text" class="form-control" name="ibu" id="ibu"
                                        value="<?= $ibu ?>" placeholder="Isi Nama Ibu" required>
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
                                                           <?php if(in_array("AKTE",$admin_pemain)){echo "checked";} ?> name="admin_pemain[]" id="admin_pemain">
                                                        <label class="form-check-label">AKTE</label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="checkbox" value="NISN" class="form-check-input"
                                                        <?php if(in_array("NISN",$admin_pemain)){echo "checked";} ?> name="admin_pemain[]" id="admin_pemain">
                                                        <label class="form-check-label">NISN</label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="checkbox" value="KK" class="form-check-input"
                                                        <?php if(in_array("KK",$admin_pemain)){echo "checked";} ?> name="admin_pemain[]" id="admin_pemain">
                                                        <label class="form-check-label">KK</label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="checkbox" value="RAPORT" class="form-check-input"
                                                        <?php if(in_array("RAPORT",$admin_pemain)){echo "checked";} ?> name="admin_pemain[]" id="admin_pemain">
                                                        <label class="form-check-label">RAPORT</label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="checkbox" value="PASPOR" class="form-check-input"
                                                        <?php if(in_array("PASPOR",$admin_pemain)){echo "checked";} ?> name="admin_pemain[]" id="admin_pemain">
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
                                                        <?php if($gol_darah=="A"){echo "checked";} ?> name="gol_darah" id="gol_darah">
                                                        <label class="form-check-label">A</label>
                                                    </div>
                                                    <div class="col-1">
                                                        <input type="radio" value="B" class="form-check-input"
                                                        <?php if($gol_darah=="B"){echo "checked";} ?> name="gol_darah" id="gol_darah">
                                                        <label class="form-check-label">B</label>
                                                    </div>
                                                    <div class="col-1">
                                                        <input type="radio" value="AB" class="form-check-input"
                                                        <?php if($gol_darah=="AB"){echo "checked";} ?> name="gol_darah" id="gol_darah">
                                                        <label class="form-check-label">AB</label>
                                                    </div>
                                                    <div class="col-1">
                                                        <input type="radio" value="O" class="form-check-input"
                                                        <?php if($gol_darah=="O"){echo "checked";} ?> name="gol_darah" id="gol_darah">
                                                        <label class="form-check-label">O</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group row">
                                                    <label for="kelamin" class="col-sm-4 col-form-label">Jenis
                                                        Kelamin</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="kelamin" id="kelamin"
                                                            required>
                                                            <option value="" disabled>Jenis Kelamin</option>
                                                            <option <?php if($kelamin=="Laki-laki"){echo "seleted";} ?> value="Laki-laki">Laki-laki</option>
                                                            <option <?php if($kelamin=="Perempuan"){echo "seleted";} ?> value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group row">
                                                    <label for="berat" class="col-sm-4 col-form-label">Berat
                                                        Badan</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control" name="berat"
                                                        value="<?= $berat ?>" id="berat" placeholder="Isi Berat Badan (kg)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group row">
                                                    <label for="tinggi" class="col-sm-4 col-form-label">Tinggi
                                                        Badan</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control" name="tinggi"
                                                        value="<?= $tinggi ?>" id="tinggi" placeholder="Isi Tinggi Badan">
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
                                                        value="<?= $sd ?>" placeholder="SD">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group row">
                                                    <label for="tinggi" class="col-sm-4 col-form-label">SMP</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="smp" id="smp"
                                                        value="<?= $smp ?>" placeholder="SMP">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input type="hidden" value="" name="aksi" id="aksi">
                                            <input type="submit" class="btn btn-primary"
                                                onclick="$('#aksi').val('simpan')" style="margin-top:5px" name="simpan"
                                                id="simpan" value="Simpan">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                                <?php } ?>
                            </div>
                        </div><!-- /.card -->
                        <section id="form2">
                        
                        </section>
                        <div class="text-center">
                        <a class="btn btn-danger btn-sm" href="daftar-pemain.php">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
include("../partial/footer.php");
?>
    <script>
    <?php if(isset($_GET['id_pemain'])){ ?>
    $(document).ready(function(){
        getform2non(<?=$id?>);
    });
    <?php } ?>
        $("input[name=tgl_lahir]").datepicker({
            autoclose: true
        });
        $("form#datadiri").submit(function (e) {
            e.preventDefault();
            var fd = new FormData(this);
            Swal.fire({
                title: 'Confirm',
                text: "Apa anda yakin untuk menyimpan?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No!',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve, reject) {
                        $.ajax({
                            type: "POST",
                            url: "process/insert-data-diri.php",
                            data: fd,
                            cache: false,
                            contentType: false,
                            processData: false
                        }).done(function (resp) {
                            var msg = resp.split("|");
                            if (msg[0] == 'error') {
                                swal.fire("Error!", msg[1], "error").then(
                                    function () {});
                            } else if (msg[0] == 'ok') {
                                swal.fire("OK!", "Berhasil Menambahkan!", "success")
                                    .then(function () {
                                        $("#id_pemain").val(msg[1]);
                                        getform2(msg[1]);
                                    });
                            } else {
                                swal.fire("ERROR!", resp, "error").then(
                                    function () {});
                            }
                        }).fail(function () {
                            swal.fire("Error!", "System Error!", "error");
                        });
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
        });
        function getform2(id){
            $.ajax({
                            type: "POST",
                            url: "process/form2-data-diri.php",
                            data: {
                                id:id,
                                },
                        }).done(function (resp) {
                            $("#form2").html(resp);
                            document.getElementById("form2").scrollIntoView({behavior: 'smooth'});
                        }).fail(function () {
                            swal.fire("Error!", "Failed to get form!", "error");
                        });
        }
        function getform2non(id){
            $.ajax({
                            type: "POST",
                            url: "process/form2-data-diri.php",
                            data: {
                                id:id,
                                },
                        }).done(function (resp) {
                            $("#form2").html(resp);
                        }).fail(function () {
                            swal.fire("Error!", "Failed to get form!", "error");
                        });
        }
    </script>