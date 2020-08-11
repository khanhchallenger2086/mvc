<?= $msg ? thongbao($msg) : "" ?>

<div class="col-md-12 col-sm-12 product">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= isset($list) ? "Sửa danh mục " . get("ma") : "Thêm mới danh mục" ?></h2>
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
                        Hình:
                        <input type="file" name='hinh' value="<?= $list ? $list->hinh : "" ?>" placeholder='Hình'
                            class="form-control "><br>
                        Mô tả:
                        <textarea class="form-control " name='mota' id="" rows="5" placeholder='Mô tả'><?= $list ? $list->mota : "" ?></textarea>
                        <br>
                        Danh mục cha (nếu có):
                        <select id="danhmuc" class="form-control mb-3"  name="macha" id="">
                            <option value="0">Chọn Danh Mục</option>
                            <?php
                                foreach ($category_parent as $item) {
                            ?>
                                <option value="<?= $item->ma ?>"  <?= $list->macha == $item->ma ? "selected" : "" ?> ><?= $item->ten?></option>
                            <?php
                                    }
                            ?>
                        </select>

                        Bí danh:
                        <input id="bidanh" readonly type="text" class="form-control mb-3" value="" name="alias" id=""></input>
                      
                        Trạng thái: <br>
                        Hiển Thị: <input type='radio' value="1" <?= ($list->trangthai == "1")  ? "checked" : "" ?>
                            name='trangthai'>
                        Ẩn: <input type='radio' value="0" <?= ($list->trangthai == "0") ? "checked" : "" ?>
                            name='trangthai'>
                    </div>
                </div>
                <div class="item form-group mt-5">
                    <div class="offset-md-4 col-md-6 col-sm-6 ">
                        <a class="btn btn-primary" href="<?= url("category", "index") ?>">Come back</a>
                        <button name="submit" class="btn btn-success">Hoàn tất</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

