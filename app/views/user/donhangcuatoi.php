<div class="body">
    <div class="grid wide">
        <h1>Đơn hàng của tôi</h1>
        <?php if(!empty($orders)) : ?>
            <table class="tbl">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng giá trị</th>
                    <th>Trạng thái</th>
                    <th>Tiến trình</th>
                    <th>Địa chỉ giao hàng</th>
                    <th>Chi tiết</th>
                </tr>
                <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?= $order['maDonHang'] ?></td>
                    <td><?= $order['ngayDat'] ?></td>
                    <td><?= number_format($order['tongGiaTri']) ?> VNĐ</td>
                    <td><?= ($order['trangThai'] == 0) ? "Chưa thanh toán" : $order['trangThai'] ?></td>
                    <td><?= $order['tienTrinh'] ?></td>
                    <td><?= $order['diaChi'] ?></td>
                    <td><a href="?url=chitietdonhanguser&maDonHang=<?= $order['maDonHang'] ?>">Chi tiết</a></td>
                    <td><a onclick="return confirm('Bạn chắc chứ?')" href="?url=xoadonhanguser&maDonHang=<?= $order['maDonHang'] ?>">Hủy đơn hàng</a></td>
                </tr>
                <?php endforeach ?>
            </table>
        <?php else : ?>
            <span>Bạn chưa có sản phẩm nào trong giỏ hàng</span>
        <?php endif ?>
    </div>
</div>