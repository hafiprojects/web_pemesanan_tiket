<?php
include '../proses.php';
if (!isset($_SESSION["login_admin"])) {
    header("Location: loginadmin.php");
    exit;
}

$db = new Connect_db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_artikel'];
    if ($id == null) {
        echo "<script>";
        echo "alert('Artikel Tidak Ditemukan')";
        echo "</script>";
        exit;
    }
    $db->delete_Artikel($id);
    exit;
}
