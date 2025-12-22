<?php
include('../admin/config/connect.php'); // Kết nối CSDL
$conn = connectdb();

$sanpham = null; // Dữ liệu sản phẩm
$error = ''; // Biến lưu thông báo lỗi

// Lấy thông tin sản phẩm dựa trên ID
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE ma_san_pham = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $sanpham = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Kiểm tra nếu sản phẩm không tồn tại
if (!$sanpham) {
    die("Sản phẩm không tồn tại.");
}

// Cập nhật sản phẩm khi nhấn nút Lưu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Location: quanlysanpham.php');
  exit;
  // ...existing code...
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chỉnh sửa sản phẩm</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="ten_san_pham">Tên sản phẩm</label>
        <input type="text" name="ten_san_pham" class="form-control" value="<?php echo htmlspecialchars($sanpham['ten_san_pham']); ?>" required>
      </div>
      <div class="form-group">
        <label for="mo_ta">Mô tả</label>
        <textarea name="mo_ta" class="form-control" required><?php echo htmlspecialchars($sanpham['mo_ta']); ?></textarea>
      </div>
      <div class="form-group">
        <label for="gia">Giá</label>
        <input type="number" name="gia" class="form-control" value="<?php echo htmlspecialchars($sanpham['gia']); ?>" required>
      </div>
      <div class="form-group">
        <label for="so_luong_ton">Số lượng tồn</label>
        <input type="number" name="so_luong_ton" class="form-control" value="<?php echo htmlspecialchars($sanpham['so_luong_ton']); ?>" required>
      </div>
      <div class="form-group">
        <label for="anh_url">Ảnh sản phẩm</label>
        <input type="file" name="anh_url" class="form-control">
        <img src="./images/<?php echo htmlspecialchars($sanpham['anh_url']); ?>" alt="Ảnh sản phẩm" style="width: 100px; margin-top: 10px;">
      </div>
      <button type="submit" class="btn btn-primary">Lưu</button>
      <a href="quanlysanpham.php" class="btn btn-secondary">Hủy</a>
    </form>
  </div>
</body>
</html>
