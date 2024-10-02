<div class="body">
    <div class="grid wide">
        <h1>Chi tiết đơn hàng</h1>
        <?php if(!empty($details)) : ?>
            <table class="tbl">
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
                <?php foreach ($details as $detail) : ?>
                <tr>
                    <td><?= $detail['maSanPham'] ?></td>
                    <td><?= $detail['tenSanPham'] ?></td>
                    <td><?= number_format($detail['gia']) ?> VNĐ</td>
                    <td><?= $detail['soLuong'] ?></td>
                </tr>
                <?php endforeach ?>
            </table>
        <?php else : ?>
            <span>Không có chi tiết đơn hàng nào.</span>
        <?php endif ?>
    </div>
</div>
