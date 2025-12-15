<?php

include './connect.php';
$conn = connectdb();


function getSanPham()
{
    global $conn;

    // kiểm tra điều kiện 
    if (!isset($_GET['danhmuc'])) {
        if (!isset($_GET['thuonghieu'])) {

            $select_query = "SELECT * FROM sanpham ORDER BY rand() LIMIT 0, 6";
            $stmt = $conn->prepare($select_query);
            $stmt->execute();

            // Lấy kết quả và hiển thị
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $ma = $row['ma_san_pham'];
                $ten = $row['ten_san_pham'];
                $mota = $row['mo_ta'];
                $gia = $row['gia'];
                $anh = $row['anh_url'];

                echo '
<div class="col-md-4 mb-2">
  <div class="card">
    <img src="./image/' . htmlspecialchars($anh) . '" class="card-img-top" alt="' . htmlspecialchars($ten) . '">
    <div class="card-body">
      <h5 class="card-title">' . htmlspecialchars($ten) . '</h5>
      <p class="card-text">Giá: ' . htmlspecialchars(number_format($gia, 0, ',', '.')) . ' VND </p>
      <p class="card-text">' . htmlspecialchars($mota) . '</p>
      <a href="index.php?them_gio_hang=' . htmlspecialchars($ma) . '" name="themgiohang" class="btn btn-info">Thêm giỏ hàng</a>
      <a href="ChiTietSanPham.php?ma_san_pham=' . htmlspecialchars($ma) . '" class="btn btn-secondary">Chi tiết</a>
    </div>
  </div>
</div>';
            }
        }
    }
}

// lấy thương hiệu duy nhất
function getUniqueThuongHieu()
{
    global $conn;

    if (isset($_GET['thuonghieu'])) {
        $math = $_GET['thuonghieu'];

        $select_query = "SELECT * FROM sanpham WHERE ma_thuong_hieu = :math";
        $stmt = $conn->prepare($select_query);
        $stmt->bindParam(':math', $math, PDO::PARAM_INT);
        $stmt->execute();

        $num_row = $stmt->rowCount();
        if ($num_row == 0) {
            echo "<h2 class='text-center text-danger'>Không có sản phẩm trong thương hiệu bạn chọn</h2>";
        }

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ma = $row['ma_san_pham'];
            $ten = $row['ten_san_pham'];
            $mota = $row['mo_ta'];
            $gia = $row['gia'];
            $anh = $row['anh_url'];

            echo '
<div class="col-md-4 mb-2">
  <div class="card">
    <img src="./image/' . htmlspecialchars($anh) . '" class="card-img-top" alt="' . htmlspecialchars($ten) . '">
    <div class="card-body">
      <h5 class="card-title">' . htmlspecialchars($ten) . '</h5>
      <p class="card-text">Giá: ' . htmlspecialchars(number_format($gia, 0, ',', '.')) . ' VND </p>
      <p class="card-text">' . htmlspecialchars($mota) . '</p>
      <a href="index.php?them_gio_hang=' . htmlspecialchars($ma) . '" class="btn btn-info">Thêm giỏ hàng</a>
      <a href="ChiTietSanPham.php?ma_san_pham=' . htmlspecialchars($ma) . '" class="btn btn-secondary">Chi tiết</a>
    </div>
  </div>
</div>';
        }
    }
}

// lấy danh mục duy nhất 
function getUniqueDanhMuc()
{
    global $conn;

    if (isset($_GET['danhmuc'])) {
        $madm = $_GET['danhmuc'];

        $select_query = "SELECT * FROM sanpham WHERE ma_danh_muc = :madm";
        $stmt = $conn->prepare($select_query);
        $stmt->bindParam(':madm', $madm, PDO::PARAM_INT);
        $stmt->execute();

        $num_row = $stmt->rowCount();
        if ($num_row == 0) {
            echo "<h2 class='text-center text-danger'>Không có sản phẩm trong danh mục bạn chọn</h2>";
        }

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ma = $row['ma_san_pham'];
            $ten = $row['ten_san_pham'];
            $mota = $row['mo_ta'];
            $gia = $row['gia'];
            $anh = $row['anh_url'];

            echo '
<div class="col-md-4 mb-2">
  <div class="card">
    <img src="./image/' . htmlspecialchars($anh) . '" class="card-img-top" alt="' . htmlspecialchars($ten) . '">
    <div class="card-body">
      <h5 class="card-title">' . htmlspecialchars($ten) . '</h5>
      <p class="card-text">Giá: ' . htmlspecialchars(number_format($gia, 0, ',', '.')) . ' VND </p>
      <p class="card-text">' . htmlspecialchars($mota) . '</p>
      <a href="index.php?them_gio_hang=' . htmlspecialchars($ma) . '" class="btn btn-info">Thêm giỏ hàng</a>
      <a href="ChiTietSanPham.php?ma_san_pham=' . htmlspecialchars($ma) . '" class="btn btn-secondary">Chi tiết</a>
    </div>
  </div>
</div>';
        }
    }
}

