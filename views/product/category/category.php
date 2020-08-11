<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách các danh mục</h2>
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
            <a class='btn btn-primary btn-sm' href="<?= url("category", "category_add") ?>">Thêm danh mục</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Hình</th>
                        <th>Mô tả</th>
                        <th>Bí danh</th>
                        <th class="text-center">Trạng thái</th>
                        <th class='text-center'>Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list as $item) {
                    ?>
                    <tr>
                        <td><?= $item->ma ?></td>
                        <td class="text-center"><?= $item->ten ?></td>
                        <td class="text-center"><img width="auto" height="50px" src="<?= $item->hinh ?>" alt=""> </td>
                        <td><?= $item->mota ?></td>
                        <td><?= $item->alias == "Danh mục cha" ? "Danh mục cha" : "Danh mục con" ?></td>
                        <td class="text-center">
                            <?php
                                if ($item->trangthai == 1) {
                                ?>
                            <a style="font-size: 20px;" href="<?= url("category", "category_hidden", ["ma" => $item->ma]) ?>" class="badge badge-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                            <?php
                                } else {
                                ?>
                            <a style="font-size: 20px;" href="<?= url("category", "category_show", ["ma" => $item->ma]) ?>" class="badge badge-secondary"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                            <?php
                                }
                                ?>
                        </td>
                        <td class='text-right'>
                            <!-- <a class='btn btn-primary btn-sm' href="">Xem</a> -->
                            <a onclick="return confirm('bạn có chắc xóa không??')" class='btn btn-danger btn-sm'
                                href="<?= url("category", "category_remove", ["ma" => $item->ma]) ?>">Xóa</a>
                            <a class='btn btn-success btn-sm'
                                href="<?= url("category", "category_repair", ["ma" => $item->ma]) ?>">Sửa</a>
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