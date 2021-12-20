<?php
    $kelas = $_SESSION['kelas'];
    $result_query_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE kelas=$kelas ORDER BY id_siswa ASC");
?>
<div class="content-wrapper">
    <div class="row mt-5">
        <div class="col-sm-12 mt-3 p-2">
            <div class="row-sm-3">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Nilai Persiswa</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center table-fixed">
                                    <tr>
                                        <td>No</td>
                                        <td>NIS</td>
                                        <td>Nama Lengkap Siswa</td>
                                        <td>Action</td>
                                    </tr>
<?php
                                    $nomor = 1;
                                    while($data_siswa = mysqli_fetch_array($result_query_siswa)) {         
?>
                                    <tr>
                                        <td><?=$nomor;?></td>
                                        <td><?=$data_siswa['nis'];?></td>
                                        <td><?=$data_siswa['nama_siswa'];?></td>
                                        <td>
                                            <form action="guru.php?page=7&ids=<?= $data_siswa['id_siswa'];?>" method="POST">
                                                <button class="btn btn-primary" name="update" type="submit">Rincina Nilai</button>
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
            </div>
        </div>
    </div>
</div>