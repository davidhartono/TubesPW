<?php
require "../includes/koneksi.php";

if (empty($_SESSION['username'])) {
    header("Location: error.php");
}

$id = $_GET["id"];

$queryHapus = mysqli_query($koneksi, "DELETE FROM akun WHERE id = '$id'");

if ($queryHapus) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Akun</title>
</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        icon: 'success',
        text: 'Akun Berhasil Dihapus'
    }).then(function() {
        window.location = "akun.php";
    })
    </script>
    <?php
} else {
    echo mysqli_error($koneksi);
}
    ?>