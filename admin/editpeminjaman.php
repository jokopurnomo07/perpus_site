<?php

session_start();

if (!isset($_SESSION['login'])) {
    Header("Location: ../index.php");
    exit();
}

include "function.php";

if (isset($_POST['simpan'])) {
    if (editPeminjaman($_POST) > 0) {
        $_SESSION['sukses'] = "
            <div class='alert alert-success mt-3' role='alert'>
            Berhasil Mengubah Data
            </div>
        ";
        Header('Location: peminjaman.php');
        exit();
    } else {
        $_SESSION['error'] = "
            <div class='alert alert-danger mt-3' role='alert'>
            Gagal Mengubah Data
            </div>
        ";
        Header('Location: peminjaman.php');
        exit();
    }
}
$id = (int)$_GET['id'];
$datas = mysqli_query($conn, "SELECT * FROM tgr_peminjaman WHERE id = '$id' ");
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
                    <h1 class="m-0 text-dark">Peminjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
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
                                                <label for="nama">Nama : </label>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama" id="nama" name="nama" value="<?= $data['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kelas">Kelas : </label>
                                                <select id="kelas" name="kelas" class="form-control select2bs4">
                                                    <option> <?= $data['kelas'] ?> </option>
                                                    <option value="">--KELAS 10</option>
                                                    <option>10 RPL 1</option>
                                                    <option>10 RPL 2</option>
                                                    <option>10 RPL 3</option>
                                                    <option>10 TITL 1</option>
                                                    <option>10 TITL 2</option>
                                                    <option>10 BDPM 1</option>
                                                    <option>10 BDPM 2</option>
                                                    <option>10 BDPM 3</option>
                                                    <option>10 TBSM 1</option>
                                                    <option>10 TBSM 2</option>
                                                    <option value="">--KELAS 11</option>
                                                    <option>11 RPL 1</option>
                                                    <option>11 RPL 2</option>
                                                    <option>11 RPL 3</option>
                                                    <option>11 TITL 1</option>
                                                    <option>11 TITL 2</option>
                                                    <option>11 BDPM 1</option>
                                                    <option>11 BDPM 2</option>
                                                    <option>11 BDPM 3</option>
                                                    <option>11 TBSM 1</option>
                                                    <option>11 TBSM 2</option>
                                                    <option value="">--KELAS 12</option>
                                                    <option>12 RPL 1</option>
                                                    <option>12 RPL 2</option>
                                                    <option>12 RPL 3</option>
                                                    <option>12 TITL 1</option>
                                                    <option>12 TITL 2</option>
                                                    <option>12 BDPM 1</option>
                                                    <option>12 BDPM 2</option>
                                                    <option>12 BDPM 3</option>
                                                    <option>12 TBSM 1</option>
                                                    <option>12 TBSM 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="judul">Judul Buku : </label>
                                                <select class="form-control select2bs4" name="judul" id="judul">
                                                    <option> -- Pilih Judul Buku -- </option>
                                                    <?php
                                                    $databooks = mysqli_query($conn, "SELECT * FROM tgr_buku");
                                                    foreach ($databooks as $book) :

                                                    ?>
                                                        <option value="<?= $book['judul'] ?>"  <?= $book['judul'] == $data['judul_buku'] ? 'Selected' : '' ?> ><?= $book['judul'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tgl_pinjam">Tanggal Pinjam : </label>
                                                <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" placeholder="Masukkan Tanggal Pinjam" value="<?= $data['tanggal_pinjam']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tgl_kembali">Tanggal Kembali : </label>
                                                <input type="date" class="form-control" name="tgl_kembali" id="tgl_kembali" placeholder="Masukkan Tanggal Kembali" value="<?= $data['tanggal_kembali']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status : </label>
                                        <select class="form-control select2bs4" name="status" id="status">
                                            <option> -- Pilih Status Peminjaman -- </option>
                                            <option value="0">Perpanjang</option>
                                            <option value="1" selected>Belum Dikembalikan</option>
                                            <option value="2">Dikembalikan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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