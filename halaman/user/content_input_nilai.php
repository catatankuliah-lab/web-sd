<?php
    $id_url = $_GET['id'];
    $kelas = $_SESSION['kelas'];
    $result_query_li = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE kelas=$kelas ORDER BY id_matapelajaran ASC");
    $result_query_nilai_matapelajaran = mysqli_query($conn, "SELECT table_nilai_matapelajaran.*, table_siswa.nama_siswa FROM table_nilai_matapelajaran INNER JOIN table_siswa ON table_nilai_matapelajaran.id_siswa = table_siswa.id_siswa WHERE id=$id_url");
    while($data_nilai_matapelajaran = mysqli_fetch_array($result_query_nilai_matapelajaran)) {
        $id = $data_nilai_matapelajaran['id'];
        $mpid = $data_nilai_matapelajaran['id_matapelajaran'];
        $nama = $data_nilai_matapelajaran['nama_siswa'];
        $nilai_harian_1 = $data_nilai_matapelajaran['nilai_harian_1'];
        $nilai_harian_2 = $data_nilai_matapelajaran['nilai_harian_2'];
        $nilai_harian_3 = $data_nilai_matapelajaran['nilai_harian_3'];
        $nilai_pts_1 = $data_nilai_matapelajaran['nilai_pts_1'];
        $nilai_pts_2 = $data_nilai_matapelajaran['nilai_pts_2'];
        $nilai_pts_3 = $data_nilai_matapelajaran['nilai_pts_3'];
        $nilai_pas_1 = $data_nilai_matapelajaran['nilai_pas_1'];
        $nilai_pas_2 = $data_nilai_matapelajaran['nilai_pas_2'];
        $nilai_pas_3 = $data_nilai_matapelajaran['nilai_pas_3'];
        $nilai_kd_1 = $data_nilai_matapelajaran['nilai_kd_1'];
        $nilai_kd_2 = $data_nilai_matapelajaran['nilai_kd_2'];
        $nilai_kd_3 = $data_nilai_matapelajaran['nilai_kd_3'];
        $predikat = $data_nilai_matapelajaran['predikat'];
    }
    $nilai_angka = ($nilai_harian_1 + $nilai_harian_2 + $nilai_harian_3 + $nilai_pts_1 + $nilai_pts_2 + $nilai_pts_3 + $nilai_pas_1 + $nilai_pas_2 + $nilai_pas_3 + $nilai_kd_1 + $nilai_kd_2 +$nilai_kd_3) / 12;
