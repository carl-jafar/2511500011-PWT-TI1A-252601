<?php
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    header('Location: ../index.php?page=tambah_ekstra2511500011');
    exit;
}
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Ekstrakulikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
$errorMessage = '';

// Hitung id otomatis bila tabel tidak menggunakan AUTO_INCREMENT
$id_ekstra011 = 1;
$result = mysqli_query($koneksi, "SELECT MAX(id_ekstra011) AS max_id FROM ekstra_2511500011");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row && $row['max_id'] !== null) {
        $id_ekstra011 = (int)$row['max_id'] + 1;
    }
}

// Proses simpan
if (isset($_POST['tambah'])) {
    $id_ekstra011 = trim($_POST['id_ekstra011']);
    $nama_ekstra011 = trim($_POST['nama_ekstra011']);
    $keterangan = trim($_POST['keterangan'] ?? '');
    $semester011 = trim($_POST['semester011'] ?? '');
    $thn_ajaran011 = trim($_POST['thn_ajaran011'] ?? '');

    if ($nama_ekstra011 === '') {
        $errorMessage = 'Nama ekstrakulikuler tidak boleh kosong.';
    } elseif ($keterangan === '') {
        $errorMessage = 'Keterangan tidak boleh kosong.';
    } elseif ($semester011 === '') {
        $errorMessage = 'Semester tidak boleh kosong.';
    } elseif ($thn_ajaran011 === '') {
        $errorMessage = 'Tahun ajaran tidak boleh kosong.';
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO ekstra_2511500011 (id_ekstra011, nama_ekstra011, ket011, semester011, thn_ajaran011) VALUES ('$id_ekstra011', '$nama_ekstra011', '$keterangan', '$semester011', '$thn_ajaran011')");

        if ($insert) {
            echo '
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">X</button>
                <h5><i class="icon fas fa-info"></i> Info</h5>
                <h4>Berhasil Disimpan</h4>
            </div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra_2511500011">';
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
                        <label for="id_ekstra011">Kode Ekstra</label>
                        <input 
                            type="text" 
                            name="id_ekstra011"
                            value="<?= $id_ekstra011; ?>" 
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
                        <label for="nama_ekstra011">Nama Ekstrakulikuler</label>
                        <input 
                            type="text" 
                            name="nama_ekstra011" 
                            id="ekstra011"
                            placeholder="Nama ekstra" 
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ket011">Keterangan</label>
                        <input 
                            type="text" 
                            name="keterangan" 
                            id="ket011"
                            placeholder="Keterangan" 
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="semester011">Semester</label>
                        <input 
                            type="number" 
                            name="semester011" 
                            id="semester011"
                            placeholder="Semester" 
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="thn_ajaran011">Tahun Ajaran</label>
                        <input 
                            type="text" 
                            name="thn_ajaran011" 
                            id="thn_ajaran011"
                            placeholder="2025/2026" 
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