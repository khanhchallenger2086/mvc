<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Cấp quyền</h2>
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
            <form  action="" method="post">
                <ul>
                    <?php
                    foreach ($get_dynamic as $dynamic) {
                        $get_dynamic_con = $this->role->get_dynamic($dynamic->ma)
                    ?>
                    <li><input type="checkbox" <?= $this->role->checked($get_user->ma, $dynamic->ma) ? "checked" : "" ?>
                            value="<?= $dynamic->ma ?>" name="chucnang[]">
                        <i class="<?= $dynamic->icon ?>"></i> <?= $dynamic->ten ?>
                        <ul id="role_level">
                            <?php
                                foreach ($get_dynamic_con as $dynamic_con) {
                                ?>
                            <li><input type="checkbox"
                                    <?= $this->role->checked($get_user->ma, $dynamic_con->ma) ? "checked" : "" ?>
                                    value="<?= $dynamic_con->ma ?>" name="chucnang[]">
                                <i class="<?= $dynamic_con->icon ?>"></i> <?= $dynamic_con->ten ?></li>
                            <?php
                                }
                                ?>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <input type="hidden" name="iduser" value="<?= $get_user->ma ?>">
                <button>Gửi</button>
            </form>
        </div>
    </div>
</div>

<!-- xét điều kiện ko có user trang thai bằng 1 hoạc ko có user ko cho qua role_lelel -->