<?php 
include("../config/connect.php");
include("sessioncheck.php");
?>
<?php
$title = "FOSSBAT | Daftar Pemain";
include("../partial/header.php");
?>
<div class="content-wrapper">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">DAFTAR PEMAIN</h3>
        </div>
        <div class="card-body">
            <div class="text-right mb-2">
                <a href="form-data-diri.php" class="btn btn-success">Tambah</a>
            </div>
            <table id="table1" class="table table-bordered table-striped table-sm dtr-inline" role="grid">
                <thead>
                    <tr>
                        <th>Nama Pemain</th>
                        <th>SSB</th>
                        <th>Gender</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<?php
include("../partial/footer.php");
?>
<script>
    var table = $("#table1").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "process/get_daftar-pemain.php",
            /*data: {
              cat: function() { return $("#Category").val() },
              site: function() { return $("#Site").val() },
              },*/
            "type": "POST"
        },
        'columns': [{
                'data': 'nama_lengkap'
            },
            {
                'data': 'ssb'
            },
            {
                'data': 'kelamin'
            },
            {
                'data': 'tempat_lahir'
            },
            {
                'data': 'tgl_lahir'
            },
            {
                'data': 'id',
                render: function (data, type, row) {
                    return "<div class='text-center'><div class='btn-group'><button onclick='edit(`" +
                        data +
                        "`)' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></button><button type='button' onclick='delete_data(`" +
                        data +
                        "`)' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></button></div></div>";
                }
            },
        ],
        'order': [
            [0, 'asc']
        ],
    });
    function edit(id){
        location.href="form-data-diri.php?id_pemain="+id;
    }
</script>