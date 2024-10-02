<?php $maQuanLy = 5; include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <h1 class="body_title">Quản Lý Bình Luận</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Số Bình Luận</th>
                <th>Mới Nhất</th>
                <th>Cũ Nhất</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($listCommentsProducts as $commentsProduct) : ?>
                <tr>
                    <td><?php echo $commentsProduct["tenSanPham"] ?></td>
                    <td><?php echo $commentsProduct["soLuongBinhLuan"] ?></td>
                    <td><?php echo $commentsProduct["ngayBinhLuanMoiNhat"] ?></td>
                    <td><?php echo $commentsProduct["ngayBinhLuanCuNhat"] ?></td>
                    <td>
                        <a 
                            style="display: block; padding: 4px 0; border: 1px solid #000; text-decoration: none; color: #000;"
                            href="index.php?url=admin/binhluan/chitiet&maSanPham=<?php echo $commentsProduct["maSanPham"] ?>"
                        >
                            Xem Chi Tiết
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
</div>

<?php include VIEWS_URL . "admin/footer.php" ?>
