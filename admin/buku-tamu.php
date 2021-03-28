<?php
session_start();

if (!isset($_SESSION['login'])) {
    Header("Location: ../index.php");
    exit();
}

include "function.php";

if( isset($_POST['kirim']) ){
    if( tambahBukuTamu($_POST) > 0 ){
        $_SESSION['sukses'] = "
            <div class='alert alert-success mt-3' role='alert'>
            Berhasil Menambahkan Data
            </div>
        ";
    }else{
        $_SESSION['error'] = "
            <div class='alert alert-danger mt-3' role='alert'>
            Gagal Menambahkan Data
            </div>
        ";
    }
}

$datas = mysqli_query($conn, "SELECT * FROM tgr_buku_tamu");

include "layout/navbar.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Buku Tamu</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Buku Tamu</li>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku Tamu</h5>
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
                            <label for="tanggal">Tanggal : </label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas : </label>
                    <select id="kelas" name="kelas" class="form-control">
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
                <div class="form-group">
                    <label for="keperluan">Keperluan : </label>
                    <textarea name="keperluan" id="keperluan" cols="10" class="form-control" rows="5" placeholder="Masukkan Keperluan"></textarea>
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

        <!-- [ Tampilkan Pesan ] -->

        <?php

        // jika berhasil menambahkan data maka tampilkan pesan
        
        if( isset($_SESSION['sukses']) ){
            echo $_SESSION['sukses'];
            session_unset();
        }

        //jika gagal menambahkan data maka tampilkan pesan

        if( isset($_SESSION['error']) ){
            echo $_SESSION['error'];
            session_unset();
        }

        //jika berhasil menghapus data maka tampilkan pesan

        if( isset($_SESSION['delete_success']) ){
            echo $_SESSION['delete_success'];
            session_unset();
        }

        //jika gagal menghapus data maka tampilkan pesan

        if( isset($_SESSION['delete_error']) ){
            echo $_SESSION['delete_error'];
            session_unset();
        }

        ?>
        <!-- [ Tampilkan Pesan ] -->
        
        <div class="card mt-3">
            <div class="card-body">
                <table id="data" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Keperluan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach( $datas as $data ) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['kelas']; ?></td>
                            <td><?= $data['keperluan']; ?></td>
                            <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                            <td>
                                <a href="hapusbukutamu.php?id=<?= $data['id']; ?>" onclick="return confirm('Apakah Anda Yakin?');">
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