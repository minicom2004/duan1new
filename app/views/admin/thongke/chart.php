<?php $maQuanLy = 6; include VIEWS_URL . "admin/dasboard.php" ?>

<div class="body">
    <div class="directional">
            <a href="?url=admin/thongke" class="directional-page">Thống kê</a><span class="directional-icon">></span>
            <a href="#" class="directional-page directional-page--active disabled">Biểu Đồ Thống Kê</a>
    </div>
    <h1 class="body_title">Tỷ Lệ Danh Mục</h1>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages : [ "corechart" ]
        });
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                    [ 'Danh Mục', 'Số Lượng' ],
                    <?php foreach ($listThongKeDanhMuc as $thongKeDanhMuc) : ?>
                        ["<?php echo $thongKeDanhMuc["tenDanhMuc"] . " (" . $thongKeDanhMuc["tenLoai"] . ")" ?>",
                        <?php echo $thongKeDanhMuc["soSanPham"]?>],
                    <?php endforeach ?>
                ]);

            var options = {
                is3D : true,
            };

            var chart = new google.visualization.PieChart(document
                    .getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>

    <div>
    <div id="myChart" style="width: 100%; height: 400px;"></div>
    </div>

    
 
</div>

<?php include VIEWS_URL . "admin/footer.php" ?>
