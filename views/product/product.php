<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Show Products</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <a class='btn btn-primary btn-sm' href="<?= url("products", "product_add") ?>">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Hình đại diện</th>
                        <th>Tên</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th class="text-center">Trạng thái</th>
                        <th class='text-center'>Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list as $item) {
                    ?>
                    <tr>
                        <td><?= $item->mahienthi ?></td>
                        <td><img src="<?= $item->hinh ?>" alt="" width='50px' height='50px'></td>
                        <td><?= $item->ten ?></td>
                        <td><?= number_format($item->soluong) ?></td>
                        <td><?= number_format($item->dongia) ?></td>
                        <td class="text-center">
                            <?php
                                if ($item->trangthai == 1) {
                                ?>
                            <a style="font-size: 20px;" href="<?= url("products", "product_hidden", ["ma" => $item->ma]) ?>" class="badge badge-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                            <?php
                                } else {
                                ?>
                            <a style="font-size: 20px;" href="<?= url("products", "product_show", ["ma" => $item->ma]) ?>" class="badge badge-secondary"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                            <?php
                                }
                                ?>
                        </td>
                        <td class='text-center'>
                            <!-- <a class='btn btn-primary btn-sm' href="">Xem</a> -->
                            <a onclick="return confirm('bạn có chắc xóa không??')" class='btn btn-danger btn-sm'
                                href="<?= url("products", "product_remove", ["ma" => $item->ma]) ?>">Xóa</a>
                            <a class='btn btn-success btn-sm'
                                href="<?= url("products", "product_repair", ["ma" => $item->ma]) ?>">Sửa</a>
                        </td>
                    </tr>
                    <?php

                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>