<?php
require './layout/headerIndex.php';
require './controller/cartController.php';
$cart = new cartController();



$postRequest = array(
    'firstFieldData' => 'foo',
    'secondFieldData' => 'bar'
);

$cURLConnection = curl_init('https://app.sandbox.midtrans.com/snap/v1/transactions');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Header-Key: Header-Value',
    'Header-Key-2: Header-Value-2'
));
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);


$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);

// $apiResponse - available data from the API request
$jsonArrayResponse - json_decode($apiResponse);










?>
<section class="cart">
    <div class="container cart-page">

        <h2>Cart</h2>
        <?php if (isset($_SESSION['alert']['success'])) : ?>
            <div style="background-color: green; padding: 20px; color: #FFFFFF; margin-bottom: 10px; border-radius: 5px; opacity: 50%;"><?= $_SESSION['alert']['success']; ?></div>
        <?php elseif (isset($_SESSION['alert']['failed'])) : ?>
            <div style="background-color: red; padding: 20px; color: #FFFFFF; margin-bottom: 10px; border-radius: 5px; opacity: 50%;"><?= $_SESSION['alert']['failed']; ?></div>
        <?php endif ?>
        <div class="project">
            <div class="shop">
                <?php if ($cart->getCartItemById($_SESSION['userdata']['id_users']) != null) : ?>
                    <?php foreach ($cart->getCartItemById($_SESSION['userdata']['id_users']) as $c) : ?>
                        <div class="box">
                            <img src="https://bukuajar.com/wp-content/uploads/2020/07/ba-2-1.jpg">
                            <div class="content">
                                <h4><?= $c['judul']; ?></h4>
                                <p><?= $c['author']; ?></p>
                                <p>Rate: <?= $c['rate_book']; ?></p>
                                <h4 class="unit">Rp.<?= number_format($c['harga'], 2) ?></h4>
                                <p class="btn-area"><i aria-hidden="true" class="fa fa-trash"></i> <span onclick="if (confirm('apakah anda yakin ingin menghapus?')) window.location.href='deleteCart.php?id_users=<?= $_SESSION['userdata']['id_users']; ?>&id_book=<?= $c['id_book']; ?>';" class="btn2">Remove</span></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>

                <?php
                if ($cart->getCartItemById($_SESSION['userdata']['id_users']) != null) {
                    $total = array_sum(array_column($cart->getCartItemById($_SESSION['userdata']['id_users']), 'harga'));
                }
                ?>
            </div>
            <div class="right-bar">
                <form action="" method="post">
                    <div class="form-grup">
                        <label for="subtotal">subtotal item</label>
                        <input type="text" name="subtotal_item" value="Rp. <?= isset($total) ? number_format($total, 2) : "" ?>" disabled>
                    </div>
                    <div class="form-grup">
                        <label for="pajak">subtotal diskon</label>
                        <input type="text" name="subtotal_diskon" value="Rp. 0,0" disabled>
                    </div>
                    <div class="form-grup">
                        <label for="pengirirman">total pembayaran</label>
                        <input type="text" name="total_pembayaran" value="Rp. <?= isset($total) ? number_format($total, 2) : "" ?>" disabled>
                    </div>
                </form>
                <a href="#" name="submit"><i class="fas badge fa-shopping-cart"></i>Checkout</a>
            </div>
        </div>
    </div>
</section>

<?php unset($_SESSION['alert']) ?>
<?php include_once './layout/footerIndex.php'; ?>