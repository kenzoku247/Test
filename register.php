<?php
    if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
        header('Location: home.php');
        die();
    }
    if (isset($_POST['dangky'])) {
        $username = trim($_POST['tdn']);
        $password = trim($_POST['mk']);
        $passwordl = trim($_POST['mkl']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        if (empty($username)) {
            array_push($errors, "Tên đăng nhập là bắt buộc");
        }
        if (empty($email)) {
            array_push($errors, "Email là bắt buộc");
        }
        if (empty($phone)) {
            array_push($errors, "Số điện thoại là bắt buộc");
        }
        if (empty($password) || empty($passwordl)) {
            array_push($errors, "Mật khẩu là bắt buộc");
        }
        elseif ($password!=$passwordl) {
            array_push($errors, "Hai mật khẩu không khớp");
        } else {
            include('handle_register.php');
        }
    }

    
?>

<form action="register.php" method="post" class="dangnhap">
    <fieldset>
        <legend>Đăng ký thành viên:</legend>
        <label for="tdn">Tên đăng nhập:</label>
        <input type="text" id="tdn" name="tdn" value="" required/><br>
        <label for="mk">Mật khẩu:</label>
        <input type="password" id="mk" name="mk" value="" required/><br>
        <label for="mk">Nhập lại mật khẩu:</label>
        <input type="password" id="mkl" name="mkl" value="" required/><br>
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" value="" required/><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="" required/><br><br>
        <input type="submit" name="dangky" value="Đăng ký">
    </fieldset>
<a href="login.php">Đăng nhập</a>