?>
<section class="content-wrapper mb-3">
    <form id="form-nilai" action="guru.php?" method="get">
        <div class="row mt-5 p-2">
          <div class="col-md-12">
            <div class="card card-primary mt-3">
            <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Data Siswa</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelNamaSiswa">Nama Siswa</label>
                      <input type="text" name="nama_siswa" class="form-control" id="labelNamaSiswa" placeholder="Masukan Nilai" value="<?= $nama ;?>" required readonly>
                      <input type="hidden" name="id" value="<?=$id;?>">
                      <input type="hidden" name="mpid" value="<?=$mpid;?>">
                      <input type="hidden" name="page" value="5">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai Harian</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelHarian1">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_harian_1" class="form-control" id="labelHarian1" placeholder="Masukan Nilai" value="<?= $nilai_harian_1 ;?>" required onchange="updateNilai()">
                    </div>
                    <div class="form-group">
                      <label for="labelHarian2">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_harian_2" class="form-control" id="labelHarian2" placeholder="Masukan Nilai" value="<?= $nilai_harian_2 ;?>" required onchange="updateNilai()">
                    </div>
                    <div class="form-group">
                      <label for="labelHarian3">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_harian_3" class="form-control" id="labelHarian3" placeholder="Masukan Nilai" value="<?= $nilai_harian_3 ;?>" required onchange="updateNilai()">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai PTS</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelPTS1">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_pts_1" class="form-control" id="labelPTS1" placeholder="Masukan Nilai" value="<?= $nilai_pts_1 ;?>" required onchange="updateNilai()">
                    </div>
                    <div class="form-group">
                      <label for="labelPTS2">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_pts_2" class="form-control" id="labelPTS2" placeholder="Masukan Nilai" value="<?= $nilai_pts_2 ;?>" required onchange="updateNilai()">
                    </div>
                    <div class="form-group">
                      <label for="labelPTS3">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_pts_3" class="form-control" id="labelPTS3" placeholder="Masukan Nilai" value="<?= $nilai_pts_3 ;?>" required onchange="updateNilai()">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai PAS</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelPAS1">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_pas_1" class="form-control" id="labelPAS1" placeholder="Masukan Nilai" value="<?= $nilai_pas_1 ;?>" required onchange="updateNilai()">
                    </div>
                    <div class="form-group">
                      <label for="labelPAS2">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_pas_2" class="form-control" id="labelPAS2" placeholder="Masukan Nilai" value="<?= $nilai_pas_2 ;?>" required onchange="updateNilai()">
                    </div>
                    <div class="form-group">
                      <label for="labelPAS13">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_pas_3" class="form-control" id="labelPAS3" placeholder="Masukan Nilai" value="<?= $nilai_pas_3 ;?>" required onchange="updateNilai()">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai KD</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelKD1">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_kd_1" class="form-control" id="labelKD1" placeholder="Masukan Nilai" value="<?= $nilai_kd_1 ;?>" required onchange="updateNilai()">
                    </div>
                    <div class="form-group">
                      <label for="labelKD2">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_kd_2" class="form-control" id="labelKD2" placeholder="Masukan Nilai" value="<?= $nilai_kd_2 ;?>" required onchange="updateNilai()">
                    </div>
                    <div class="form-group">
                      <label for="labelKD3">Tema 3.1</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai_kd_3" class="form-control" id="labelKD3" placeholder="Masukan Nilai" value="<?= $nilai_kd_3 ;?>" required onchange="updateNilai()">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai dan Predikat</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelNilai">Nilai Angka</label>
                      <input type="text" pattern="\d*" maxlength="3" name="nilai" class="form-control" id="labelNilai" placeholder="Masukan Nilai" value="<?= round($nilai_angka, 0) ;?>" required readonly onclick="updateNilai()">
                    </div>
                    <div class="form-group">
                      <label for="labelPredikat">Predikat</label>
                      <input type="text" name="predikat" class="form-control" id="labelPredikat" placeholder="Masukan Nilai" value="<?= $predikat ;?>" required readonly>
                    </div>
                    <div class="form-group text-right">
                      <button type="button" id="Update" class="btn btn-primary mt-2" style="width: 200px;" onclick="konfirmasi()">Perbaharui</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>

<script>
  var form = document.getElementById("form-nilai");

  function updateNilai() {
    var nh1 = document.getElementById("labelHarian1").value ;
    var nh2 = document.getElementById("labelHarian2").value ;
    var nh3 = document.getElementById("labelHarian3").value ;
    var nt1 = document.getElementById("labelPTS1").value ;
    var nt2 = document.getElementById("labelPTS2").value ;
    var nt3 = document.getElementById("labelPTS3").value ;
    var na1 = document.getElementById("labelPAS1").value ;
    var na2 = document.getElementById("labelPAS2").value ;
    var na3 = document.getElementById("labelPAS3").value ;
    var kd1 = document.getElementById("labelKD1").value ;
    var kd2 = document.getElementById("labelKD2").value ;
    var kd3 = document.getElementById("labelKD3").value ;
    document.getElementById("labelNilai").value=(Number(nh1)+Number(nh2)+Number(nh3)+Number(nt1)+Number(nt2)+Number(nt3)+Number(na1)+Number(na2)+Number(na3)+Number(kd1)+Number(kd2)+Number(kd3))/12;
  }

  function konfirmasi() {
    Swal.fire({
      title: "Apakah Anda Yakin ?",
      text: "Nilai <?= $nama ;?> Akan Diperbaharui",
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
          text: 'Data Nilai, <?= $nama ;?> Berhasil Diperbaharui',
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