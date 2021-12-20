<?php
    $result_query_guru = mysqli_query($conn, "SELECT * FROM table_user WHERE role=2 ORDER BY kelas ASC");
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
                                    <h3 class="card-title">Data Guru</h3>
                                </div>
                                <div class="col-2 text-right">
                                    <a href="admin.php?page=4">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center table-fixed">
                                    <tr>
                                        <td>No</td>
                                        <td>Tahun Ajaran</td>
                                        <td>NIP</td>
                                        <td>Nama Guru</td>
                                        <td>Kelas</td>
                                        <td>Aksi</td>
                                    </tr>
<?php
                                    $nomor = 1;
                                    while($data_guru = mysqli_fetch_array($result_query_guru)) {         
?>
                                    <tr>
                                        <td><?=$nomor;?></td>
                                        <td><?=$data_guru['tahun'];?></td>
                                        <td><?=$data_guru['nip'];?></td>
                                        <td><?=$data_guru['nama_guru'];?></td>
                                        <td><?=$data_guru['kelas'];?></td>
                                        <td>
                                            <form action="admin.php?page=6&idg=<?=$data_guru['id_user'];?>" method="POST">
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