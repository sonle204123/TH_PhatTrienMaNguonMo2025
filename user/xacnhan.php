<?php
include '../connect.php';
$conn = connectdb();

session_start();

if (isset($_GET['madonhang'])) {
      $madh = $_GET['madonhang'];

      try {

            $select_data = "SELECT * FROM donhang WHERE ma_don_hang = :madonhang";
            $stmt = $conn->prepare($select_data);

            $stmt->bindParam(':madonhang', $madh, PDO::PARAM_STR);

            $stmt->execute();

            $row_fetch = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row_fetch) {
                  $sohd = $row_fetch['so_hoa_don'];
                  $tongtien = $row_fetch['tong_tien'];
            } else {
                  echo "Không tìm thấy dữ liệu với mã đơn hàng này.";
            }
      } catch (PDOException $e) {

            echo "Có lỗi xảy ra: " . $e->getMessage();
      }
}
// if (isset($_POST['confirm_payment'])) {
//       $sohd = $_POST['sohoadon'];
//       $tongtien = $_POST['tongtien'];
//       $phuognthuc = $_POST['payment_mode'];

//       $insert_sql = "insert into 'thanhtoan' (ma_don_hang, so_hoa_don, tong_tien,
//                   ngay_thanh_toan, phuong_thuc) values ('$madh', '$sohd', '$tongtien', Date(), '$phuognthuc')";
//       $kq = mysqli_query($conn, $insert_sql);
//       if ($kq) {
//             echo "<h3 class='text-center text-light'>Thanh toán thành công</h3>";
//             echo "<script>window.open('Profile.php','_self')</script>";
//       }

//       $update_donhang = "update 'donhang' set trang_thai = 'Hoàn thành' where ma_don_hang = '$madh' ";
//       $kq_up = mysqli_query($conn, $update_donhang);
// }

if (isset($_POST['confirm_payment'])) {
      $sohd = $_POST['sohoadon'];
      $tongtien = $_POST['tongtien'];
      $phuognthuc = $_POST['payment_mode'];

      try {
            // Chuẩn bị câu truy vấn với các tham số
            $insert_sql = "INSERT INTO thanhtoan (ma_don_hang, so_hoa_don, tong_tien, ngay_thanh_toan, phuong_thuc)
                         VALUES (:madh, :sohd, :tongtien, NOW(), :phuognthuc)";

            // Chuẩn bị câu truy vấn với PDO
            $stmt = $conn->prepare($insert_sql);

            // Gán giá trị cho các tham số
            $stmt->bindParam(':madh', $madh, PDO::PARAM_STR); // $madh phải được định nghĩa trước đó
            $stmt->bindParam(':sohd', $sohd, PDO::PARAM_STR);
            $stmt->bindParam(':tongtien', $tongtien, PDO::PARAM_STR);
            $stmt->bindParam(':phuognthuc', $phuognthuc, PDO::PARAM_STR);

            // Thực thi câu truy vấn
            if ($stmt->execute()) {
                  echo "<h3 class='text-center text-light'>Thanh toán thành công</h3>";
                  echo "<script>window.open('Profile.php?Donhangdadat', '_self')</script>";
            }
      } catch (PDOException $e) {
            // Xử lý lỗi
            echo "<h3 class='text-center text-danger'>Thanh toán thất bại: " . $e->getMessage() . "</h3>";
      }

      $update_donhang = "UPDATE donhang SET trang_thai = :trang_thai WHERE ma_don_hang = :ma_don_hang";
      $stmt = $conn->prepare($update_donhang);

      // Gắn giá trị cho các tham số
      $trang_thai = 'Hoàn thành';
      $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_STR);
      $stmt->bindParam(':ma_don_hang', $madh, PDO::PARAM_STR);
      $stmt->execute();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LAPTOP79</title>
      <!-- bootstrap link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-secondary">
      <h1 class="text-center text-light">XÁC NHẬN THANH TOÁN</h1>
      <div class="container my-5">
            <form action="" method="post">
                  <div class="form-outline my-4 text-center w-50 m-auto">
                        <input type="text" class="form-control w-50 m-auto" name="sohoadon" id="" value="<?php echo "$sohd"; ?>">
                  </div>

                  <div class="form-outline my-4 text-center w-50 m-auto">
                        <label for="" class="text-light">Tổng tiền</label>
                        <input type="text" class="form-control w-50 m-auto" name="tongtien" id="" value="<?php echo number_format($tongtien, 0, ',', '.') . " VND"; ?>">
                  </div>
                  <div class="form-outline my-4 text-center w-50 m-auto">
                        <select name="payment_mode" id="" class="form-select w-50 m-auto">
                              <option>Chọn hình thức thanh toán</option>
                              <option>Thanh toán khi nhận hàng</option>
                              <option>Paypal</option>
                              <option>Thanh toán ngân hàng</option>
                              <option>Momo</option>
                        </select>
                  </div>

                  <div class="form-outline my-4 text-center w-50 m-auto">
                        <input type="submit" class="bg-info py-2 px-3 border-0" value="Xác nhận" name="confirm_payment" id="">
                  </div>

            </form>
      </div>

</body>

</html>