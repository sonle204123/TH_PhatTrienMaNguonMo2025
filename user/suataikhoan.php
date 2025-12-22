<?php
// if (isset($_GET['Suataikhoan'])) {
//       $user_session_name = $_SESSION['username'];
//       $select_sql = "select * from 'khachhang' where ten_khach_hang = '$user_session_name'";
//       $kq = mysqli_query($conn, $select_sql);
//       $row_fetch = mysqli_fetch_assoc($kq);
//       $diachi = $row_fetch['dia_chi'];
//       $tenkh = $row_fetch['ten_khach_hang'];
//       $email = $row_fetch['email'];
//       $phone = $row_fetch['so_dien_thoai'];
//       $anh = $row_fetch['anh_url'];
//       $makh = $row_fetch['ma_khach_hang'];
// }
// if (isset($_POST['user_userupdate'])) {
//       $update_id = $makh;
//       $diachi = $_POST['user_useraddress'];
//       $tenkh = $_POST['user_username'];
//       $email = $_POST['user_email'];
//       $phone = $_POST['user_userphone'];
//       $image = $_FILES['user_image']['name'];
//       $image_tmp = $_FILES['user_image']['tmp_name'];
//       move_uploaded_file($image_tmp, "./user_image/$image");

//       // câu sql update
//       $update_sql = "update 'khachhang' set ten_khach_hang = '$tenkh', 
//             email ='$email', so_dien_thoai='$phone', dia_chi='$diachi', anh_url='$image' where ma_khach_hang = '$update_id' ";
//       $kq_update = mysqli_query($conn, $update_sql);
//       if ($kq_update) {
//             echo "<script>alert('Cập nhật thông tin thành công')</script>";
//             echo "<script>window.open('Profile.php', '_self')</script>";

//       }
// }


if (isset($_GET['Suataikhoan'])) {
    $user_session_name = $_SESSION['username'];

    try {
        // Chuẩn bị câu lệnh SELECT
        $select_sql = "SELECT * FROM khachhang WHERE ten_khach_hang = :ten_khach_hang";
        $stmt = $conn->prepare($select_sql);
        $stmt->bindParam(':ten_khach_hang', $user_session_name, PDO::PARAM_STR);
        $stmt->execute();

        // Lấy kết quả
        $row_fetch = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row_fetch) {
            $diachi = $row_fetch['dia_chi'];
            $tenkh = $row_fetch['ten_khach_hang'];
            $email = $row_fetch['email'];
            $phone = $row_fetch['so_dien_thoai'];
            $anh = $row_fetch['anh_url'];
            $makh = $row_fetch['ma_khach_hang'];
        } else {
            echo "Không tìm thấy thông tin tài khoản.";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

if (isset($_POST['user_userupdate'])) {
    $update_id = $makh;
    $diachi = $_POST['user_useraddress'];
    $tenkh = $_POST['user_username'];
    $email = $_POST['user_email'];
    $phone = $_POST['user_userphone'];
    $image = $_FILES['user_image']['name'];
    $image_tmp = $_FILES['user_image']['tmp_name'];

    // Di chuyển tệp ảnh đến thư mục đích
    if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] == 0) {
        move_uploaded_file($image_tmp, "./user_image/$image");
    } else {
        $image = $anh; // Nếu không tải lên ảnh mới, giữ nguyên ảnh cũ
    }

    try {
        // Chuẩn bị câu lệnh UPDATE
        $update_sql = "UPDATE khachhang 
                       SET ten_khach_hang = :ten_khach_hang, 
                           email = :email, 
                           so_dien_thoai = :so_dien_thoai, 
                           dia_chi = :dia_chi, 
                           anh_url = :anh_url 
                       WHERE ma_khach_hang = :ma_khach_hang";
        $stmt = $conn->prepare($update_sql);

        // Gán giá trị tham số
        $stmt->bindParam(':ten_khach_hang', $tenkh, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':so_dien_thoai', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':dia_chi', $diachi, PDO::PARAM_STR);
        $stmt->bindParam(':anh_url', $image, PDO::PARAM_STR);
        $stmt->bindParam(':ma_khach_hang', $update_id, PDO::PARAM_INT);

        // Thực thi câu lệnh
        $stmt->execute();

        echo "<script>alert('Cập nhật thông tin thành công')</script>";
        echo "<script>window.open('Dangxuat.php', '_self')</script>";
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LAPTOP79</title>
</head>

<body>
      <h3 class="text-center  mb-4">Sửa thông tin cá nhân</h3>
      <form action="" method="post" enctype="multipart/form-data" class="text-center">
            <div class="form-outline mb-4">
                  <input type="text" name="user_username" id="" value="<?php echo isset($tenkh) ? $tenkh : ''; ?>" class="form-control w-50 m-auto">

            </div>
            <div class="form-outline mb-4">
                  <input type="email" name="user_email" id="" value="<?php echo isset($email) ? $email : ''; ?>" class="form-control w-50 m-auto">

            </div>
            <div class="form-outline mb-4 d-flex w-50 m-auto ">
                  <input type="file" name="user_image" id="" class="form-control m-auto ">
                  <img src="./user_image/<?php echo $user_img ?>" alt="" class="edit_img">
            </div>
            <div class="form-outline mb-4">
                  <input type="text" name="user_useraddress" id="" value="<?php echo isset($diachi) ? $diachi : ''; ?>" class="form-control w-50 m-auto">

            </div>
            <div class="form-outline mb-4">
                  <input type="text" name="user_userphone" id="" value="<?php echo isset($phone) ? $phone : ''; ?>" class="form-control w-50 m-auto">

            </div>
            <input type="submit" value="Cập nhật" name="user_userupdate" id="" class="bg-info py-2 px-3 border-0 ">

      </form>
</body>

</html>