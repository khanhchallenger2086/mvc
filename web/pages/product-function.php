<?php
    include 'core/core-product.php';
    include 'core/core-check-upload.php';// kiểm tra lỗi

    // nhớ thêm action
    if (!isset($_GET['action'])) {
        header('location:index.php?click=products');
    } 

    // load sản phẩm ra
    $obj_product = new product();
    $product = $obj_product->product_get_row($_GET['ma']);
    
    if (isset($_POST['submit'])) {
        if ($_FILES['hinh']['error'] == 0 && $_FILES['hinhchitiet']['error'] == 0) {
            $path = upload($_FILES['hinh'],'images',['.jpg','.png','.gif'],2,$msg);
            $path_detail = upload($_FILES['hinhchitiet'],'images',['.jpg','.png','.gif'],2,$msg);
            if ($path && $path_detail) {
                $array = [
                    $_POST['mahienthi'],
                    $_POST['madanhmuc'],
                    $_POST['manhacungcap'],
                    $_POST['mathuonghieu'],
                    $_POST['soluong'],
                    $_POST['dongia'],
                    $_POST['ten'],
                    $path,
                    $_POST['mota'],
                    $_POST['chitiet'],
                    $path_detail,
                ];
                $obj_product->pass_array($array);
                if (check_type($array,$thongbaoloi)) {
                    if ($_GET['action'] == 'repair') {
                        $obj_product->product_remove_img($_GET['ma'])->product_repair($_GET['ma']);
                    } elseif ($_GET['action'] == 'add') {
                        $obj_product->product_add();
                    }
                } 
            } else {
                $thongbaoloi = '<div class="alert alert-danger">'.$msg.' hoặc bạn nhập sai và bạn không được bỏ trống'.'</div>';
            }
        } else {
            $array = [
                $_POST['mahienthi'],
                $_POST['madanhmuc'],
                $_POST['manhacungcap'],
                $_POST['mathuonghieu'],
                $_POST['soluong'],
                $_POST['dongia'],
                $_POST['ten'],
                $product->hinh,
                $_POST['mota'],
                $_POST['chitiet'],
                $product->hinhchitiet,
                $_GET['ma']
            ];
            if ($_GET['action'] == 'repair') {
                $obj_product->pass_array($array);
                if (check_type($array,$thongbaoloi)) {
                    $obj_product->product_repair($_GET['ma']);
                } 
            } 
            if ($_GET['action'] == 'add') {
                $thongbaoloi = '<div class="alert alert-danger">Hình ảnh của bạn chưa được upload và bạn không được bỏ trống'.'</div>';
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
                            value="<?=$product->mahienthi??""?>">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name='madanhmuc' placeholder='Mã danh mục' class="form-control"
                            value="<?=$product->madanhmuc??""?>">
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="mathuonghieu" placeholder='Mã nhà thương hiệu' class="form-control"
                            value="<?=$product->mathuonghieu??""?>">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name='manhacungcap' placeholder='Mã nhà cung cấp' class="form-control "
                            value="<?=$product->manhacungcap??""?>">
                    </div>
                </div>

                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="ten" placeholder='Tên' class="form-control"
                            value="<?=$product->ten??""?>">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" name='hinh' placeholder='Hình' class="form-control"
                            value="<?=$product->hinh??""?>">
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="soluong" placeholder='Số lượng' class="form-control"
                            value="<?=$product->soluong??""?>">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name='dongia' placeholder='Đơn giá' class="form-control "
                            value="<?=$product->dongia??""?>">
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="mota" placeholder='Mô tả' class="form-control"
                            value="<?=$product->mota??""?>">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" name="hinhchitiet" placeholder='Hình chi tiết' class="form-control"
                            value="<?=$product->hinhchitiet??""?>">
                    </div>
                </div>

                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <textarea name="chitiet" cols="30" rows="5" placeholder='Chi tiết'
                            class="form-control"><?=$product->chitiet??""?></textarea>
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