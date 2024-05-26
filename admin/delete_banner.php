<?php
include '../proses.php';
if (!isset($_SESSION["login_admin"])) {
    header("Location: loginadmin.php");
    exit;
}

$db = new Connect_db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_banner'];
    if ($id == null) {
        echo "<script>";
        echo "alert('Banner Tidak Ditemukan')";
        echo "</script>";
        exit;
    }
    $db->delete_Banner($id);
    exit;
}
