<?php $maQuanLy = 7; include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <h1 class="body_title">Quản Lý Đơn Hàng</h1>
    <table class="table table-striped">
        <?php if(!empty($orders)) : ?>
            <table class="table table-striped ">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng giá trị</th>
                    <th>Trạng thái</th>
                    <th>Tiến trình</th>
                    <th>Địa chỉ giao hàng</th>
                    <th>Chi tiết</th>
                </thead>
                <?php foreach ($orders as $order) : ?>
                <tbody  class="table-group-divider">
                    <td><?= $order['maDonHang'] ?></td>
                    <td><?= $order['ngayDat'] ?></td>
                    <td><?= number_format($order['tongGiaTri']) ?> VNĐ</td>
                    <td><?= ($order['trangThai'] == 0) ? "Chưa thanh toán" : $order['trangThai'] ?></td>
                    <td><?= $order['tienTrinh'] ?></td>
                    <td><?= $order['diaChi'] ?></td>
                    <td>
                        <a class="action-order" href="?url=admin/donhang/chitiet&maDonHang=<?= $order['maDonHang'] ?>">Chi tiết</a>
                        <a class="action-order green" href="?url=admin/donhang/capnhat&maDonHang=<?= $order['maDonHang'] ?>&col=trangThai&value=Đã thanh toán">Đã thanh toán</a>
                        <a class="action-order red" href="?url=admin/donhang/capnhat&maDonHang=<?= $order['maDonHang'] ?>&col=trangThai&value=Chưa thanh toán">Chưa thanh toán</a>
                        <a class="action-order green" href="?url=admin/donhang/capnhat&maDonHang=<?= $order['maDonHang'] ?>&col=tienTrinh&value=Đang giao hàng">Đang giao hàng</a>
                        <a class="action-order green" href="?url=admin/donhang/capnhat&maDonHang=<?= $order['maDonHang'] ?>&col=tienTrinh&value=Đã giao hàng">Đã giao hàng</a>
                        <a class="action-order red" href="?url=admin/donhang/xoa&maDonHang=<?= $order['maDonHang'] ?>" onclick="return confirm('Bạn chắc chứ??')">Xóa đơn hàng</a>
                    </td>
                </tbody>
                <?php endforeach ?>
            </table>
        <?php else : ?>
            <span>Bạn chưa có sản phẩm nào trong giỏ hàng</span>
        <?php endif ?>
    </table>
</div>

<?php include VIEWS_URL . "admin/footer.php" ?>
