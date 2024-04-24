
<?php

require_once ('koneksi.php');
require_once ('sql.php');

$obj = new crud;
if(!$obj->detailData($_GET['id_mahasiswa'])) die("Error : id mahasiswa tidak ada");
if($_SERVER['REQUEST_METHOD']=='POST'):

	if($obj->deleteData($obj->id_mahasiswa)):
		echo '<div class="alert alert-success">Data berhasil dihapus</div>';
	else:

		echo '<div class="alert alert-danger">Data berhasil disimpan</div>';
	endif;
endif;
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
	                <h6 class="m-0 font-weight-bold text-primary">CRUD OOP PHP </h6>
	            </div>
	        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		        <div class="card-body">
					<td>
					<button type="submit" class="mt-4 btn btn-md btn-primary">Delete</button>
					<?php echo "<a class='mt-4 btn btn-md btn-primary' href='index.php?'>kembali</a>"; ?>
					</td>
				</div>
			</form>
	
		</div>
	</div>


<script src="bootstrap/js/bootstrap-5.bundle.min.js"></script>
</body>
</html>