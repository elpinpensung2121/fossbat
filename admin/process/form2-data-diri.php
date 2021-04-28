<?php
include("../../config/connect.php");

$id = $_POST['id'];
?>
<div class="card">
    <div class="card-header">
            <h4 class="card-title">DOKUMEN DATA DIRI</h4>
    </div>
    <div class="card-body">
        <?php 
        $qry=sqlsrv_query($conn,"SELECT gambar FROM tbl_data_pemain WHERE id='$id'");
        $res=sqlsrv_fetch_array($qry);
        $gambar = $res['gambar'];
        ?>
        <div class="text-center">
            <div class="row">
                <div class="col-md-4">
                <div class="card">
        <div class="card-header">
            <h4 class="card-title">Foto Pemain</h4>
        </div>
            <div class="card-body">
            <div class="filtr-item">
                        <img src="../assets/gambar/<?= $gambar ?>" class="img-fluid mb-2" alt="Foto"/>
                </div>
            </div>
        </div>
                </div>
            </div>
        
        
            <a class="btn btn-info btn-sm" data-target="#modalgambar" data-toggle="modal">
                <i class="fa fa-upload"></i> Upload
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
            <h4 class="card-title">RIWAYAT PENDIDIKAN SEKOLAH SEPAKBOLA/AKADEMI SEPAKBOLA</h4>
    </div>
    <div class="card-body">
        <div class="text-right">
        <a class="btn btn-info btn-sm" data-target="#modalpendidikan" data-toggle="modal">
                <i class="fa fa-plus"></i> Tambah
              </a>
        </div>
        <table id="tbl_pendidikan" class="table table-bordered table-striped table-sm dtr-inline" role="grid">
            <thead>
                <th>Nama SSB</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
                <th>Tahun</th>
                <th>Posisi</th>
                <th>Action</th>
            </thead>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-header">
            <h4 class="card-title">PRESTASI SEPAKBOLA</h4>
    </div>
    <div class="card-body">
    <div class="text-right">
        <a class="btn btn-info btn-sm" data-target="#modalprestasi" data-toggle="modal">
                <i class="fa fa-plus"></i> Tambah
              </a>
        </div>
        <table id="tbl_prestasi" class="table table-bordered table-striped table-sm dtr-inline" role="grid">
            <thead>
                <th>Nama SSB</th>
                <th>Kompetisi</th>
                <th>Prestasi</th>
                <th>Tahun</th>
                <th>Posisi</th>
                <th>Action</th>
            </thead>
        </table>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="modalgambar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload Gambar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="formgambar">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
        <input type="hidden" id="id_hidden" name="id_hidden" value="<?= $id ?>">
            <label>Upload File</label><br>
            <input type="file" class="form-control" name="fileUpload" accept="image/*" required>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" name="submit"><i class="fa fa-upload"></i> Upload</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="modalpendidikan">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Riwayat Pendidikan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="form-pendidikan">
      <!-- Modal body -->
      <div class="modal-body">
      <input type="hidden" id="id_hidden" name="id_hidden" value="<?= $id ?>">
        <div class="row">
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Nama SSB</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="ssb" required id="ssb" placeholder="Isi Nama SSB">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Kabupaten</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kabupaten" required id="kabupaten" placeholder="Isi Kabupaten">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Provinsi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="provinsi" required id="provinsi" placeholder="Isi Provinsi">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Tahun</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="tahun" required id="tahun" placeholder="Isi Tahun">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Posisi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="posisi" required id="posisi" placeholder="Isi Posisi">
                    </div>
                </div>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="modalprestasi">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Prestasi Sepakbola</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="form-prestasi">
      <!-- Modal body -->
      <div class="modal-body">
      <input type="hidden" id="id_hidden" name="id_hidden" value="<?= $id ?>">
        <div class="row">
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Nama SSB</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="ssb" required id="ssb" placeholder="Isi Nama SSB">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Kompetisi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kompetisi" required id="kompetisi" placeholder="Isi Kompetisi">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Prestasi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="prestasi" required id="prestasi" placeholder="Isi Prestasi">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Tahun</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="tahun" required id="tahun" placeholder="Isi Tahun">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group row">
                    <label for="ssb" class="col-sm-4 col-form-label">Posisi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="posisi" required id="posisi" placeholder="Isi Posisi">
                    </div>
                </div>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
      </form>

    </div>
  </div>
