<?php
    
?>
    <section class="content-wrapper mb-3">
        <div class="row mt-5 p-2">
          <div class="col-md-12">
            <div class="card card-primary mt-3">
            <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Tambah Data Guru</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <form id="form-guru" action="admin.php?" method="get">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="labelNIP">Username</label>
                                <input type="text" name="username" class="form-control" id="labelNIP" placeholder="Masukan Username" required>
                            </div>
                            <div class="form-group">
                                <label for="labelNIP">Password</label>
                                <input type="password" name="password" class="form-control" id="labelNIP" placeholder="Masukan Password" required>
                            </div>
                            <div class="form-group">
                                <label for="labelTahun">Tahun Ajaran</label>
                                <input type="hidden" value="5" name="page">
                                <input type="text" name="tahun" class="form-control" id="labelTahun" placeholder="Masukan Tahun Ajaran" required>
                            </div>
                            <div class="form-group">
                                <label for="labelNIP">NIP</label>
                                <input type="text" name="nip" class="form-control" id="labelNIP" placeholder="Masukan NIP" required>
                            </div>
                            <div class="form-group">
                                <label for="labelNama">Nama Lengkap</label>
                                <input type="text" name="nama_guru" class="form-control" id="labelNama" placeholder="Masukan Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="labelNama">Kelas</label>
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="1">
                                            <label class="form-check-label">Kelas 1</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="2">
                                            <label class="form-check-label">Kelas 2</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="3">
                                            <label class="form-check-label">Kelas 3</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="4">
                                            <label class="form-check-label">Kelas 4</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="5">
                                            <label class="form-check-label">Kelas 5</label>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-check-input" type="radio" name="kelas" value="6">
                                            <label class="form-check-label">Kelas 6</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right mr-4">
                            <button type="button" id="update" name="update" class="btn btn-primary mt-2" style="width: 200px;" onclick="konfirmasi()">Tambah Data</button>
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
      text: "Data Guru Akan Ditambahkan",
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
            text: 'Data Berhasil Ditambahkan',
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