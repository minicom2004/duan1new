<?php $maQuanLy = 6; include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <h1 class="body_title">Thống kê</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Danh Mục</th>
                <th>Số Lượng</th>
                <th>Giá Cao Nhất</th>
                <th>Giá Thấp Nhất</th>
                <th>Giá Trung Bình</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($listThongKeDanhMuc as $thongKeDanhMuc) : ?>
                <tr>
                    <td><?php echo $thongKeDanhMuc["tenDanhMuc"] . " (" . $thongKeDanhMuc["tenLoai"] . ")" ?></td>
                    <td><?php echo $thongKeDanhMuc["soSanPham"] ?></td>
                    <td><?php echo $thongKeDanhMuc["giaThapNhat"] . " VND" ?></td>
                    <td><?php echo $thongKeDanhMuc["giaCaoNhat"] . " VND" ?></td>
                    <td><?php echo $thongKeDanhMuc["giaTrungBinh"] . " VND" ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a
        href="?url=admin/thongke/bieudo" 
        style="display: inline-block;
                padding: 4px 8px;
                margin-top: 18px;
                border: 1px solid #000;
                text-decoration: none;
                color: #000;"        
    >
    Xem Biểu Đồ
    </a>
</div>

<?php include VIEWS_URL . "admin/footer.php" ?>