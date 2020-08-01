<?php
    include 'core/core-users.php';

    if (!isset($_GET['id'])) {
        header('location:index.php?click=users');
    }

    if (isset($_POST['id'])) {
        if (isset($_FILES['image'])) {
            $path = upload($_FILES['image'],'images',['.jpg','.png','.gif'],2,$msg);
            if ($path) {
                $array = loaddata('data/users-data.txt');
                unlink(trim($array[$_GET['id']]['image'])); // xóa đi tấm cũ
                $xuly = new xulyfile($array,$_POST['id'],$_POST['name_access'],$_POST['full_name'],$_POST['email'],$path);
                update_data('data/users-data.txt',$xuly->repair());
                header('location:index.php?click=users');
            } else {
                echo $msg;
            }
        } 
    } 
?>

<div class="col-md-12 col-sm-12 ">
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
            <form action='' method='post' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                enctype="multipart/form-data">

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id">ID<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="id" name="id" readonly value='<?=$_GET['id']?>' required="required"
                            class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name_access">Name Access<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="name_access" name='name_access'
                            value='<?=$array[$_GET['id']]['name_access']?>' required="required" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="full_name">Full Name<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="full_name" name="full_name" required="required"
                            value='<?=$array[$_GET['id']]['full_name']?>' class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Amount<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="email" name="email" value='<?=$array[$_GET['id']]['email']?>'
                            required="required" class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Price<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" id="image" name="image" value='<?=$array[$_GET['id']]['image']?>'
                            required="required" class="form-control">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a class="btn btn-primary" href="index.php?click=users">Come back</a>
                        <button class="btn btn-success">Hoàn tất</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>