<?= $msg ? thongbao($msg) : "" ?>
<div class="col-md-12 col-sm-12 product">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= isset($list) ? "Sửa sản phẩm " . get("ma") : "Thêm mới" ?></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form enctype="multipart/form-data" method='post' id="demo-form2" data-parsley-validate
                class="form-horizontal form-label-left">
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        Mã:
                        <input type="number" name='mahienthi' value="<?= $list ? get("ma") : "" ?>"
                            placeholder='Mã hiển thị' class="form-control ">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        Danh mục:
                        <select type="text" name='madanhmuc' placeholder='Mã danh mục' class="form-control">
                            <option>Chọn Danh mục</option>
                            <?php
                            foreach ($categorys as $category) {
                            ?>
                            <option value="<?= $category->ma ?>"
                                <?= $list->madanhmuc == $category->ma ? "selected" : "" ?>><?= $category->ten ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        Nhà thương hiệu:
                        <select type="text" name="mathuonghieu" placeholder='Mã nhà thương hiệu' class="form-control">
                            <option>Chọn Danh mục</option>
                            <?php
                            foreach ($trademarks as $trademark) {
                            ?>
                            <option value=<?= $trademark->ma ?>
                                <?= $list->mathuonghieu == $trademark->ma ? "selected" : "" ?>>
                                <?= $trademark->ten ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        Nhà cung cấp:
                        <select type="text" name='manhacungcap' placeholder='Mã nhà cung cấp' class="form-control">
                            <option>Chọn Danh mục</option>
                            <?php
                            foreach ($supliers as $suplier) {
                            ?>
                            <option value="<?= $suplier->ma ?>"
                                <?= $list->manhacungcap == $suplier->ma ? "selected" : "" ?>><?= $suplier->ten ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        Tên:
                        <input type="text" name="ten" value="<?= $list ? $list->ten : "" ?>" placeholder='Tên'
                            class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        Hình:
                        <input type="file" name='hinh' placeholder='Hình' class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        Số lượng:
                        <input type="number" name="soluong" value="<?= $list ? $list->soluong : "" ?>"
                            placeholder='Số lượng' class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        Đơn giá:
                        <input type="number" name='dongia' value="<?= $list ? $list->dongia : "" ?>"
                            placeholder='Đơn giá' class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        Mô tả:
                        <input type="text" name="mota" value="<?= $list ? $list->mota : "" ?>" placeholder='Mô tả'
                            class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        Hình chi tiết:
                        <input type="file" name="hinhchitiet" placeholder='Hình chi tiết' class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        Chi tiết mô tả
                        <textarea name="chitiet" cols="30" rows="5" placeholder='Chi tiết'
                            class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        Trạng thái:
                        Hiển Thị: <input type='radio' value="1" <?= ($list->trangthai == "1") ? "checked" : "" ?>
                            name='trangthai'>
                        Ẩn: <input type='radio' value="0" <?= ($list->trangthai == "0") ? "checked" : "" ?>
                            name='trangthai'>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="offset-md-4 col-md-6 col-sm-6 ">
                        <a class="btn btn-primary" href="<?= url("product", "index") ?>">Come back</a>
                        <button name="submit" class="btn btn-success">Hoàn tất</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>