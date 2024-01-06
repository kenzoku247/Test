<?php
    include('connect.php');
    mysqli_select_db($connection_obj, DATABASE_NAME);
        
    $sql = "SELECT * FROM info WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($connection_obj, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';
        die();
    } else {
        $password=sha1($password);
        $sql = "INSERT INTO info (id, username, password, phone, email) VALUES ('','$username','$password', '$phone', '$email')"; 
        if (mysqli_query($connection_obj, $sql)){
            mysqli_close($connection_obj);
            echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="login.php";</script>';
            // echo "Tên đăng nhập: ".$_POST['tdn']."<br/>";
            // echo "Mật khẩu: ".$_POST['mk']."<br/>";
            // echo "Email đăng nhập: ".$_POST['email']."<br/>"; 
            // echo "Số điện thoại: ".$_POST['phone']."<br/>";
            // echo "Đi tới đăng nhập: " . "<a href='login.php'>Đăng nhập</a>";
            
        } else { 
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
            die();
        }
    }