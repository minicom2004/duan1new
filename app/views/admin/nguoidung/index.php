<?php $maQuanLy = 4; include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <h1 class="body_title">Danh Sách Người Dùng</h1>
    <?php if(isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
        <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
            <?php echo $_GET["thongbao"] ?>
        </div>
    <?php endif ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã Tài Khoản</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Tên tài khoản</th>
                <th>Mật khẩu</th>
                <th>Quyền</th>
                <th>
                    <a href="index.php?url=admin/nguoidung/them" class="btn-add">
                        Thêm
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($listUser as $user) : ?>
                <tr>
                    <td><?php echo $user["maTaiKhoan"] ?></td>
                    <td>
                        <img src="<?php echo IMAGES_URL . $user["avatar"] ?>" alt="avatar user" class="table-img">
                    </td>
                    <td><?php echo $user["email"] ?></td>
                    <td><?php echo $user["tenNguoiDung"] ?></td>
                    <td><?php echo $user["matKhau"] ?></td>
                    <td><?php echo $user["quyen"] == 1 ? 'Admin' : 'Khách Hàng'?></td>
                    <td>
                        <a 
                            href="index.php?url=admin/nguoidung/sua&maTaiKhoan=<?php echo $user["maTaiKhoan"] ?>" 
                            class="btn-change"
                        >
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a 
                            href="index.php?url=admin/nguoidung/xoa&maTaiKhoan=<?php echo $user["maTaiKhoan"] ?>" 
                            class="btn-delete"
                            onclick="return confirm('Bạn có chắc muốn xóa NguoiDung[<?php echo $user['maTaiKhoan'] ?>] không ?')"
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
