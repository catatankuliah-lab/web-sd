<?php
    $idg = $_GET['idg'];
    $query_guru = mysqli_query($conn, "SELECT * FROM table_user WHERE id_user=$idg");
    $data_guru = mysqli_fetch_assoc($query_guru);
?>
    <section class="content-wrapper mb-3">
        <div class="row mt-5 p-2">
          <div class="col-md-12">
            <div class="card card-primary mt-3">
            <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Edit Data Guru</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <form id="form-guru" action="admin.php?" method="get">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="labelUsername">Username</label>
                                <input type="hidden" value="7" name="page">
                                <input type="hidden" value="<?=$idg;?>" name="i">
                                <input type="text" name="a" class="form-control" id="labelUsername" placeholder="Masukan Username" required value="<?=$data_guru['username'];?>">
                            </div>
                            <div class="form-group">
                                <label for="labelPassword">Password</label>
                                <input type="password" name="b" class="form-control" id="labelPassword" placeholder="Masukan Password" required value="<?=$data_guru['password'];?>">
                            </div>
                            <div class="form-group">
                                <label for="labelTahun">Tahun Ajaran</label>
                                <input type="text" name="c" class="form-control" id="labelTahun" placeholder="Masukan Tahun Ajaran" required value="<?=$data_guru['tahun'];?>">
                            </div>
                            <div class="form-group">
                                <label for="labelNIP">NIP</label>
                                <input type="text" name="d" class="form-control" id="labelNIP" placeholder="Masukan NIP" required value="<?=$data_guru['nip'];?>">
                            </div>
                            <div class="form-group">
                                <label for="labelNama">Nama Lengkap</label>
                                <input type="text" name="e" class="form-control" id="labelNama" placeholder="Masukan Nama Lengkap" required value="<?=$data_guru['nama_guru'];?>" >
                            </div>
                            <div class="form-group">
                                <label for="labelNama">Kelas</label>
                                <div class="form-check">
<?php
                                    $k1 = "";
                                    $k2 = "";
                                    $k3 = "";
                                    $k4 = "";
                                    $k5 = "";
                                    $k6 = "";
                                    if($data_guru['kelas'] == "1") {
                                        $k1 = "checked";
                                        $k2 = "";
                                        $k3 = "";
                                        $k4 = "";
                                        $k5 = "";
                                        $k6 = "";
                                    } else if($data_guru['kelas'] == "2") {
                                        $k1 = "";
                                        $k2 = "checked";
                                        $k3 = "";
                                        $k4 = "";
                                        $k5 = "";
                                        $k6 = "";
                                    } else if($data_guru['kelas'] == "3") {
                                        $k1 = "";
                                        $k2 = "";
                                        $k3 = "checked";
                                        $k4 = "";
                                        $k5 = "";
                                        $k6 = "";
                                    } else if($data_guru['kelas'] == "4") {
                                        $k1 = "";
                                        $k2 = "";
                                        $k3 = "";
                                        $k4 = "checked";
                                        $k5 = "";
                                        $k6 = "";
                                    } else if($data_guru['kelas'] == "5") {
                                        $k1 = "";
                                        $k2 = "";
                                        $k3 = "";
                                        $k4 = "";
                                        $k5 = "checked";
                                        $k6 = "";
                                    } else {
                                        $k1 = "";
                                        $k2 = "";
                                        $k3 = "";
                                        $k4 = "";
                                        $k5 = "";
                                        $k6 = "checked";
                                    }
?>
                                    <div class="row">
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="1" <?=$k1;?> >
                                            <label class="form-check-label">Kelas 1</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="2" <?=$k2;?>>
                                            <label class="form-check-label">Kelas 2</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="3" <?=$k3;?>>
                                            <label class="form-check-label">Kelas 3</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="4" <?=$k4;?>>
                                            <label class="form-check-label">Kelas 4</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="5" <?=$k5;?>>
                                            <label class="form-check-label">Kelas 5</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="6" <?=$k6;?>>
                                            <label class="form-check-label">Kelas 6</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right mr-4">
                            <button type="button" id="update" name="update" class="btn btn-primary m-3" style="width: 200px;" onclick="konfirmasi()">Perbaharui</button>
                            <button type="button" id="update" name="update" class="btn btn-danger ml-3  mt-3 mb-3" style="width: 200px;" onclick="hapus()">Hapus Data</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

<script>
  function konfirmasi() {

    var form = document.getElementById("form-guru");
    
    Swal.fire({
      title: "Apakah Anda Yakin ?",
      text: "Data Guru Akan Perbaharui",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "Batalkan",
      confirmButtonText: "Tambahkan"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: 'Berhasil',
            text: 'Data Berhasil Diperbaharui',
            icon:'success',
            showConfirmButton: false,
            timer: 2000,
            }).then((result) => {
                form.submit();
            });
        }
    })
  }
</script>