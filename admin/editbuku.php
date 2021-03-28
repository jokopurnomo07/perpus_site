<?php

session_start();

if (!isset($_SESSION['login'])) {
    Header("Location: ../index.php");
    exit();
}

include "function.php";

if (isset($_POST['simpan'])) {
    if (editBuku($_POST) > 0) {
        $_SESSION['sukses'] = "
            <div class='alert alert-success mt-3' role='alert'>
            Berhasil Mengubah Data
            </div>
        ";
        Header('Location: buku.php');
        exit();
    } else {
        $_SESSION['error'] = "
            <div class='alert alert-danger mt-3' role='alert'>
            Gagal Mengubah Data
            </div>
        ";
        Header('Location: buku.php');
        exit();
    }
}
$id = (int)$_GET['id'];
$datas = mysqli_query($conn, "SELECT * FROM tgr_buku WHERE id = '$id' ");
$data = mysqli_fetch_array($datas);

include "layout/navbar.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Buku</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="judul">Judul : </label>
                                                <input type="text" class="form-control" placeholder="Masukkan Judul" id="judul" name="judul" value="<?= $data['judul']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal : </label>
                                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $data['tanggal']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pengarang">Pengarang : </label>
                                                <input type="text" class="form-control" placeholder="Masukkan Pengarang" id="pengarang" name="pengarang" value="<?= $data['pengarang']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="penerbit">Penerbit : </label>
                                                <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit" value="<?= $data['penerbit']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tahun">Tahun Penerbit : </label>
                                                <input type="number" class="form-control" placeholder="Masukkan Tahun Penerbit" id="tahun" name="tahun" value="<?= $data['tahun_terbit']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="asal">Asal : </label>
                                                <input type="text" class="form-control" name="asal" id="asal" placeholder="Masukkan Asal" value="<?= $data['asal']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no">No Buku : </label>
                                        <input type="text" class="form-control" name="no" id="no" placeholder="Masukkan Nomer Buku" value="<?= $data['no']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="klasifikasi">Klasifikasi : </label>
                                        <textarea name="klasifikasi" id="klasifikasi" cols="10" class="form-control" rows="5" placeholder="Masukkan Klasifikasi"><?= $data['klasifikasi']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "layout/footer.php"; ?>