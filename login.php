<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <form action="login.php" method="post" class="dangnhap">
            <fieldset>
                <legend>Đăng nhập: </legend>
                <label for="tdn">Tên đăng nhập: </label>
                <input type="text" id="tdn" name="tdn"><br><br>
                <label for="mk">Mật khẩu:</label>
                <input type="password" id="mk" name="mk"><br><br>
                <input type="submit" name="dangnhap" value="Đăng nhập">
            </fieldset>
            <a href="forgot.php">Quên mật khẩu</a>
            <a href="register.php">Đăng ký</a>
            <?php require 'handle_login.php';?>
        </form>
    </body>
</html