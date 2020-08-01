<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
    $conn = new PDO("mysql:host=$servername;dbname=data2", $username, $password,[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
    $conn->query('set names utf8'); // đặt lại phông chữ 
    // new PDO (chuỗi kết nối, us,ps, option) => 4 thông số
    // chuỗi kết nối , gồm host và tên danh mục cơ sở dữ liệu
	// $sql = 'SELECT * FROM `sanpham`';
	$rs = $conn->query('select * from sanpham'); // trả về 1 ojbect(table) có truy vấn trong query
    $kq = $rs->fetchAll(PDO::FETCH_OBJ);  // đổi hết tất cả dòng của table thành 1 array và mỗi dòng là 1 object
    } catch (PDOexception $e) {
        exit ('kết nối thất bại'. $e->getMessage);
    }


?>

<div>
    <?php
        foreach ($kq as $key => $value) {
    ?>
    <?=$value->tensanpham . '<br>';?>
    <?php
        }
    ?>
</div>

array thì mới dùng kiểu $ten['']
còn class thì phải dùng -> trỏ tới

phải xác định được cái $kq là array hay class để dùng cú pháp cho đúng

fetch() hoặc fetchAll() mà ghi không thì nó sẽ double lấy vị trí cột và tên cột (gọi là accos)
PDO::FETCH_OBJ này trả về tên cột

[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION] cái này là để khi trong phần try
biến $spl mà không đúng nó sẽ bắt lỗi

PDOexception $e còn phần này là PDO hỗ trợ và gán lỗi vào $e
$e->getMessage trỏ tới lỗi



HÃY NHỚ 1 DÒNG LÀ 1 ĐỐI TƯỢNG 