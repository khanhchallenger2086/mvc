<?php
    include 'core/core-users.php';
?>

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Show Products</h2>
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
            <a class='btn btn-primary btn-sm' href="index.php?click=users-add">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name Access</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Your image</th>
                        <th class='text-center'>Custom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    foreach ($array as $id => $users) {
?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$users['name_access']?></td>
                        <td><?=$users['full_name']?></td>
                        <td><?=$users['email']?></td>
                        <td><img src="<?=$users['image']?>" alt="" width='50px' height='50px'></td>
                        <td class='text-right'>
                            <a class='btn btn-primary btn-sm' href="">Xem</a>
                            <a onclick="return confirm('bạn có chắc xóa không??')" class='btn btn-danger btn-sm'
                                href="index.php?click=users-remove&id=<?=$id?>">Xóa</a>
                            <a class='btn btn-success btn-sm' href="index.php?click=users-repair&id=<?=$id?>">Sửa</a>
                        </td>
                    </tr>
                    <?php
                    
    }
?>
                </tbody>
            </table>

        </div>
    </div>
</div>