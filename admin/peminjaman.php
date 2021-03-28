<?php

session_start();

if (!isset($_SESSION['login'])) {
    Header("Location: ../index.php");
    exit();
}

include "function.php";

if (isset($_POST['kirim'])) {
    if (peminjaman($_POST) > 0) {
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

$datas = mysqli_query($conn, "SELECT * FROM tgr_peminjaman");

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

                    <!-- [ Tambah Data Modal ] Start -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjaman Buku</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama">Nama : </label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nama" id="nama" name="nama">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kelas">Kelas : </label>
                                                    <select id="kelas" name="kelas" class="form-control select2bs4">
                                                        <option> -- Pilih Kelas -- </option>
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
                                                            <option value="<?= $book['judul'] ?>"><?= $book['judul'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tgl_pinjam">Tanggal Pinjam : </label>
                                                    <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" placeholder="Masukkan Tanggal Pinjam">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tgl_kembali">Tanggal Kembali : </label>
                                                    <input type="date" class="form-control" name="tgl_kembali" id="tgl_kembali" placeholder="Masukkan Tanggal Kembali">
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
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($datas as $data) :
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['kelas'] ?></td>
                                            <td><?= $data['judul_buku'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($data['tanggal_pinjam'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($data['tanggal_kembali'])) ?></td>
                                            <td>
                                                <?php
                                                if ($data['status'] == 0) {
                                                    echo "Diperpanjang Sampai " .
                                                        date('d-m-Y', strtotime('+1 week', strtotime($data['tanggal_kembali'])));
                                                } elseif ($data['status'] == 1) {
                                                    echo "Belum Dikembalikan";
                                                } elseif ($data['status'] == 2) {
                                                    echo "Sudah Dikembalikan pada tanggal " . $data['tanggal_kembali'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="editpeminjaman.php?id=<?= $data['id']; ?>">
                                                    <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                                                </a>
                                                <a href="hapuspeminjaman.php?id=<?= $data['id']; ?>" onclick="return confirm('Apakah Anda Yakin?');">
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