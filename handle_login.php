<?php 
    session_start(); 
    header('Content-Type: text/html; charset=UTF-8');
    if (isset($_POST['dangnhap'])) {    
        include('connect.php');
        mysqli_select_db($connection_obj, DATABASE_NAME);
        $username = addslashes($_POST['tdn']); 
        $password = addslashes($_POST['mk']);
        if (!$username || !$password) {
            echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>"; 
            exit;
        } else {
            $query = "SELECT username, password FROM info WHERE username='$username'"; 
            $result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));
            if (!$result) {
                echo "Tên đăng nhập không đúng!";
                exit;
            } else {
                $password = sha1($password);
                $row = mysqli_fetch_array($result);
                if ($password != $row['password']) {
                    echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                $_SESSION['username'] = $username;
                echo '<script language="javascript">alert("Xin chào '.$username .'. Bạn đã đăng nhập thành công."); window.location="home.php";</script>';
                $_SESSION['status'] != 'login';
                die ();
                $connect->close();
            }
            
            
        }
    }