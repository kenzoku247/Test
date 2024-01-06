<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf_8">
    <title>Phân quyền người dùng</title>
</head>
<body>
    <?php
        if ($_SESSION['role']!='5') {
            // header('location:home.php');
        }
        if(empty($_GET["id"])) {
            echo '<form action="role.php" method="post" class="dangnhap">';
            echo '<fieldset>';
            echo '<legend>Chọn người dùng cần phân quyền: </legend>';
            echo '<label for="id">Tìm theo ID của người dùng: </label>';
            echo '<input type="text" id="id" name="id" value=""/><br>';
            echo '<label for="username">Tìm theo tên đăng nhập: </label>';
            echo '<input type="text" id="username" name="username" value=""/><br>';
            echo '<input type="submit" name="find" value="Tìm kiếm">';
            echo '</fieldset></form>';
            header('Content-Type: text/html; charset=UTF-8');
        } else {
            $id = $_GET["id"];
            if (isset($_POST['update'])) {
                $role = trim($_POST['role1']);
                echo $role;
                $sql = "UPDATE user SET role_id='$role' WHERE id = '$id'";
                include('connect.php');
                if (mysqli_query($connect, $sql)){
                    echo '<script language="javascript">alert("Phân quyền thành công!"); window.location="list.php"; </script>';
                } else {
                    echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="list.php"; </script>';
                }
                die();
                $connect->close();
            }
        }
