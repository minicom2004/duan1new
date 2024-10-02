<?php $maQuanLy = 7;
include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <h1 class="body_title">Chi Tiết Đơn Hàng</h1>
    <?php if (isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
        <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
            <?php echo $_GET["thongbao"] ?>
        </div>
    <?php endif ?>
    <div class="grid wide">
        <?php if(!empty($details)) : ?>
            <table class="table table-striped">
                <thead>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </thead>
                <?php foreach ($details as $detail) : ?>
                <tbody class="table-group-divider">
                    <td><?= $detail['maSanPham'] ?></td>
                    <td><?= $detail['tenSanPham'] ?></td>
                    <td><?= number_format($detail['gia']) ?> VNĐ</td>
                    <td><?= $detail['soLuong'] ?></td>
                </tbody>
                <?php endforeach ?>
            </table>
        <?php else : ?>
            <span>Không có chi tiết đơn hàng nào.</span>
        <?php endif ?>
    </div>
</div>

<?php include VIEWS_URL . "admin/footer.php" ?>

