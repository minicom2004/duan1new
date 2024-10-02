<div class="body">
    <div class="grid wide">
        <h1>Thanh toán</h1>
        <?php if(!empty($carts)) : ?>
            <table class="tbl">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                </tr>
                <?php $total = 0; ?>
                <?php foreach ($carts as $cart) : ?>
                <tr>
                    <td><img style="border-radius: 10px" width="100px" src="<?= IMAGES_URL . $cart['anh'] ?>" alt=""></td>
                    <td><?= $cart['tenSanPham'] ?></td>
                    <td><?= number_format($cart['gia']) ?> VNĐ</td>
                    <td>
                        <?= $cart['soLuong'] ?>
                    </td>
                    <?php $subToal = $cart['gia'] * $cart['soLuong']; ?>
                    <td><?= number_format($subToal) ?> VNĐ</td>
                </tr>
                <?php $total += $subToal ?>
                <?php endforeach ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?= number_format($total) ?> VNĐ</th>
                </tr>
            </table>
            <form action="" method="POST" class="form">
                <div class="form-group mt-4">
                    <div class="row">
                    <div class="col-6">
                        <label for="">Địa chỉ giao hàng</label>
                        <input type="text" class="form-control" name="diaChi" placeholder="Nhập địa chỉ giao hàng" required>
                    </div>
                    <div class="col-6">
                        <label for="">Số điện thoại</label>
                        <input type="text" class="form-control" name="soDienThoai" placeholder="Nhập số điện thoại" required>
                    </div>
                    <input type="hidden" class="form-control" name="tongGiaTri" value="<?= $total ?>">
                    </div>
                </div>
                <button class="checkout-btn" name="checkout">Thanh toán</button>
            </form>
        <?php else : ?>
            <span>Bạn chưa có sản phẩm nào trong giỏ hàng</span>
        <?php endif ?>
    </div>
</div>