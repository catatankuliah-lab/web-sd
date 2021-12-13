<?php
    $id_guru_session = $_SESSION['id_guru'];
    $result_query_guru = mysqli_query($conn, "SELECT * FROM table_guru WHERE id_guru= $id_guru_session");
    while($data_guru = mysqli_fetch_array($result_query_guru))
    {
        $nama_guru = $data_guru['nama_guru'];
        $kelas = $data_guru['kelas'];
        $nip = $data_guru['nip'];
    }
    $_SESSION['kelas'] = $kelas;
    $result_query_matapelajaran = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE kelas=$kelas ORDER BY id_matapelajaran ASC");
    $result_query_jumlah_matapelajaran = mysqli_num_rows($result_query_matapelajaran);
    $result_query_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE kelas=$kelas ORDER BY nama_siswa");
    $result_query_jumlah_siswa = mysqli_num_rows($result_query_siswa);
?>
<div class="content-wrapper mb-3">
        <div class="row mt-3">
            <div class="col-sm-12 ml-1">
                <div class="row-sm-3 mt-5">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Profil Sekolah</h3>
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <h3 class="profile-username text-center">SD NEGERI 1 KERTAWINANGUN</h3>
                                <p class="text-muted text-center">Jln. Buyut Pringga N0.123 Dusun Pon Desa Kertawinangun</p>
                                <ul class="list-group list-group-unbordered mb-1">
                                    <li class="list-group-item">
                                        <b>NPSN</b> <a class="float-right">20212788</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Kepala Sekolah</b> <a class="float-right">NANA YUHANA, S.Pd.SD.</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NIP</b> <a class="float-right">19650917 198610 1 004</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>DESA/KELURAHAN</b> <a class="float-right">KERTAWINANGUN</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>KECAMATAN</b> <a class="float-right">MANDIRANCAN</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>KABUPATEN/KOTA</b> <a class="float-right">KUNINGAN</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>PROVINSI</b> <a class="float-right">JAWA BARAT</a>
                                    </li>
                                </ul>
                            </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- .row -->
        <div class="row">
            <div class="col-sm-12 ml-1">
                <div class="row-sm-3">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Profil Kelas</h3>
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-bars"></i> KELAS</strong>
                                <p class="text-muted">Kelas <?= $kelas ;?></p>
                                <hr>
                                <strong><i class="fas fa-user"></i> NAMA GURU</strong>
                                <p class="text-muted"><?= $nama_guru ;?></p>
                                <hr>
                                <strong><i class="fas fa-key"></i> NIP</strong>
                                <p class="text-muted"><?= $nip ;?></p>
                                <hr>
                                <strong><i class="fas fa-users"></i> Jumlah Data Siswa Yang Masuk</strong>
                                <p class="text-muted"><?= $result_query_jumlah_siswa ;?> Siswa</p>
                                <hr>
                                <strong><i class="fas fa-book"></i> Jumlah Mata Pelajaran</strong>
                                <p class="text-muted"><?= $result_query_jumlah_matapelajaran ;?> Mata Pelajaran</p>              
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        <!-- /.row -->
        </div>
    </div>