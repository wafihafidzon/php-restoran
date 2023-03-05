<?php
include 'connection.php';
session_start();

@$kirim = $_POST["kirim"];
@$edit = $_POST["edit"];
@$delete = $_POST["delete"];


if (!$koneksi) {
    die("Database tidak terhubung");
}
// proses edit
if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
if(@$op == "edit"){
    $id = $_GET['id'];
    $sqli = "SELECT * FROM menu WHERE id = $id";
    $q1 = mysqli_query($koneksi, $sqli);
    $fetch1 = mysqli_fetch_array($q1);
    @$menu = $fetch1['menu'];
    @$kategori = $fetch1['kategori'];
    @$harga = $fetch1['harga'];
    
    if($menu == ""){
        $gagal = "Data tidak ditemukan";
    }

// upload edit
}
if (isset($edit)){
    $menu        = $_POST['menu'];
    $kategori    = $_POST['kategori'];
    $harga       = $_POST['harga'];

    if($op == "edit") {
        $sqli = "UPDATE menu SET menu='$menu',kategori='$kategori',harga='$harga' WHERE id='$id'";
        $q1 = mysqli_query($koneksi, $sqli);

        if ($q1) {
            $sukses = "Berhasil memasukkan data";
        } else {
            $gagal = "Gagal memasukkan data";
        }
    
    }
}
// pembuatan create
if (isset($kirim)) {
    $menu        = $_POST['menu'];
    $kategori    = $_POST['kategori'];
    $harga       = $_POST['harga'];

    if ($menu && $kategori && $harga) {
            $sqli = "INSERT INTO menu ( menu, kategori, harga) VALUES ( '$menu', '$kategori', '$harga')";
            $q1 = mysqli_query($koneksi, $sqli);
    
            if ($q1) {
                $sukses = "Berhasil memasukkan data";
            } else {
                $gagal = "Gagal memasukkan data";
            }
        }
        else {
            $gagal = "Data yang anda masukkan tidak lengkap";
        }}

    if($op == "delete") {
        $id = $_GET['id'];
        $sqli = "DELETE FROM `menu` WHERE `menu`.`id` = '$id'";
        $q1 = mysqli_query($koneksi, $sqli);

        if ($q1) {
            $sukses = "Berhasil menghapus data";
        } else {
            $gagal = "Gagal memenghapus data";
        }
}

if($op == "cart"){
    $id = $_GET['id'];
    $jml = $_GET['jml'];
    $q1 = "SELECT * FROM menu WHERE id = $id";
    $sql = mysqli_query($koneksi,$q1);
    $hasil = mysqli_fetch_array($sql);

    $_SESSION['cart'][$id] = [
        "jumlah" => $jml,
        "menu" => $hasil['menu'],
        "kategori" => $hasil['kategori'],
        "harga" => $hasil['harga'],
        "id" => $hasil['id']
    ];
    header("Location: cart.php");
}
if($op == "cartbatal"){
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
}
