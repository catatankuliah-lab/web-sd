<?php
    $id_url = $_GET['mpid'];
    $result_query_kkm = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE id_matapelajaran=$id_url");
    while($data_kkm = mysqli_fetch_array($result_query_kkm)) {
        $id = $data_kkm['id_matapelajaran'];
        $kkm = $data_kkm['kkm'];
        $nama = $data_kkm['nama_matapelajaran'];
    }
?>
    <section class="content-wrapper mb-3">
        <div class="row mt-5 p-2">
          <div class="col-md-12">
            <div class="card card-primary mt-3">
            <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Perbaharui Nilai KKM</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <form id="form-kkm" action="guru.php?" method="get">
                        <div class="card-body">
                            <div class="form-group">
                            <label for="labelNamaSiswa">Nilai KKM</label>
                            <input type="hidden" value="<?= $id ;?>" name="mpid">
                            <input type="hidden" value="4" name="page">
                            <input type="text" pattern="\d*" maxlength="3" name="kkm" class="form-control" id="labelNamaSiswa" placeholder="Masukan Nilai" value="<?= $kkm ;?>" required length="3">
                            </div>
                            <div class="form-group text-right">
                                <button type="button" id="update" name="update" class="btn btn-primary mt-2" style="width: 200px;" onclick="konfirmasi()">Perbaharui</button>
                            </div>
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

    var form = document.getElementById("form-kkm");
    
    Swal.fire({
      title: "Apakah Anda Yakin ?",
      text: "Nilai KKM Mata Pelajaran <?= $nama ;?> Akan Diperbaharui",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "Batalkan",
      confirmButtonText: "Perbaharui"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: 'Berhasil',
            text: 'Nilai KKM Mata Pelajaran <?= $nama ;?> Berhasil Diperbaharui',
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