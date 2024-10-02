<?php $maQuanLy = 3; include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <h1 class="body_title">Quản lý sản phẩm</h1>
    <?php if(isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
        <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
            <?php echo $_GET["thongbao"] ?>
        </div>
    <?php endif ?>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Trạng Thái</th>
                <th>Tên Danh Mục</th>
                <th>
                    <a href="index.php?url=admin/sanpham/them" class="btn-add">
                        Thêm
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($listSanPham as $sanPham) : ?>
                <tr>
                    <td><?php echo $sanPham["maSanPham"] ?></td>
                    <td>
                        <img src="<?php echo IMAGES_URL . $sanPham["anh"] ?>" alt="product image" class="table-img">
                    </td>
                    <td><?php echo $sanPham["tenSanPham"] ?></td>
                    <td><?php echo $sanPham["gia"] . " VND" ?></td>
                    <td><?php echo $sanPham["trangThai"] == 1 ? 'Hiện' : 'Ẩn'?></td>
                    <td><?php echo $sanPham["tenDanhMuc"] . " (" . $sanPham["tenLoai"] . ")" ?></td>
                    <td>
                        <a 
                            href="index.php?url=admin/sanpham/sua&maSanPham=<?php echo $sanPham["maSanPham"] ?>" 
                            class="btn-change"
                        >
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a 
                            href="index.php?url=admin/sanpham/xoa&maSanPham=<?php echo $sanPham["maSanPham"] ?>" 
                            class="btn-delete"
                            onclick="return confirm('Bạn có chắc muốn xóa SanPham[<?php echo $sanPham['maSanPham'] ?>] không ?')"
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