</div>
<script>
var table2 = $("#tbl_pendidikan").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "process/get_daftar-pemain-pendidikan.php",
            data: {
              id: function() { return $("#id_pemain").val() },
              },
            "type": "POST"
        },
        'columns': [{
                'data': 'ssb'
            },
            {
                'data': 'kabupaten'
            },
            {
                'data': 'provinsi'
            },
            {
                'data': 'tahun'
            },
            {
                'data': 'posisi'
            },
            {
                'data': 'id',
                render: function (data, type, row) {
                    return "<div class='text-center'><div class='btn-group'><button type='button' onclick='delete_pendidikan(`" +
                        data +
                        "`)' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></button></div></div>";
                }
            },
        ],
        'order': [
            [0, 'asc']
        ],
    });
    var table3 = $("#tbl_prestasi").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "process/get_daftar-pemain-prestasi.php",
            data: {
              id: function() { return $("#id_pemain").val() },
              },
            "type": "POST"
        },
        'columns': [{
                'data': 'ssb'
            },
            {
                'data': 'kompetisi'
            },
            {
                'data': 'prestasi'
            },
            {
                'data': 'tahun'
            },
            {
                'data': 'posisi'
            },
            {
                'data': 'id',
                render: function (data, type, row) {
                    return "<div class='text-center'><div class='btn-group'><button type='button' onclick='delete_prestasi(`" +
                        data +
                        "`)' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></button></div></div>";
                }
            },
        ],
        'order': [
            [0, 'asc']
        ],
    });
    $("form#form-pendidikan").submit(function (e) {
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
                            url: "process/insert-data-diri-pendidikan.php",
                            data: {
                                fd :fd,
                            },
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
                                        $("#modalpendidikan").modal("hide");
                                        $("input[name=ssb]").val('');
                                        $("input[name=kabupaten]").val('');
                                        $("input[name=provinsi]").val('');
                                        $("input[name=tahun]").val('');
                                        $("input[name=posisi]").val('');
                                        table2.ajax.reload(null, false);
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
        $("form#form-pendidikan").submit(function (e) {
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
                            url: "process/insert-data-diri-pendidikan.php",
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
                                        $("#modalpendidikan").modal("hide");
                                        $("input[name=ssb]").val('');
                                        $("input[name=kabupaten]").val('');
                                        $("input[name=provinsi]").val('');
                                        $("input[name=tahun]").val('');
                                        $("input[name=posisi]").val('');
                                        table2.ajax.reload(null, false);
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
        $("form#form-prestasi").submit(function (e) {
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
                            url: "process/insert-data-diri-prestasi.php",
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
                                        $("#modalprestasi").modal("hide");
                                        $("input[name=ssb]").val('');
                                        $("input[name=kompetisi]").val('');
                                        $("input[name=prestasi]").val('');
                                        $("input[name=tahun]").val('');
                                        $("input[name=posisi]").val('');
                                        table3.ajax.reload(null, false);
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
        function delete_prestasi(id){
        Swal.fire({
          title: 'Warning!',
          text: "Apa anda yakin untuk menghapus?" ,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#dc3545',
          confirmButtonText: 'Yes!',
          cancelButtonText: 'No!',
          showLoaderOnConfirm: true,
          preConfirm: function() {
          return new Promise(function(resolve, reject) {
              $.ajax({
                  type: "POST",
                  url: "process/del_data_pemain-prestasi.php",
                  data: {
                    id: id
                  }
              }).done(function(resp){
                var msg = resp.split("|");
                  if(msg[0] == 'error'){
                    swal.fire("Error!",msg[1],"error").then(function(){
                      
                    });
                  }else if(msg[0] == 'ok'){
                      swal.fire("OK!", "Data Terhapus!","success").then(function(){
                      table3.ajax.reload(null, false);
                  });
                  }else{
                swal.fire("ERROR!",resp,"error").then(function(){
                    
                  });
                }
              });
          })
          },
          allowOutsideClick: () => !Swal.isLoading()
      });
      }
      function delete_pendidikan(id){
        Swal.fire({
          title: 'Warning!',
          text: "Apa anda yakin untuk menghapus?" ,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#dc3545',
          confirmButtonText: 'Yes!',
          cancelButtonText: 'No!',
          showLoaderOnConfirm: true,
          preConfirm: function() {
          return new Promise(function(resolve, reject) {
              $.ajax({
                  type: "POST",
                  url: "process/del_data_pemain-pendidikan.php",
                  data: {
                    id: id
                  }
              }).done(function(resp){
                var msg = resp.split("|");
                  if(msg[0] == 'error'){
                    swal.fire("Error!",msg[1],"error").then(function(){
                      
                    });
                  }else if(msg[0] == 'ok'){
                      swal.fire("OK!", "Data Terhapus!","success").then(function(){
                      table2.ajax.reload(null, false);
                  });
                  }else{
                swal.fire("ERROR!",resp,"error").then(function(){
                    
                  });
                }
              });
          })
          },
          allowOutsideClick: () => !Swal.isLoading()
      });
      }
      $("form#formgambar").submit(function(e){
        e.preventDefault();
        var fd = new FormData(this);
        Swal.fire({
          title: 'Confirm',
          text: "Are you sure upload right file?(Previous data will be truncated!)" ,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#dc3545',
          confirmButtonText: 'Yes!',
          cancelButtonText: 'No!',
          showLoaderOnConfirm: true,
          preConfirm: function() {
          return new Promise(function(resolve, reject) {
            $.ajax({
              type: "POST",
              url: "process/insert-data-diri-gambar.php",
              data: fd,
              cache: false,
              contentType: false,
              processData: false
            }).done(function(resp){
              var msg = resp.split("|");
              if(msg[0] == 'error'){
                swal.fire("Error!",msg[1],"error").then(function(){
                  
                });
              }else if(msg[0] == 'ok'){
                swal.fire("OK!",msg[1],"success").then(function(){
                    $("#modalgambar").modal("hide");
                    $("input[name=fileUpload]").val('');
                    getform2non(<?=$id?>);
                });
              }else{
                swal.fire("ERROR!",resp,"error").then(function(){
                  
                });
              }
            }).fail(function(){
              swal.fire("Error!","System Error!","error");
            });
          })
          },
          allowOutsideClick: () => !Swal.isLoading()
      });
    });
</script>