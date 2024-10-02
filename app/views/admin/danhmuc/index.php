<?php $maQuanLy = 2; include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <!-- <div class="directional">
        <a href="#" class="directional-page">Trang chủ</a><span class="directional-icon">></span>
        <a href="#" class="directional-page directional-page--active disabled">Nam</a>
    </div> -->
    <h1 class="body_title">Quản lý danh mục</h1>
    <?php if(isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
        <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
            <?php echo $_GET["thongbao"] ?>
        </div>
    <?php endif ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã Danh Mục</th>
                <th>Tên Danh Mục</th>
                <th>Tên Loại</th>
                <th>
                    <a href="index.php?url=admin/danhmuc/them" class="btn-add">
                        Thêm
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($listDanhMuc as $danhmuc) :?>
                <tr>
                    <td><?php echo $danhmuc["maDanhMuc"] ?></td>
                    <td><?php echo $danhmuc["tenDanhMuc"] ?></td>
                    <td><?php echo $danhmuc["tenLoai"] ?></td>
                    <td>
                        <a 
                            href="index.php?url=admin/danhmuc/sua&maDanhMuc=<?php echo $danhmuc["maDanhMuc"] ?>" 
                            class="btn-change"
                        >
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a 
                            href="index.php?url=admin/danhmuc/xoa&maDanhMuc=<?php echo $danhmuc["maDanhMuc"] ?>" 
                            class="btn-delete"
                            onclick="return confirm('Bạn có chắc muốn xóa DanhMuc[<?php echo $danhmuc['maDanhMuc'] ?>] không ?')"
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

