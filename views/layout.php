<?php
if (!islogin()) {
    header("index.php?controller=user&action=login");
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'widgets/admin-head.php' ?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <?php include 'widgets/admin-sitebar.php' ?>
            </div>

            <?php include 'widgets/admin-topnav.php' ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class='col-lg-12 col-md-12'>
                    <?php include $view ?>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Admin của lâm khánh</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <?php include 'widgets/admin-scripts.php' ?>


</body>