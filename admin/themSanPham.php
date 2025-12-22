<?php
include('includes/header.php');
include('includes/topbar.php');
// include('includes/sidebar.php');
include('../admin/config/connect.php'); // Gọi file kết nối CSDL

// Khởi tạo biến $message
$message = '';

// Xử lý thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $ten_san_pham = $_POST['ten_san_pham'];
    $mo_ta = $_POST['mo_ta'];
    $gia = $_POST['gia'];
    $so_luong_ton = $_POST['so_luong_ton'];
    $anh_url = $_FILES['anh_url']['name'];

    // Upload ảnh sản phẩm
    $target_dir = "./images/";
    $target_file = $target_dir . basename($anh_url);
    move_uploaded_file($_FILES['anh_url']['tmp_name'], $target_file);

    // Kết nối cơ sở dữ liệu
    $conn = connectdb();
    $sql = "INSERT INTO sanpham (ten_san_pham, mo_ta, gia, so_luong_ton, anh_url) 
            VALUES (:ten_san_pham, :mo_ta, :gia, :so_luong_ton, :anh_url)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'ten_san_pham' => $ten_san_pham,
        'mo_ta' => $mo_ta,
        'gia' => $gia,
        'so_luong_ton' => $so_luong_ton,
        'anh_url' => $anh_url
    ]);

    $message = "Sản phẩm đã được thêm thành công!";
    $conn = null; // Đóng kết nối
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Thêm sản phẩm</h1>
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <!-- <div class="form-group">
            <label for="ma_san_pham">Mã sản phẩm</label>
            <input type="text" name="ma_san_pham" id="ma_san_pham" class="form-control" required>
        </div> -->
        <div class="form-group">
            <label for="ten_san_pham">Tên sản phẩm</label>
            <input type="text" name="ten_san_pham" id="ten_san_pham" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mo_ta">Mô tả</label>
            <textarea name="mo_ta" id="mo_ta" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="number" name="gia" id="gia" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="so_luong_ton">Số lượng tồn</label>
            <input type="number" name="so_luong_ton" id="so_luong_ton" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="anh_url">Ảnh sản phẩm</label>
            <input type="file" name="anh_url" id="anh_url" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
    </form>

    <?php if (!empty($message)): ?>
        <div class="mt-4">
            <a href="quanlysanpham.php" class="btn btn-secondary">Thoát</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
