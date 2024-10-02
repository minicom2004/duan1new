<?php $maQuanLy = 3; include VIEWS_URL . "admin/dasboard.php" ?>
<div class="body">
    <div class="directional">
        <a href="?url=admin/sanpham" class="directional-page">Quản lý sản phẩm</a><span class="directional-icon">></span>
        <a href="#" class="directional-page directional-page--active disabled">Thêm</a>
    </div>
    <h1 class="body_title">Thêm sản phẩm</h1>
    <form action="?url=admin/sanpham/them" method="post" class="form-features" enctype="multipart/form-data">
        <?php if(isset($thongbao)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $thongbao ?>
            </div>
        <?php endif ?>
        <div class="form-features_item">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="tenSanPham" value="<?php echo $tenSanPham ?? '' ?>">
            <div class="form-features_error"><?php echo $errors["sanpham_ten"] ?? ''?></div>
        </div>
        <div class="form-features_item">
            <label for="">Danh Mục</label>
            <select name="maDanhMuc">
                <?php foreach($listDanhMuc as $danhMuc) : ?>
                <option 
                    value="<?php echo $danhMuc["maDanhMuc"]?>"
                    <?php echo isset($maDanhMuc) ?? ($maDanhMuc == $danhMuc["maDanhMuc"] ? 'selected' : '') ?>
                >
                    <?php echo $danhMuc["tenDanhMuc"] . " (" . $danhMuc["tenLoai"] . ")"?>
                </option>
                <?php endforeach ?>
            </select>
            <div class="form-features_error"><?php echo $errors["sanpham_danhmuc"] ?? ''?></div>
        </div>
        <div class="form-features_item">
            <label for="">Giá</label>
            <input type="number" name="gia" step="0.01" value="<?php echo $gia ?? '' ?>">
            <div class="form-features_error"><?php echo $errors["sanpham_gia"] ?? ''?></div>
        </div>
        <div class="form-features_item">
            <label for="">Số Lượng</label>
            <input type="number" name="soLuong" value="<?php echo $soLuong ?? '' ?>">
            <div class="form-features_error"><?php echo $errors["sanpham_soluong"] ?? ''?></div>
        </div>
        <div class="form-features_item">
            <label for="">Ảnh</label>
            <?php if(isset($imageName)) : ?>
                <img src="<?php echo IMAGES_URL . $imageName ?>" alt="" class="table-img">
                <input type="hidden" name="anhCu" value="<?php echo $imageName ?>">
            <?php endif ?>
            <input type="file" name="anh">
            <div class="form-features_error"><?php echo $errors["sanpham_anh"] ?? ''?></div>
        </div>
        <div class="form-features_item">
            <label for="">Mô Tả</label>
            <textarea name="moTa" cols="30" rows="10"><?php echo $moTa ?? '' ?></textarea>
            <div class="form-features_error"><?php echo $errors["sanpham_mota"] ?? ''?></div>
        </div>
        <div class="form-features_item">
            <label for="">Trạng thái</label>
            <select name="trangThai">
                <option 
                    <?php echo isset($trangThai) ?? ($trangThai == 1 ? 'selected' : '')?>
                    value="1"
                >   Hiện
                </option>
                <option 
                    <?php echo isset($trangThai) ?? ($trangThai == 0 ? 'selected' : '')?>
                    value="0"
                >   Ẩn
                </option>
            </select>
            <div class="form-features_error"></div>
        </div>
        <button type="submit" class="btn-add" style="margin-top: 42px;">Thêm</button>
    </form>
</div>
<?php include VIEWS_URL . "admin/footer.php" ?>