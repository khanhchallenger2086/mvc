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
            <a class='btn btn-primary btn-sm' href="<?= url("suplier", "suplier_add") ?>">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
                        <th class='text-center'>Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list as $item) {
                    ?>
                    <tr>
                        <td><?= $item->ma ?></td>
                        <td><?= $item->ten ?></td>
                        <td><?= $item->diachi ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->sdt ?></td>
                        <td><?= $item->trangthai == 1 ? "<span class='badge badge-success'>Hiện</span>"  : "<span class='badge badge-secondary'>Ẩn</span>" ?>
                        </td>
                        <td class='text-right'>
                            <!-- <a class='btn btn-primary btn-sm' href="">Xem</a> -->
                            <a onclick="return confirm('bạn có chắc xóa không??')" class='btn btn-danger btn-sm'
                                href="<?= url("product", "product_remove", ["ma" => $item->ma]) ?>">Xóa</a>
                            <a class='btn btn-success btn-sm'
                                href="<?= url("product", "product_repair", ["ma" => $item->ma]) ?>">Sửa</a>
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