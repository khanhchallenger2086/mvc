<?= $msg ? thongbao($msg) : "" ?>
<div class="col-md-12 col-sm-12 product">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= isset($list) ? "Sửa nhà cung cấp " . get("ma") : "Thêm mới nhà cung cấp" ?></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form enctype="multipart/form-data" method='post' id="demo-form2" data-parsley-validate
                class="form-horizontal form-label-left">
                <div class="item form-group">
                    <div class=" col-md-6  col-sm-6 ">
                        Tên:
                        <input type="text" name='ten' value="<?= $list ? $list->ten : "" ?>" placeholder='Tên'
                            class="form-control "><br>
                        Địa chỉ:
                        <input type="text" name='diachi' value="<?= $list ? $list->diachi : "" ?>" placeholder='Địa chỉ'
                            class="form-control "><br>
                        Email:
                        <input type="text" name='email' value="<?= $list ? $list->email : "" ?>" placeholder='Email'
                            class="form-control "><br>
                        Số Điện Thoại :
                        <input type="number" name='sdt' value="<?= $list ? $list->sdt : "" ?>"
                            placeholder='Số Điện Thoại' class="form-control "><br>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="offset-md-4 col-md-6 col-sm-6 ">
                        <a class="btn btn-primary" href="<?= url("suplier", "index") ?>">Come back</a>
                        <button name="submit" class="btn btn-success">Hoàn tất</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>