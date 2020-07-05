<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';

// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');

// 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$category_code = $_GET['category_code'];
$sqlSelect = "SELECT * FROM `shop_categories` WHERE category_code=$category_code;";

// 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
$resultSelect = mysqli_query($conn, $sqlSelect);
$shop_category_Row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

// 4. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
if(isset($_POST['btnSave'])) 
{
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];

    // Câu lệnh UPDATE
    $sql = "UPDATE `shop_categories` SET category_name='$category_name', description='$description' WHERE category_code=$category_code;";

    // Thực thi UPDATE
    mysqli_query($conn, $sql);

    // Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}

// Yêu cầu `Twig` vẽ giao diện được viết trong file `backend/loaisanpham/edit.html.twig`
// với dữ liệu truyền vào file giao diện được đặt tên là `loaisanpham`
echo $twig->render('backend/shop_categories/edit.html.twig', ['array_category' => $shop_category_Row] );