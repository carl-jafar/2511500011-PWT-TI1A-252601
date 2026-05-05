<?php
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    $id = $_GET['id'] ?? '';
    header('Location: ../index.php?page=edit_ekstra2511500011' . ($id !== '' ? '&id=' . urlencode($id) : ''));
    exit;
}
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Ekstrakulikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'] ?? null;
if ($id === null || $id === '') {
    header('Location: ../index.php?page=ekstra_2511500011');
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM ekstra_2511500011 WHERE id_ekstra011='$id'");
$edit  = mysqli_fetch_array($query);

// Proses update
if (isset($_POST['tambah'])) {
    $id_ekstra011 = $_POST['id_ekstra011'];
    $nama_ekstra011 = $_POST['nama_ekstra011'];
    $keterangan = trim($_POST['keterangan'] ?? '');
    $semester011 = trim($_POST['semester011'] ?? '');
    $thn_ajaran011 = trim($_POST['thn_ajaran011'] ?? '');

    $update = mysqli_query($koneksi, "UPDATE ekstra_2511500011 
        SET nama_ekstra011='$nama_ekstra011', ket011='$keterangan', semester011='$semester011', thn_ajaran011='$thn_ajaran011'
        WHERE id_ekstra011='$id_ekstra011'
    ");

    if ($update) {
        echo '
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Disimpan</h4>
        </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra_2511500011">';
    } else {
        echo '
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Gagal Disimpan</h4j>
        </div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-2">

                <form method="POST" action="">

                    <div class="form-group">
                        <label for="id_ekstra011">Kode Ekstrakulikuler</label>
                        <input 
                            type="text" 
                            name="id_ekstra011" 
                            value="<?= $edit['id_ekstra011']; ?>" 
                            class="form-control" 
                            readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama_ekstra011">Nama ekstrakulikuler</label>
                        <input 
                            type="text" 
                            name="nama_ekstra011" 
                            value="<?= $edit['nama_ekstra011']; ?>" 
                            id="nama_ekstra011" 
                            placeholder="Nama ekstra011" 
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input 
                            type="text" 
                            name="keterangan" 
                            value="<?= $edit['ket011']; ?>" 
                            id="keterangan" 
                            placeholder="Keterangan" 
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="semester011">Semester</label>
                        <input 
                            type="number" 
                            name="semester011" 
                            value="<?= $edit['semester011']; ?>" 
                            id="semester011" 
                            placeholder="Semester" 
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="thn_ajaran011">Tahun Ajaran</label>
                        <input 
                            type="text" 
                            name="thn_ajaran011" 
                            value="<?= $edit['thn_ajaran011']; ?>" 
                            id="thn_ajaran011" 
                            placeholder="Tahun Ajaran" 
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