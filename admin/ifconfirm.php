<?php
$id = $_GET["id"];
include("../proses.php");
$db = new Connect_db();
$result = $db->db_From_Id("SELECT * FROM user_order WHERE id = '$id'");
if (!isset($_SESSION["login_admin"])) {
    header("Location: loginadmin.php");
    exit;
}
$id = "";
$id_tiket = "";
$order_id = "";
$email = "";
$catatan = "";
$rek_pengirim = "";
$namarek_pengirim = "";
$bank_pengirim = "";
$jenis_pesanan = "";
$bank_penerima = "";
$total_pembayaran = "";
$waktu_pesanan = "";
$bukti_pembayaran = "";
$status = "Cetak Tiket";
$link_status = "";
$warna_status = "success";

foreach ($result as $confirm) {
    $id = $confirm["id"];
    $id_tiket = $confirm["id_tiket"];
    $order_id = $confirm["order_id"];
    $email = $confirm["email"];
    $catatan = $confirm["catatan"];
    $rek_pengirim = $confirm["rek_pengirim"];
    $namarek_pengirim = $confirm["namarek_pengirim"];
    $bank_pengirim = $confirm["bank_pengirim"];
    $jenis_pesanan = $confirm["jenis_pesanan"];
    $bank_penerima = $confirm["bank_penerima"];
    $total_pembayaran = $confirm["total_pembayaran"];
    $waktu_pesanan = $confirm["waktu_pesanan"];
    $bukti_pembayaran = $confirm["bukti_pembayaran"];
    $link_status = "cetaktiket.php";
    
}
$conn = mysqli_connect("localhost", "root", "", "web_pemesanan_tiket");
mysqli_query(
    $conn,
    "UPDATE user_order set id = '$id', id_tiket = '$id_tiket', order_id = '$order_id', email = '$email', catatan = '$catatan', rek_pengirim = '$rek_pengirim', namarek_pengirim = '$namarek_pengirim', bank_pengirim = '$bank_pengirim', jenis_pesanan = '$jenis_pesanan', bank_penerima = '$bank_penerima', total_pembayaran = '$total_pembayaran', waktu_pesanan = '$waktu_pesanan', bukti_pembayaran = '$bukti_pembayaran', status = '$status', link_status = '$link_status', warna_status = '$warna_status' WHERE id = '$id'"
);
unlink("../db_images/$bukti_pembayaran");
header("Location: konfirmasi.php");
