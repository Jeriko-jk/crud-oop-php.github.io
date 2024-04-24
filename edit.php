<?php

require_once('koneksi.php');
require_once('sql.php');

$obj = new crud;

// Check if id_mahasiswa is set in the URL
if (!isset($_GET['id_mahasiswa']) || !$obj->detailData($_GET['id_mahasiswa'])) {
    die("Error: ID mahasiswa tidak valid");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input data
    $nim = isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : '';
    $nama = isset($_POST['nama_mahasiswa']) ? htmlspecialchars($_POST['nama_mahasiswa']) : '';

    // Update data in the database
    if ($obj->updateData($nim, $nama, $obj->id_mahasiswa)) {
        echo '<div class="alert alert-success">Data berhasil disimpan</div>';
    } else {
        echo '<div class="alert alert-danger">Gagal menyimpan data</div>';
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tutorial PHP : CRUD OOP PHP</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.css">
</head>

<body>
    <div class="container">
        <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">CRUD OOP PHP</h6>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIM :</label>
                                <input type="text" class="form-control" name="nim" value="<?php echo htmlspecialchars($obj->nim); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NAMA MAHASISWA :</label>
                                <input type="text" class="form-control" name="nama_mahasiswa" value="<?php echo htmlspecialchars($obj->nama_mahasiswa); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
							<td>
                            <button type="submit" class="mt-4 btn btn-md btn-primary">Simpan</button>
							<?php echo "<a class='mt-4 btn btn-md btn-primary' href='index.php?'>kembali</a>"; ?>
							</td>
						</div>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
