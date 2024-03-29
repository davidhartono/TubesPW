<?php

include 'header.php';

echo "<link rel='stylesheet' href='css/invoice.css'>";

if (empty($_SESSION['username'])) {
    header("Location: ./admin/error.php");
}
?>
<section class="cart">
    <div class="content">

        <?php
        $username = $_SESSION['username'];

        $query = mysqli_query($koneksi, "SELECT * FROM orderan WHERE username = '$username'");
        if (mysqli_num_rows($query) > 0) {
        ?>
        <h3 class="harga">Purchase History</h3>
        <table class="table">
            <tr>
                <th>Date</th>
                <th>Order ID</th>
                <th>Product Name</th>
                <th class="quantity">Quantity</th>
                <th>Price</th>
                <th>Status</th>
            </tr>

            <tr>
                <?php
                while ($data = mysqli_fetch_assoc($query)) {

                ?> <td>
                    <?= $data['tanggal'] ?>
                </td>
                <td>
                    <?= $data['orderid'] ?>
                </td>
                <td>
                    <div class="cart-info">
                        <div>
                            <h5 style="text-transform: capitalize;"><?= $data['produk']; ?></h5>
                        </div>
                    </div>
                </td>

                <td class="quantity">
                    <?= $data['item']; ?>
                </td>
                <td>
                    <?= $data['harga'] * $data['item'] ?>
                </td>
                <td>
                    <div class="status">

                        <h5 style=""><?= $data['status']; ?></h5>

                    </div>
                </td>
            </tr>
            <?php
                }
        ?>
        </table>
    </div>
    <?php
        } else {
?>
    <div class="contenta">
        <h4>Oh, looks like your purchase history is empty.</h4>
        <p>Let's find your favourite coffee and tea!</p>
        <a href="menu.php" class="menu-btn">Menu</a>
    </div>
    <?php
        }
?>
</section>

<?php


include 'footer.php';

?>