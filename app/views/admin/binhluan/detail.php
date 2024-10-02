<?php $maQuanLy = 5; include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <div class="directional">
        <a href="?url=admin/binhluan" class="directional-page">Quản lý bình luận</a><span class="directional-icon">></span>
        <a href="#" class="directional-page directional-page--active disabled"><?php echo $sanPham["tenSanPham"] ?></a>
    </div>
    <h1 class="body_title">Quản Lý Bình Luận</h1>
    <?php if(isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
        <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
            <?php echo $_GET["thongbao"] ?>
        </div>
    <?php endif ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên Tài Khoản</th>
                <th>Nội Dung</th>
                <th>Ngày Bình Luận</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($listComments as $comment) : ?>
                <tr>
                    <td><?php echo $comment["tenNguoiDung"] ?></td>
                    <td><?php echo $comment["noiDung"] ?></td>
                    <td><?php echo $comment["ngayBinhLuan"] ?></td>
                    <td>
                        <a 
                            href="index.php?url=admin/binhluan/xoa&maSanPham=<?php echo $maSanPham ?>&maBinhLuan=<?php echo $comment["maBinhLuan"] ?>" 
                            class="btn-delete"
                            onclick="return confirm('Bạn có chắc muốn xóa BinhLuan[<?php echo $comment['maBinhLuan'] ?>] không ?')"
                        >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
</div>

<?php include VIEWS_URL . "admin/footer.php" ?>
