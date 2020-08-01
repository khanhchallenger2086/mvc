<?php
    ob_start();
    include 'libs/functions.php';
    include 'core/core-database.php';
    include 'core/core-general.php';

    if (!islogin()) {
        header('location:login.php');
    }
    
     // làm file check role phân quyền
     // làm lại phần image của sửa
     // làm hàm xóa sửa thêm chung 1 class của core-products

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'widgets/admin-head.php'?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <?php include 'widgets/admin-sitebar.php'?>
            </div>

            <?php include 'widgets/admin-topnav.php'?>

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class='col-lg-12 col-md-12'>
                    <?php 
                    $click = $_GET['click']??'admin-home';
                    if (file_exists('pages/'.$click.'.php')) {
                        include 'pages/'.$click.'.php';
                    } else {
                        echo thongbao('Trang không tồn tại');
                    }
                    ?>
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

</html>
<?php
    ob_end_flush(); 
?>