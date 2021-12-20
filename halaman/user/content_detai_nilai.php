<?php
    $id_url = $_GET['mpid'];
    $kelas = $_SESSION['kelas'];
    $result_query_li = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE kelas=$kelas ORDER BY id_matapelajaran ASC");
    $query_nama_matapelajaran = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE id_matapelajaran=$id_url");
    while($data_namapelajaran = mysqli_fetch_array($query_nama_matapelajaran)) {
        $nama_matapelajaran = $data_namapelajaran['nama_matapelajaran'];
        $nilai_kkm =  $data_namapelajaran['kkm'];

    }
    $_SESSION['nama_matapelajaran'] = $nama_matapelajaran;
    $query_matapelajaran = "SELECT table_nilai_matapelajaran.*, table_siswa.nis, table_siswa.nama_siswa FROM table_nilai_matapelajaran INNER JOIN table_siswa ON table_nilai_matapelajaran.id_siswa = table_siswa.id_siswa WHERE id_matapelajaran=$id_url ORDER BY id_siswa ASC";
    $result_query_matapelajaran = mysqli_query($conn, $query_matapelajaran);
    $result_query_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE kelas=$kelas ORDER BY nama_siswa");
    if($result_query_matapelajaran -> num_rows > 0) {
?>
<div class="content-wrapper">
    <div class="row mb-5">
  <!-- Main content -->
      <section class="content mt-3">
        <div class="container-fluid">
          <div class="row mt-5">
            <div class="col-12">
              <div class="card ml-2">
                <div class="card-header" style="background-color: #3f6791;">
                  <h3 class="card-title">KKM Mata Pelajaran <?= $_SESSION['nama_matapelajaran'] ;?></h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-10">Nilai KKM ( <?=$nilai_kkm;?> )</div>
                    <div class="col-2 text-right">
                      <a href="guru.php?mpid=<?=$id_url;?>&page=3" class="btn btn-primary">Perbaharui</a>
                        <!-- <button class="btn btn-primary" name="update-kkm" type="submit">Perbaharui</button> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card ml-2">
                <div class="card-header" style="background-color: #3f6791;">
                  <h3 class="card-title">Nilai Mata Pelajaran <?= $_SESSION['nama_matapelajaran'] ;?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered table-hover text-center table-fixed">
                    <tr>
                      <td rowspan="2" class="align-middle">No</td>
                      <td rowspan="2" class="align-middle">NIS</td>
                      <td rowspan="2" class="align-middle" style="min-width: 300px;">Nama Siswa</td>
                      <td colspan="3" class="align-middle">Harian</td>
                      <td colspan="3" class="align-middle">PTS</td>
                      <td colspan="3" class="align-middle">PAS</td>
                      <td colspan="3" class="align-middle">KD</td>
                      <td rowspan="2" class="align-middle" style="min-width: 100px;">Niali</td>
                      <td rowspan="2" class="align-middle" style="min-width: 100px;">Predikat</td>
                      <td colspan="2" class="align-middle">Hasil</td>
                      <td rowspan="2" class="align-middle" style="min-width: 300px;">Deskripsi</td>
                      <td rowspan="2" class="align-middle">Action</td>
                    </tr>
                    <tr>
                      <td>H1</td>
                      <td>H2</td>
                      <td>H3</td>
                      <td>T1</td>
                      <td>T2</td>
                      <td>T3</td>
                      <td>A1</td>
                      <td>A2</td>
                      <td>A3</td>
                      <td>K1</td>
                      <td>K2</td>
                      <td>K3</td>
                      <td>MIN</td>
                      <td>MAX</td>
                    </tr>
    <?php
                  $nomor = 1;
                  while($data_nilai_matapelajaran = mysqli_fetch_array($result_query_matapelajaran)) {         
    ?>
                    <tr>
                      <td><?=$nomor;?></td>
                      <td><?= $data_nilai_matapelajaran['nis'] ;?></td>
                      <td class="text-left"><?= $data_nilai_matapelajaran['nama_siswa'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_harian_1'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_harian_2'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_harian_3'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_pts_1'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_pts_2'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_pts_3'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_pas_1'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_pas_2'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_pas_3'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_kd_1'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_kd_2'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai_kd_3'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['nilai'] ;?></td>
                      <td><?= $data_nilai_matapelajaran['predikat'] ;?></td>
                      <td>
                        <?php
                          $min = $data_nilai_matapelajaran['nilai'] - 2;
                          echo $min;
                        ?>
                      </td>
                      <td>
                        <?php
                          $max = $data_nilai_matapelajaran['nilai'] + 2;
                          echo $max;
                        ?>
                      </td>
                      <td>21</td>
                      <td>
                        <form action="guru.php?mpid=<?= $data_nilai_matapelajaran['id'] ;?>&page=2&id=<?= $data_nilai_matapelajaran['id'] ;?>" method="POST">
                            <button class="btn btn-primary" name="update" type="submit">Perbaharui</button>
                        </form>
                      </td>
                    </tr>
    <?php 
                  $nomor++;
                }
    ?>
                  </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

 <?php
    } else {
        while($data_siswa = mysqli_fetch_array($result_query_siswa)) {         
            $id_siswa = $data_siswa['id_siswa'];
            mysqli_query($conn, "INSERT INTO table_nilai_matapelajaran (id_siswa, id_matapelajaran) VALUES('$id_siswa','$id_url')");
        }
        header("Refresh:0");
    }
?>