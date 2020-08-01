<?php
    include 'core/core-product.php';
    include 'core/core-check-upload.php';// kiểm tra lỗi
    $obj_product = new product(); // tạo đối tượng
    $supliers = $obj_product->show_suplier();
    $trademarks = $obj_product->show_trademark();
    $categorys = $obj_product->show_category();

        if (isset($_FILES['hinh'],$_FILES['hinhchitiet'])) {
            $path = upload($_FILES['hinh'],'images',['.jpg','.png','.gif'],2,$msg);
            $path_detail = upload($_FILES['hinhchitiet'],'images',['.jpg','.png','.gif'],2,$msg);
                if ($path && $path_detail) {
                    // Kiểm tra lỗi
                    if (check_type($_POST,$thongbaoloi)) {
                        $_POST['hinh'] = $path;
                        $_POST['hinhchitiet'] = $path_detail;
                        $_POST['trangthai'] = $_POST['trangthai'];
                        header('location:index.php?click=products');
                    } else {
                        unlink($path);
                        unlink($path_detail);
                    }
                } else {
                    $thongbaoloi = '<div class="alert alert-danger">'.$msg.' hoặc bạn nhập sai và bạn không được bỏ trống'.'</div>';
                }
        }
?>

<?=$thongbaoloi??""?>

<div class="col-md-12 col-sm-12 product">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm mới</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form action='' enctype="multipart/form-data" method='post' id="demo-form2" data-parsley-validate
                class="form-horizontal form-label-left">
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name='mahienthi' placeholder='Mã hiển thị' class="form-control ">
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
                        <input type="text" name="ten" placeholder='Tên' class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" name='hinh' placeholder='Hình' class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="soluong" placeholder='Số lượng' class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name='dongia' placeholder='Đơn giá' class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="mota" placeholder='Mô tả' class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" name="hinhchitiet" placeholder='Hình chi tiết' class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <textarea name="chitiet" cols="30" rows="5" placeholder='Chi tiết'
                            class="form-control"></textarea>
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
                        <button class="btn btn-success">Hoàn tất</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>