function getThuongHieu()
{
    global $conn;
    $select_ten = "SELECT * FROM thuonghieu";
    $stmt = $conn->prepare($select_ten);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ten = $row['ten_thuong_hieu'];
        $ma = $row['ma_thuong_hieu'];
        echo "
        <li><a href='index.php?thuonghieu=$ma' class='nav-link text-light'>$ten</a></li>
    ";
    }
}

function getDanhMuc()
{
    global $conn;
    $select_ten = "SELECT * FROM danhmuc";
    $stmt = $conn->prepare($select_ten);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ten = $row['ten_danh_muc'];
        $ma = $row['ma_danh_muc'];
        echo "
        <li><a href='index.php?danhmuc=$ma' class='nav-link text-light'>$ten</a></li>
    ";
    }
}

// hàm tìm kiếm sản phẩm 
function TimKiemSanPham()
{
    global $conn;

    if (isset($_GET['search_sanpham'])) {
        $search_value = $_GET['search_data'];

        try {
            $timkiem_sql = "SELECT * FROM sanpham WHERE tu_khoa LIKE :search_value";
            $stmt = $conn->prepare($timkiem_sql);
            $stmt->execute(['search_value' => '%' . $search_value . '%']);

            $num_row = $stmt->rowCount();
            if ($num_row == 0) {
                echo "<h2 class='text-center text-danger'>Không có sản phẩm bạn đang tìm!</h2>";
            }

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $ma = $row['ma_san_pham'];
                $ten = $row['ten_san_pham'];
                $mota = $row['mo_ta'];
                $gia = $row['gia'];
                $anh = $row['anh_url'];

                echo '
<div class="col-md-4 mb-2">
  <div class="card">
    <img src="./image/' . htmlspecialchars($anh) . '" class="card-img-top" alt="' . htmlspecialchars($ten) . '">
    <div class="card-body">
      <h5 class="card-title">' . htmlspecialchars($ten) . '</h5>
      <p class="card-text">Giá: ' . htmlspecialchars(number_format($gia, 0, ',', '.')) . ' VND </p>
      <p class="card-text">' . htmlspecialchars($mota) . '</p>
      <a href="index.php?them_gio_hang=' . htmlspecialchars($ma) . '" class="btn btn-info">Thêm giỏ hàng</a>
      <a href="ChiTietSanPham.php?ma_san_pham=' . htmlspecialchars($ma) . '" class="btn btn-secondary">Chi tiết</a>
    </div>
  </div>
</div>';
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}

// Lấy IP
function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// thêm giỏ hàng 
function Giohang()
{
    if (isset($_GET['them_gio_hang'])) {
        global $conn;
        $masp = $_GET['them_gio_hang'];
        $makh = 1;

        $sql = "SELECT * FROM giohang WHERE ma_san_pham = :masp AND ma_khach_hang = :makh";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':masp' => $masp, ':makh' => $makh]);
        $num = $stmt->rowCount();

        if ($num > 0) {
            echo "<script>alert('Sản phẩm đã có trong giỏ hàng!')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            $insert_sql = "INSERT INTO giohang (ma_san_pham, so_luong, ma_khach_hang) VALUES (:masp, 1, :makh)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->execute([':masp' => $masp, ':makh' => $makh]);

            echo "<script>alert('Đã thêm vào giỏ hàng!')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}

// số lượng sản phẩm trong giỏ hàng
function Cart_item()
{
    global $conn;
    $makh = 1;

    try {
        $stmt = $conn->prepare("SELECT * FROM giohang WHERE ma_khach_hang = :makh");
        $stmt->bindParam(':makh', $makh, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        $count = 0;
    }

    echo $count;
}

// tổng tiền các sản phẩm trong giỏ hàng
function TongTien()
{
    global $conn;
    $tong = 0;
    $makh = 1;

    $cart_sql = "SELECT ma_san_pham, so_luong FROM giohang WHERE ma_khach_hang = :makh";
    $stmt = $conn->prepare($cart_sql);
    $stmt->bindParam(':makh', $makh);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $masp = $row['ma_san_pham'];
        $so_luong = $row['so_luong'];

        $select_pro = "SELECT gia FROM sanpham WHERE ma_san_pham = :masp";
        $stmt_pro = $conn->prepare($select_pro);
        $stmt_pro->bindParam(':masp', $masp);
        $stmt_pro->execute();

        $row_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC);

        if ($row_pro) {
            $tong += $row_pro['gia'] * $so_luong;
        }
    }

    echo number_format($tong, 0, ',', '.');
}

?>

