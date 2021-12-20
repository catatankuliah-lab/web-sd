<?php
    $ids = $_GET['ids'];
    $result_query_data_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE id_siswa=$ids");
    $result_query_siswa = mysqli_query($conn, "SELECT table_nilai_matapelajaran.*, table_matapelajaran.nama_matapelajaran FROM table_nilai_matapelajaran INNER JOIN table_matapelajaran ON table_nilai_matapelajaran.id_matapelajaran = table_matapelajaran.id_matapelajaran WHERE id_siswa=$ids ORDER BY id_matapelajaran ASC");
    $data_siswa = mysqli_fetch_assoc($result_query_data_siswa);
?>
<div class="content-wrapper">
    <div class="row mt-5">
        <div class="col-sm-12 mt-3 p-2">
            <div class="row-sm-3">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Rincian Nilai ( <?=$data_siswa['nama_siswa'];?> )</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center table-fixed">
                                    <tr>
                                        <td>No</td>
                                        <td>Mata Pelajaran</td>
                                        <td>Nilai Akhir</td>
                                        <td>Deskripsi</td>
                                    </tr>
<?php
                                    $nomor = 1;
                                    while($data_nilai = mysqli_fetch_assoc($result_query_siswa)) {         
?>
                                    <tr>
                                        <td><?=$nomor;?></td>
                                        <td><?=$data_nilai['nama_matapelajaran'];?></td>
                                        <td><?=$data_nilai['nilai'];?> (<?=$data_nilai['predikat'];?>)</td>
                                        <td><?=$data_nilai['deskripsi'];?></td>
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
            </div>
        </div>
    </div>
</div>