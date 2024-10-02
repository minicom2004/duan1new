<?php $maQuanLy = 1; include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <h1 class="body_title">Quản lý loại</h1>
    <?php if(isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
        <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
            <?php echo $_GET["thongbao"] ?>
        </div>
    <?php endif ?>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã loại</th>
                <th>Tên Loại</th>
                <th>
                    <a href="index.php?url=admin/loai/them" class="btn-add">
                        Thêm
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($listLoai as $loai) : ?>
                <tr>
                    <td><?php echo $loai["maLoai"] ?></td>
                    <td><?php echo $loai["tenLoai"] ?></td>
                    <td>
                        <a
                            href="index.php?url=admin/loai/sua&maLoai=<?php echo $loai["maLoai"] ?>" 
                            class="btn-change"
                        >
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a 
                            href="index.php?url=admin/loai/xoa&maLoai=<?php echo $loai["maLoai"] ?>" 
                            class="btn-delete"
                            onclick="return confirm(`Bạn có chắc muốn xóa Loai=[<?php echo $loai['maLoai']?>] không ?`)"
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

    