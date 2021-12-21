<?php
    $result_query_mapatelajaran = mysqli_query($conn, "SELECT * FROM table_matapelajaran ORDER BY id_matapelajaran ASC");
?>
<div class="content-wrapper">
    <div class="row mt-5">
        <div class="col-sm-12 mt-3 p-2">
            <div class="row-sm-3">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="card-title">Data Matapelajaran</h3>
                                </div>
                                <div class="col-2 text-right">
                                    <a href="admin.php?page=8">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center table-fixed">
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Matapelajaran</td>
                                        <td>Kelas</td>
                                        <td>Nilai KKM</td>
                                        <td>Aksi</td>
                                    </tr>
<?php
                                    $nomor = 1;
                                    while($data_matapelajaran = mysqli_fetch_array($result_query_mapatelajaran)) {         
?>
                                    <tr>
                                        <td><?=$nomor;?></td>
                                        <td><?=$data_matapelajaran['nama_matapelajaran'];?></td>
                                        <td><?=$data_matapelajaran['kelas'];?></td>
                                        <td><?=$data_matapelajaran['kkm'];?></td>
                                        <td>
                                            <form action="admin.php?page=8&idmp=<?=$data_matapelajaran['id_matapelajaran'];?>" method="POST">
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
            </div>
        </div>
    </div>
</div>