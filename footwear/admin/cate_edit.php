<?php
require_once '../permission.php';
require_once '../public/dbconnection.php';
$id = $_GET['id'];

$sql = "select * from categories where cate_id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['btn'])) {
    extract($_REQUEST);
    $sql = "insert into categories (cate_name,cate_description) values ('$cate_name','$cate_description')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:category.php");
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once './common/head.php' ?>

<body>
    <div class="container">
        <div class="col-12">
            <h2>Sửa danh mục</h2>
        </div>
        <div class="col-12">
            <form action="" method="POST">
                Name: <br>
                <input type="text" name="cate_name" value="<?= $cate['cate_name'] ?>">
                <br> <br>
                Mô tả: <br>
                <textarea name="cate_description" cols="30" rows="10"><?= $cate['cate_description'] ?></textarea>
                <br> <br>
                <button type="submit" class="btn btn-sm btn-success" name="btn">Lưu</button>

            </form>
        </div>
    </div>
</body>

</html>