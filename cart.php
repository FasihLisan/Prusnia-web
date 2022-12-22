<?php require './layout/headerIndex.php'; ?>

<section class="cart">
    <div class="container cart-page">
        <h2>Cart</h2>
        <div class="project">
            <div class="shop">

                <div class="box">
                    <img src="https://bukuajar.com/wp-content/uploads/2020/07/ba-2-1.jpg">
                    <div class="content">
                        <h4>Perkembangan Uang Dalam Sejarah Dunia</h4>
                        <p>Author: Salman Alrosyid</p>
                        <p>Rate: 4.0/5</p>
                        <h4 class="unit">Price: RP.45.000</h4>
                        <p class="btn-area"><i aria-hidden="true" class="fa fa-trash"></i> <span class="btn2">Remove</span></p>
                    </div>
                </div>

            </div>
            <div class="right-bar">
                <form action="" method="post">
                    <div class="form-grup">
                        <label for="subtotal">subtotal item</label>
                        <input type="text" name="subtotal_item" disabled>
                    </div>
                    <div class="form-grup">
                        <label for="pajak">subtotal diskon</label>
                        <input type="text" name="subtotal_diskon" disabled>
                    </div>
                    <div class="form-grup">
                        <label for="pengirirman">total pembayaran</label>
                        <input type="text" name="total_pembayaran" disabled>
                    </div>
                </form>
                <a href="#" name="submit"><i class="fas badge fa-shopping-cart"></i>Checkout</a>
            </div>
        </div>
    </div>
</section>


<?php include_once './layout/footerIndex.php' ?>