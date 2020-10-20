<?php
require_once "./public/dbconnection.php";
if (isset($_POST['btn'])) {
    extract($_REQUEST);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(username,password,email) Values ('$username','$password','$email')";
    // var_dump($sql);
    // die;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:./login.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once './public/header.php' ?>

<body>
    <?php include_once './public/nav.php' ?>
    <br><br>
    <p class="text-center text-danger">Đăng ký</p>
    <div class="row">
        <div class="col-md-6" style="margin: auto;">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail11">Tên tài khoản</label>
                    <input type="text" class="form-control" id="exampleInputEmail11" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-outline-black" name="btn">Đăng ký</button>
            </form>
        </div>
    </div>
</body>

</html>