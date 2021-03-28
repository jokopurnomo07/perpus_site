<?php
session_start();

if (!isset($_SESSION['login'])) {
    Header("Location: ../index.php");
    exit();
}

include "function.php";
include "layout/navbar.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
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
                    <div class="card">
                        <div class="card-body">
                            <p>Jumlah Buku : <?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tgr_buku")); ?> Buku</p>
                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sedang Dipinjam</th>
                                        <th>Sudah Dikembalikan</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo
                                            mysqli_num_rows(mysqli_query($conn, "SELECT*FROM tgr_peminjaman WHERE status = '0' OR status = '1' ")); ?>
                                        </td>
                                        <td>
                                            <?php echo
                                            mysqli_num_rows(mysqli_query($conn, "SELECT*FROM tgr_peminjaman WHERE status = '2'")); ?></td>
                                        <td>
                                            <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT*FROM tgr_peminjaman")); ?>
                                        </td>
                                    </tr>
                            </table>
                        </div>
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