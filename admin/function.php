<?php

$conn = mysqli_connect('localhost', 'root', '', 'perpus');

function tambahBukuTamu($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $tanggal = $data['tanggal'];
    $kelas = $data['kelas'];
    $keperluan = htmlspecialchars($data['keperluan']);

    mysqli_query($conn, "INSERT INTO tgr_buku_tamu VALUES('','$nama','$kelas','$keperluan','$tanggal') " );

    return mysqli_affected_rows($conn);

}

function hapusBukuTamu($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tgr_buku_tamu WHERE id='$id'");
    return mysqli_affected_rows($conn);
}

function tambahBuku($data)
{
    global $conn;

    $no = htmlspecialchars($data['no']);
    $judul = htmlspecialchars($data['judul']);
    $tanggal = $data['tanggal'];
    $pengarang = htmlspecialchars($data['pengarang']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahun = htmlspecialchars($data['tahun']);
    $asal = htmlspecialchars($data['asal']);
    $klasifikasi = htmlspecialchars($data['klasifikasi']);

    mysqli_query($conn, "INSERT INTO tgr_buku VALUES('','$no','$tanggal','$judul','$pengarang','$penerbit','$tahun','$asal','$klasifikasi') " );

    return mysqli_affected_rows($conn);

}

function hapusBuku($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tgr_buku WHERE id='$id'");
    return mysqli_affected_rows($conn);
}

function editBuku($data)
{
    global $conn;

    $id = $data['id'];
    $no = htmlspecialchars($data['no']);
    $judul = htmlspecialchars($data['judul']);
    $tanggal = $data['tanggal'];
    $pengarang = htmlspecialchars($data['pengarang']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahun = htmlspecialchars($data['tahun']);
    $asal = htmlspecialchars($data['asal']);
    $klasifikasi = htmlspecialchars($data['klasifikasi']);

    mysqli_query($conn, "UPDATE tgr_buku SET 
        no='$no', 
        tanggal='$tanggal', 
        judul='$judul', 
        pengarang='$pengarang', 
        penerbit='$penerbit', 
        tahun_terbit='$tahun', 
        asal='$asal', 
        klasifikasi='$klasifikasi' 
    WHERE id ='$id' " );

    return mysqli_affected_rows($conn);

}

function peminjaman($data)
{
    global $conn;

    $kelas = htmlspecialchars($data['kelas']);
    $nama = $data['nama'];
    $judul = htmlspecialchars($data['judul']);
    $tgl_pinjam = htmlspecialchars($data['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($data['tgl_kembali']);
    $status = htmlspecialchars($data['status']);

    mysqli_query($conn, "INSERT INTO tgr_peminjaman VALUES('','$nama','$kelas','$judul','$tgl_pinjam','$tgl_kembali','$status') ");

    return mysqli_affected_rows($conn);
}

function hapusPeminjaman($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tgr_peminjaman WHERE id='$id'");
    return mysqli_affected_rows($conn);
}

function editPeminjaman($data)
{
    global $conn;

    $id = $data['id'];
    $kelas = htmlspecialchars($data['kelas']);
    $nama = $data['nama'];
    $judul = htmlspecialchars($data['judul']);
    $tgl_pinjam = htmlspecialchars($data['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($data['tgl_kembali']);
    $status = htmlspecialchars($data['status']);

    mysqli_query($conn, "UPDATE tgr_peminjaman SET 
        nama='$nama', 
        kelas='$kelas', 
        judul_buku='$judul', 
        tanggal_pinjam='$tgl_pinjam', 
        tanggal_kembali='$tgl_kembali', 
        status='$status' 
    WHERE id ='$id' ");

    return mysqli_affected_rows($conn);
}