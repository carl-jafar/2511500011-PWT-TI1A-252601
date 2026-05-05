<?php
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    header('Location: ../index.php?page=ekstra_2511500011');
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
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];

        $query = mysqli_query($koneksi, "DELETE FROM ekstra_2511500011 WHERE id_ekstra011 = '$id'");

        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
                Berhasil Di Hapus
            </div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra_2511500011">';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                
                <a href="index.php?page=tambah_ekstra2511500011" class="btn btn-primary btn-sm">
                    Tambah Ekstrakulikuler
                </a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Id Ekstrakulikuler</th>
                            <th>Nama Ekstrakulikuler</th>
                            <th>Keterangan</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT * FROM ekstra_2511500011");

                        if ($query) {
                            while ($result = mysqli_fetch_array($query)) {
                                $no++;
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $result['id_ekstra011']; ?></td>
                                <td><?= $result['nama_ekstra011']; ?></td>
                                <td><?= $result['ket011']; ?></td>
                                <td><?= $result['semester011']; ?></td>
                                <td><?= $result['thn_ajaran011']; ?></td>
                                <td>
                                    <a href="index.php?page=ekstra_2511500011&action=hapus&id=<?= $result['id_ekstra011']; ?>">
                                        <span class="badge badge-danger">Hapus</span>
                                    </a>

                                    <a href="index.php?page=edit_ekstra2511500011&id=<?= $result['id_ekstra011']; ?>">
                                        <span class="badge badge-warning">Edit</span>
                                    </a>
                                </td>
                            </tr>
                        <?php }
                        } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>