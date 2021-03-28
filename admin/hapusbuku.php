<?php
session_start();

if (!isset($_SESSION['login'])) {
    Header("Location: ../index.php");
    exit();
}

include 'function.php';

$id = $_GET["id"];

if (hapusBuku($id) > 0) {
    $_SESSION['delete_success'] = "
        <div class='alert alert-success mt-3' role='alert'>
            Berhasil Menghapus Data
        </div>
    ";
    Header("Location: buku.php");
    exit();
} else {
    $_SESSION['delete_error'] = "
        <div class='alert alert-success mt-3' role='alert'>
            Gagal Menghapus Data
        </div>
    ";
    Header("Location: buku.php");
    exit();
}
