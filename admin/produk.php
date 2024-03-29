<?php
require "../includes/koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($query);

if (empty($_SESSION['username'])) {
    header("Location: error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap5.min.css">
</head>

<body>
    <div id="app">
        <?php include("../includes/sidebar.php"); ?>
        <div id="main">
            <?php include("../includes/tombollogout.php") ?>
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Produk</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header mb-2">
                                        <h4>List Produk</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="tambahproduk.php" class="btn btn-primary mb-3"><i class="fa-solid fa-cart-plus"></i>&nbsp;&nbsp;Tambah
                                            Produk</a>
                                        <div class="mt-2">

                                            <div class="table-responsive mt-3" id="tabelwrapper">
                                                <table class="table table-striped" id="tabelproduk">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Foto</th>
                                                            <th>Nama</th>
                                                            <th>Harga</th>
                                                            <th>Kategori</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($jumlahProduk == 0) {
                                                        ?>
                                                        <tr>
                                                            <td class="text-center" colspan="6">Data produk tidak
                                                                tersedia</td>
                                                        </tr>
                                                        <?php
                                                        } else {
                                                            $jumlah = 1;
                                                            while ($data = mysqli_fetch_array($query)) {

                                                            ?>
                                                        <tr>
                                                            <td><?= $jumlah ?></td>
                                                            <td><img src="./upload/<?= $data['foto'] ?>" width="100">
                                                            </td>
                                                            <td style="text-transform: capitalize;"><?= $data['nama'] ?></td>
                                                            <td><?= number_format($data['harga']) ?></td>
                                                            <td><?= $data['kategori'] ?></td>
                                                            <td class="text-center">
                                                                <a href="produk-detail.php?p=<?= $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i>&nbsp;Detail</a> |
                                                                <a href="update-produk.php?p=<?= $data['id']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Update</a>
                                                                |
                                                                <a href="delete-produk.php?p=<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin menghapus')"><i class="fa-solid fa-trash"></i>&nbsp;Delete</a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                                $jumlah++;
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Coftea</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
    <script>
    $(document).ready(function() {
        var table = $('#tabelproduk').DataTable({
            buttons: ['copy', 'csv', 'excel', 'pdf', 'colvis'],
            dom: "<'row'<'col-md-3'l><'col-md-6'B><'col-md-3'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>"
        });

        table.buttons().container()
            .appendTo('#tabelwrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>