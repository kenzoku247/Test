<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf_8"> <title>Thêm vai trò</title>
</head>
<body>
    <?php
        // if ($_SESSION['role']!='5')
        // header('Location: home.php');
    ?>
    <form action="addrole.php" method="post" class="dangnhap">
        <fieldset>
            <legend>Thêm mới vai trò:</legend>
            <label for="role_id">ID vai trò: </label>
            <input type="text" id="role_id" name="role_id" value="" required/><br>
            <label for="name">Tên vai trò: </label>
            <input type="text" id="name" name="name" value="" required/><br>
            <label for="note">Ghi chú: </label><br>
            <input type="text" id="note" name="note" value=""/><br><br>
            <input type="submit" name="new" value="Thêm mới">
        </fieldset>
        <?php
            header('Content-Type: text/html; charset=UTF-8'); 
            if (isset($_POST['new'])) {
                $role_id = trim($_POST['role_id']);
                $name = trim($_POST['name']);
                $note = trim($_POST['note']);
                if (empty($role_id)) {
                    array_push($errors, "ID là bắt buộc");
                }
                if (empty($name)) {
                    array_push($errors, "Tên vai trò là bắt buộc");
                }
                include('connect.php');
                $sql = "SELECT * FROM role WHERE role_id = '$role_id' OR role_name = '$name'";
                $result = mysqli_query($connection_obj, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo '<script language="javascript">alert("Bị trùng hoặc chưa nhập tên!"); window.location="b6newrole.php"; </script>';
                die ();
                } else { 
                    $sql = "INSERT INTO role (role_id, role_name, note) VALUES ('$role_id', '$name', '$note')";
                    echo '<script language="javascript">alert("Thêm thành công!"); window.location="addrole.php"; </script>';
                    if (mysqli_query($connect, $sql)){
                        echo "Role ID: ".$_POST['role_id']."<br/>";
                        echo "Tên vai trò: ".$_POST['name']."<br/>";
                        echo "Ghi chú: ".$_POST['note']."<br/>";
                    } else {
                        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="addrole.php"; </script>';
                    }
                }
                die();
                $connect->close();
            }
        ?>
    </form>
</body>
</html>