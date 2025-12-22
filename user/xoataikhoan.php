<h3 class="text-center mb-4">Xóa tài khoản</h3>
<form action="" method="post" class="mt-5">
      <div class="form-outline mb-4">
            <input type="submit" value="Xóa tài khoản" class="form-control w-50 m-auto" name="delete">
      </div>
      <div class="form-outline mb-4">
            <input type="submit" value="Không xóa tài khoản" class="form-control w-50 m-auto" name="dont_delete">
      </div>
</form>

<?php
$username_session = $_SESSION['username'];

if (isset($_POST['delete'])) {
    try {
        
        $delete_sql = "DELETE FROM khachhang WHERE ten_khach_hang = :username";
        $stmt = $conn->prepare($delete_sql);

        $stmt->bindParam(':username', $username_session, PDO::PARAM_STR);
   
        if ($stmt->execute()) {
            session_destroy();
            echo "<script>alert('Xóa tài khoản thành công!')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Có lỗi xảy ra: " . $e->getMessage() . "')</script>";
    }
}

if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('Profile.php','_self')</script>";
}

?>