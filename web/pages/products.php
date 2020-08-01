<?php
    include 'core/core-product.php'; 
    
    $obj_product = new product();
    $products = $obj_product->product_get_rows();

    // echo "<pre>",print_r($products),"</pre>";
?>

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
            <a class='btn btn-primary btn-sm' href="index.php?click=product-add">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Hình đại diện</th>
                        <th>Tên</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th class='text-center'>Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    foreach ($products as $code => $product) {
?>
                    <tr>
                        <td><?=$product->ma?></td>
                        <td><img src="<?=$product->hinh?>" alt="" width='50px' height='50px'></td>
                        <td><?=$product->ten?></td>
                        <td><?=number_format($product->soluong)?></td>
                        <td><?=number_format($product->dongia)?></td>
                        <td>
                            <?php 
                            if ($product->trangthai == 1) {
                            ?>
                            <span class="badge badge-success">Hiện</span>
                            <?php
                            } else {
                            ?>
                                <span class="badge badge-secondary">Ẩn</span>
                            <?php
                            }
                            ?>
                        </td>
                        <td class='text-right'>
                            <a class='btn btn-primary btn-sm' href="">Xem</a>
                            <a onclick="return confirm('bạn có chắc xóa không??')" class='btn btn-danger btn-sm'
                                href="index.php?click=product-remove&ma=<?=$product->ma?>">Xóa</a>
                            <a class='btn btn-success btn-sm'
                                href="index.php?click=product-repair&ma=<?=$product->ma?>">Sửa</a>
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