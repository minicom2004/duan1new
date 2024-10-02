<div class="body">
    <div class="grid wide">
        <h1>Giỏ hàng của tôi</h1>
        <?php if(!empty($carts)) : ?>
            <table class="tbl">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thao tác</th>
                </tr>
                <?php foreach ($carts as $cart) : ?>
                <tr>
                    <td><img style="border-radius: 10px" width="100px" src="<?= IMAGES_URL . $cart['anh'] ?>" alt=""></td>
                    <td><?= $cart['tenSanPham'] ?></td>
                    <td><?= number_format($cart['gia']) ?> VNĐ</td>
                    <td>
                        <a href="?url=updategiohang&action=giam&maSanPham=<?= $cart['maSanPham'] ?>" class="btn-a">-</a>
                        <?= $cart['soLuong'] ?>
                        <a href="?url=updategiohang&action=tang&maSanPham=<?= $cart['maSanPham'] ?>" class="btn-a">+</a>
                    </td>
                    <td>
                        <a href="?url=deletegiohang&maSanPham=<?= $cart['maSanPham'] ?>" onclick="return confirm('Bạn chắc chứ')" class="btn-a">Xóa</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <a href="?url=thanhtoan" class="checkout">Thanh toán</a>
        <?php else : ?>
            <span>Giỏ hàng trống</span>
        <?php endif ?>
    </div>
</div>