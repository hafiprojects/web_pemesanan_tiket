<?php
session_start();
class Connect_db
{
    private $servername = "localhost";
    private $db_name = "web_pemesanan_tiket";
    private $username = "root";
    private $password = "";
    private $connect_db;


    // Koneksi Database
    function __construct()
    {
        $this->connect_db = mysqli_connect($this->servername, $this->username, $this->password, $this->db_name);

        if (mysqli_connect_errno()) {
            echo "Gagal menyambungkan kedalam database -> " . mysqli_connect_error();
            exit();
        }
    }
    // End Of Koneksi Database

    // Get Database From Id
    function db_From_Id($sql)
    {
        $query = mysqli_query($this->connect_db, $sql);

        $result = [];

        while ($data = mysqli_fetch_array($query)) {
            $result[] = $data;
        }

        return $result;
    }
    // End Of Get Database From ID

    // Signup
    function signUp($username, $no_wa, $email, $password)
    {
        // hash password
        $secure_password = password_hash($password, PASSWORD_DEFAULT);
        // end hash password

        $sql = "INSERT INTO user (username, no_wa, email, password) VALUES ('$username', '$no_wa', '$email', '$secure_password')";
        $execute = mysqli_query($this->connect_db, $sql);

        // Cek Koneksi
        if ($execute) {
            echo '<script>';
            echo 'alert("Akun Anda Berhasil Dibuat, Silahkan Login Untuk Melanjutkan")';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Akun Anda Gagal Dibuat, Silahkan Hubungi Admin Jika Ada Kendala")';
            echo '</script>';
        }
        // End Of Cek Koneksi
    }
    // End Of Signup

    // Sign in
    function signIn($username, $password)
    {

        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($this->connect_db, $sql);

        // cek username
        // if true
        if (mysqli_num_rows($result) > 0) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                $_SESSION["login"] = $row["id"];
                header("Location: ../order/index.php");
            };
        } else {
            echo '<script>';
            echo 'alert("Username Atau Password Yang Anda Masukkan Salah")';
            echo '</script>';
        }
    }
    // End Of Sign in

    // Order Tiket
    function set_Pesanan($id_tiket, $order_id, $email, $catatan, $rek_pengirim, $namarek_pengirim, $bank_pengirim, $jenis_pesanan, $bank_penerima, $total_pembayaran, $waktu_pesanan, $bukti_pembayaran, $status, $link_status, $warna_status)
    {
        $sql = "INSERT INTO user_order(id,id_tiket ,order_id, email, catatan, rek_pengirim, namarek_pengirim, bank_pengirim, jenis_pesanan, bank_penerima, total_pembayaran, waktu_pesanan,bukti_pembayaran, status, link_status, warna_status)
               VALUES
               (NULL, '$id_tiket', '$order_id', '$email', '$catatan', '$rek_pengirim', '$namarek_pengirim', '$bank_pengirim', '$jenis_pesanan', '$bank_penerima', '$total_pembayaran', '$waktu_pesanan', '$bukti_pembayaran', '$status', '$link_status', '$warna_status') 
        ";
        if (mysqli_query($this->connect_db, $sql)) {
            echo '<script>';
            echo 'alert("Pesanan Berhasil Dibuat, Silahkan Tunggu Admin Untuk Konfirmasi, Jika Terdapat Kendala Bisa Hubungi 0856-7712-2272")';
            echo '</script>';
        }
    }

    // End Of Order Tiket

    // Upload Gambar Ke File
    function upload_Gambar($gambar)
    {

        $nama_file = $_FILES["gambar"]["name"];

        $error = $_FILES["gambar"]["error"];
        $tmpname = $_FILES["gambar"]["tmp_name"];

        if ($error === 4) {
            echo "<script>";
            echo "alert('Pilih gambar terlebih dahulu')";
            echo "</script>";
            return false;
        }

        // cek ekstensi gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $nama_file);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>";
            echo "alert('Yang anda upload bukan gambar')";
            echo "</script>";
            return false;
        }
        // generate nama baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // lolos check , dan upload
        move_uploaded_file($tmpname, '../db_images/' . $namaFileBaru);
        return $namaFileBaru;
    }

    // End Of Upload Gambar Ke File

    // Add Admin
    function register_Admin($username, $password)
    {
        $secure_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$secure_password')";
        if (mysqli_query($this->connect_db, $sql)) {
            echo "<script>";
            echo "alert('Akun admin berhasil dibuat')";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Akun admin gagal dibuat')";
            echo "</script>";
        }
        header("Location: index.php");
    }
    // End Of Add Admin

    // Signin Admin
    function sign_In_Admin($username, $password)
    {

        $sql = "SELECT * FROM admin WHERE username='$username'";
        $result = mysqli_query($this->connect_db, $sql);
        // cek username
        // if true
        if (mysqli_num_rows($result) > 0) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                $_SESSION["login_admin"] = $row["id"];
                header("Location: index.php");
                exit;
            }
        } else {
            echo '<script>';
            echo 'alert("Username Atau Password Yang Anda Masukkan Salah")';
            echo '</script>';
        }
    }
    // End Of Signin Admin
}
