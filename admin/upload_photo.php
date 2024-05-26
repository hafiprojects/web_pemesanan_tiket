<?php
function uploadPhoto($file, $targetDir = '../uploads/')
{
    // Tentukan ekstensi yang diperbolehkan
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    // Ambil informasi file
    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Ambil ekstensi file
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Periksa apakah ekstensi file diperbolehkan
    if (!in_array($fileExt, $allowedExtensions)) {
        return "ExtensionNotValid";
        // return "Ekstensi file tidak diperbolehkan. Hanya jpg, jpeg, png, dan gif yang diperbolehkan.";
    }

    // Periksa apakah ada error saat mengunggah
    if ($fileError !== 0) {
        return "ErrorUploadingFile";
        // return "Ada kesalahan saat mengunggah file.";
    }

    // Tentukan target path untuk menyimpan file
    $targetFilePath = $targetDir . uniqid() . '.' . $fileExt;

    // Pindahkan file dari folder temporer ke target folder
    if (move_uploaded_file($fileTmpName, $targetFilePath)) {
        $targetFilePath = preg_replace('/\.\.\//', '', $targetFilePath);
        return $targetFilePath;
    } else {
        // return "Gagal mengunggah file.";
        return "ErrorUploadingFile";
    }
}
