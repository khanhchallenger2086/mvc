<?php
    include 'core/core-product.php';
    include 'core/core-check-upload.php';// kiểm tra lỗi

    if (!isset($_GET['ma'])) {
        header('location:index.php?click=products');
    } 
    
    // load sản phẩm ra
    $obj_product = new product();
    $supliers = $obj_product->show_suplier();
    $trademarks = $obj_product->show_trademark();
    $categorys = $obj_product->show_category();
    $product = $obj_product->product_get_row($_GET['ma']); // lấy 1 dòng

    
    if (isset($_POST['submit'])) {
        $_POST['trangthai'] = $_POST['trangthai'];
        unset($_POST['submit']);
        // Nếu hình ko có thêm lại hình cũ
        if ($_FILES['hinh']['error'] == 4 && $_FILES['hinhchitiet']['error'] == 4) {
            if (check_type($_POST,$thongbaoloi)) {
                $obj_product->repair($_POST,$_GET['ma']);
                header('location:index.php?click=products');
            } 
        } else {
            // Nếu hình có thì xóa hình cũ thêm hình mới
            $path = upload($_FILES['hinh'],'images',['.jpg','.png','.gif'],2,$msg); 
            $path_detail = upload($_FILES['hinhchitiet'],'images',['.jpg','.png','.gif'],2,$msg);
            $_POST['hinh'] = $path;
            $_POST['hinhchitiet'] = $path_detail;
                if ($path && $path_detail) {
                    if (check_type($_POST,$thongbaoloi)) {
                        $obj_product->product_remove_img($_GET['ma'])->repair($_POST,$_GET['ma']);
                        // header('location:index.php?click=products');
                    }
                } 
        }
}
?>

<?=$thongbaoloi??""?>

<div class="col-md-12 col-sm-12 product">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm mới</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="#">Settings 1</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form action='' enctype="multipart/form-data" method='post' id="demo-form2" data-parsley-validate
                class="form-horizontal form-label-left">
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name='mahienthi' placeholder='Mã hiển thị' class="form-control"
                            value="<?=$product->mahienthi?>">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <select type="text" name='madanhmuc' placeholder='Mã danh mục' class="form-control">
                            <option>Chọn Danh mục</option>
                            <?php
                            foreach ($categorys as $category) {
                            ?>
                            <option value="<?=$category->ma?>"><?=$category->ten?></option>
                            <?php
                             }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <select type="text" name="mathuonghieu" placeholder='Mã nhà thương hiệu' class="form-control">
                            <option>Chọn Danh mục</option>
                            <?php
                            foreach ($trademarks as $trademark) {
                            ?>
                            <option value="<?=$trademark->ma?>"><?=$trademark->ten?></option>
                            <?php
                             }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <select type="text" name='manhacungcap' placeholder='Mã nhà cung cấp' class="form-control">
                            <option>Chọn Danh mục</option>
                            <?php
                            foreach ($supliers as $suplier) {
                            ?>
                            <option value="<?=$suplier->ma?>"><?=$suplier->ten?></option>
                            <?php
                             }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="ten" placeholder='Tên' class="form-control" value="<?=$product->ten?>">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" name='hinh' placeholder='Hình' class="form-control"
                            value="<?=$product->hinh?>">
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="soluong" placeholder='Số lượng' class="form-control"
                            value="<?=$product->soluong?>">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name='dongia' placeholder='Đơn giá' class="form-control "
                            value="<?=$product->dongia?>">
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="mota" placeholder='Mô tả' class="form-control"
                            value="<?=$product->mota?>">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" name="hinhchitiet" placeholder='Hình chi tiết' class="form-control"
                            value="<?=$product->hinhchitiet?>">
                    </div>
                </div>

                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <textarea name="chitiet" cols="30" rows="5" placeholder='Chi tiết'
                            class="form-control"><?=$product->chitiet?></textarea>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        Hiển Thị: <input type='radio' value="1" name='trangthai'>
                        Ẩn: <input type='radio' value="0" name='trangthai'>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="offset-md-4 col-md-6 col-sm-6 ">
                        <a class="btn btn-primary" href="index.php?click=products">Come back</a>
                        <button class="btn btn-success" name="submit">Hoàn tất</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>