<link rel="stylesheet" href="<?php echo CSS_URL ?>loc.css">
<!-- BODY -->
<div class="body">
    <div class="grid wide">
        <!-- Điều hướng -->
        <div class="directional">
            <a href="?" class="directional-page">Trang chủ</a><span class="directional-icon">></span>
            <a href="#" class="directional-page directional-page--active disabled"><?php echo $loai["tenLoai"]?></a>
        </div>

        <div class="container">
            <div class="type-products">
                <h1 class="type-products_heading">
                    <?php echo $loai["tenLoai"]?>
                    <i class="fa-solid fa-shirt type-products_icon"></i>
                </h1>
                <div class="type-products_items">
                    <!-- type-products_item--active disabled -->
                    <?php if(isset($listDanhMuc)) : ?>
                        <?php foreach($listDanhMuc as $danhmuc) : ?>
                        <a
                            class="type-products_item <?php echo $danhmuc["maDanhMuc"] == $maDanhMuc ? 'type-products_item--active disabled' : '' ?>"
                            href="?url=loc&maLoai=<?php echo $maLoai ?>&maDanhMuc=<?php echo $danhmuc["maDanhMuc"]?>"
                            
                        >
                            <?php echo $danhmuc["tenDanhMuc"]?>
                        </a>
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php if(!isset($listDanhMuc)) : ?>
                        <a class="type-products_item type-products_item--active disabled" href="#">Không Có Danh Mục</a>
                    <?php endif ?>
                </div>
            </div>
            <div class="filter-products">
                <div class="filter-products_top">
                    <h1 class="filter-text">
                        Kết Quả: 
                        <span class="badge bg-danger">
                                <?php echo isset($products) ? count($products) : 0 ?>
                        </span>
                    </h1>
                    <?php if(isset($products) && $products) :?>
                        <form
                            action="?url=loc&maLoai=<?php echo $maLoai ?? '' ?>&maDanhMuc=<?php echo $maDanhMuc ?? '' ?>"
                            method="post"
                            class="form-filter"
                        >
                            <p class="filter-text">Sắp Xếp Theo</p>
                            <select name="filter-type" id="" class="filter-options">
                                <option value="1" <?php echo isset($filter) ? ($filter == 1 ? 'selected' : '') : ''?>>Tất cả sản phẩm</option>
                                <option value="2" <?php echo isset($filter) ? ($filter == 2 ? 'selected' : '') : ''?>>Giá từ thấp đến cao</option>
                                <option value="3" <?php echo isset($filter) ? ($filter == 3 ? 'selected' : '') : ''?>>Giá từ cao đến thấp</option>
                                <option value="4" <?php echo isset($filter) ? ($filter == 4 ? 'selected' : '') : ''?>>Mua nhiều nhất</option>
                            </select>
                        </form>
                    <?php endif ?>
                </div>
                <div class="products grid">
                    <div class="row">
                        <?php
                            $soCot = 'l-3';
                            include VIEWS_URL . "products/index.php";
                        ?>
                    </div>
                    <div class="products-empty">
                        <?php if(!isset($products) || !$products) : ?>
                            <img src="<?php echo IMAGES_URL ?>empty/product.png" alt="" class="products-empty_img">
                            <p>Không Có Sản Phẩm Nào</p>
                        <?php endif ?>
                    </div>

                </div>

            </div>
        </div>

    </div>
    
</div>

<script src="<?php echo JS_URL ?>loc.js"></script>