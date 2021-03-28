<?php

session_start();

if (!isset($_SESSION['login'])) {
    Header("Location: ../index.php");
    exit();
}

include "function.php";

if (isset($_POST['kirim'])) {
    if (tambahBuku($_POST) > 0) {
        $_SESSION['sukses'] = "
            <div class='alert alert-success mt-3' role='alert'>
            Berhasil Menambahkan Data
            </div>
        ";
    } else {
        $_SESSION['error'] = "
            <div class='alert alert-danger mt-3' role='alert'>
            Gagal Menambahkan Data
            </div>
        ";
    }
}

$datas = mysqli_query($conn, "SELECT * FROM tgr_buku");
$dataku = mysqli_fetch_array($datas);
$judul = $dataku['judul'];
$status = mysqli_query($conn, "SELECT * FROM tgr_peminjaman WHERE judul_buku = '$judul' ");
$stat = mysqli_fetch_assoc($status);
$caripinjam = mysqli_num_rows($status);

include "layout/navbar.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Buku</li>
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
                    <!-- [ Tambah Data Modal ] Start -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="judul">Judul : </label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Judul" id="judul" name="judul">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal : </label>
                                                    <input type="date" class="form-control" name="tanggal" id="tanggal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pengarang">Pengarang : </label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Pengarang" id="pengarang" name="pengarang">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="penerbit">Penerbit : </label>
                                                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tahun">Tahun Penerbit : </label>
                                                    <input type="number" class="form-control" placeholder="Masukkan Tahun Penerbit" id="tahun" name="tahun">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="asal">Asal : </label>
                                                    <input type="text" class="form-control" name="asal" id="asal" placeholder="Masukkan Asal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="no">No Buku : </label>
                                            <input type="text" class="form-control" name="no" id="no" placeholder="Masukkan Nomer Buku">
                                        </div>
                                        <div class="form-group">
                                            <label for="klasifikasi">Klasifikasi : </label>
                                            <textarea name="klasifikasi" id="klasifikasi" cols="10" class="form-control" rows="5" placeholder="Masukkan Klasifikasi"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="kirim" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- [ Tambah Data Modal ] End  -->

                    <?php

                    // jika berhasil menambahkan data maka tampilkan pesan

                    if (isset($_SESSION['sukses'])) {
                        echo $_SESSION['sukses'];
                        session_unset();
                    }

                    //jika gagal menambahkan data maka tampilkan pesan

                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        session_unset();
                    }

                    //jika berhasil menghapus data maka tampilkan pesan

                    if (isset($_SESSION['delete_success'])) {
                        echo $_SESSION['delete_success'];
                        session_unset();
                    }

                    //jika gagal menghapus data maka tampilkan pesan

                    if (isset($_SESSION['delete_error'])) {
                        echo $_SESSION['delete_error'];
                        session_unset();
                    }

                    ?>

                    <div class="card mt-3">
                        <div class="card-body">
                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>No Buku</th>
                                        <th>Judul</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Penerbit</th>
                                        <th>Asal</th>
                                        <th>Klasifikasi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($datas as $data) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                                            <td><?= $data['no']; ?></td>
                                            <td><?= $data['judul']; ?></td>
                                            <td><?= $data['pengarang']; ?></td>
                                            <td><?= $data['penerbit']; ?></td>
                                            <td><?= $data['tahun_terbit']; ?></td>
                                            <td><?= $data['asal']; ?></td>
                                            <td><?= $data['klasifikasi']; ?></td>
                                            <td>
                                                <?php
                                                if ( $caripinjam > 0 && !empty($stat['judul_buku']) ) {
                                                    echo "Dipinjam";
                                                } else {
                                                    echo "Tersedia";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="editbuku.php?id=<?= $data['id']; ?>">
                                                    <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                                                </a>
                                                <a href="hapusbuku.php?id=<?= $data['id']; ?>" onclick="return confirm('Apakah Anda Yakin?');">
                                                    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
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