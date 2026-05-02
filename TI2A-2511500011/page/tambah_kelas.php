<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Mata Pelajaran</h1>
            </div>
        </div>
    </div>
</div>

<?php
$errorMessage = '';

// Proses simpan
if (isset($_POST['tambah'])) {
    $nm_kelas = trim($_POST['nm_kelas']);

    if ($nm_kelas === '') {
        $errorMessage = 'Nama kelas tidak boleh kosong.';
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO kelas (nm_kelas) VALUES ('$nm_kelas')");

        if ($insert) {
            echo '
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">X</button>
                <h5><i class="icon fas fa-info"></i> Info</h5>
                <h4>Berhasil Disimpan</h4>
            </div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
            exit;
        } else {
            $errorMessage = 'Gagal Disimpan: ' . mysqli_error($koneksi);
        }
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-2">

                <form method="POST" action="">

                    <div class="form-group">
                        <label for="id_kelas">Kode kelas</label>
                        <input 
                            type="text" 
                            value="Auto" 
                            class="form-control" 
                            readonly>
                    </div>

                    <?php if (!empty($errorMessage)) : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">X</button>
                            <h5><i class="icon fas fa-info"></i> Info</h5>
                            <p><?= $errorMessage; ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="nm_kelas">Nama kelas</label>
                        <input 
                            type="text" 
                            name="nm_kelas" 
                            id="nm_kelas"
                            placeholder="Nama kelas" 
                            class="form-control">
                    </div>

                    <div class="card-footer">
                        <input 
                            type="submit" 
                            class="btn btn-primary" 
                            name="tambah" 
                            value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>