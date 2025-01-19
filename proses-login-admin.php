<?php
include "koneksidb.php";

if (isset($_POST["LoginAdmin"])) {
    $user = $mysqli->escape_string($_POST["username"]);
    $pass = $_POST["password"]; // Ambil password tanpa hashing

    // Ambil data user berdasarkan username
    $sql = "SELECT * FROM tbl_admin WHERE username_admin='$user'";
    $res = $mysqli->query($sql);

    if ($res && $res->num_rows == 1) {
        $data = $res->fetch_assoc();

        // Hash password input dengan SHA-1 untuk mencocokkan dengan hash di database
        $hashed_pass = sha1($pass); // Hash password input menggunakan SHA-1

        // Verifikasi password dengan mencocokkan hasil hash
        if ($hashed_pass === $data["password_admin"]) {
            session_start();
            $_SESSION["id_admin"] = $data["id_admin"];
            $_SESSION["username_admin"] = $data["username_admin"];
            $_SESSION["nama_admin"] = $data["nama_admin"];
            header("Location: admin/index.php");
        } else {
            echo "<script>window.alert('Password salah!'); window.location.href=('administrator.php');</script>";
        }
    } else {
        echo "<script>window.alert('Username tidak ditemukan!'); window.location.href=('administrator.php');</script>";
    }
}
?>
