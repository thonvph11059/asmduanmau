<?php
require_once '../public/dbconnection.php';
$id = $_GET['id'];
$sql = "select * from users where user_id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['btn'])) {
    extract($_REQUEST);
    if ($_FILES['avatar']['size'] > 0) {
        $filename = $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../images/' . $filename);
        $avatar = '../images/' . $filename;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "update users set username = '$username', email = '$email', password = '$password', avatar = '$avatar', role = '$role' where user_id = $id ";
    // var_dump($sql);
    // die;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:user.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> Thêm tài khoản</h2>
            </div>
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    User_name <br>
                    <input type="text" name="username" value="<?= $user['username'] ?>">
                    <br> <br>
                    Email: <br>
                    <input type="text" name="email" value="<?= $user['email'] ?>">
                    <br> <br>
                    Password: <br>
                    <input type="password" name="password" value="<?= $user['password'] ?>">
                    <br><br>
                    Avatar: <br>
                    <?php if (!empty($user['avatar'])) : ?>
                        <input type="hidden" name="avatar" value="<?= $user['avatar'] ?>">
                    <?php endif ?>
                    <input type="file" name="avatar">
                    <br><br>
                    Role: <br>
                    <select name="role" id="">
                        <option value="1">Admin</option>
                        <option value="2">Nhân viên</option>
                        <option value="0">Khách hàng</option>
                    </select>
                    <br><br>
                    <button type="submit" class="btn btn-sm btn-success" name="btn">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>