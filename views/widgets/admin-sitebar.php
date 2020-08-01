<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Quản trị</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="<?= $_SESSION["avt"] ?>" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Xin chào <?= $_SESSION["ten"] ?></span>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>Chức năng</h3>
            <ul class="nav side-menu">
                <?php
                $menus = $this->menus;
                foreach ($menus as $menu) {
                    $menu_son = $this->role->danhsachchucnangtheouser($_SESSION["ma"], $menu->ma);
                ?>
                <li><a href="<?= $menu->link ?? "#" ?>"><i class="<?= $menu->icon ?>"></i>
                        <?= $menu->ten ?>
                        <?= $menu_son ? "<span class='fa fa-chevron-down'></span>" : "" ?></a>
                    <ul class="nav child_menu">
                        <?php
                            foreach ($menu_son as $menu_sons) {
                            ?>
                        <li><a href="<?= $menu_sons->link ?? "#" ?>"><i class="<?= $menu_sons->icon ?>"></i>
                                <?= $menu_sons->ten ?> </a></li>
                        <?php
                            }
                            ?>
                    </ul>
                </li>
                <?php
                }
                ?>
            </ul>

        </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>