<?php
require_once '../permission.php';
require_once '../public/dbconnection.php';
$id = $_GET['id'];
$sql = "select * from products where id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$pro = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "select * from categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchALL(PDO::FETCH_ASSOC);
if (isset($_POST['btn'])) {
    extract($_REQUEST);
    if ($_FILES['image']['size'] > 0) {
        $filename = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $filename);
        $image = '../images/' . $filename;
    }
    $sql = "update products set cate_id = '$cate_id', name = '$name', price = '$price', image = '$image', sort_desc = '$sort_desc', detail = '$detail'
    where id = $id ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:products.php");
    die;
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
                <h2> Thêm sản phẩm </h2>
            </div>
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    Tên: <br>
                    <input type="text" name="name" value="<?= $pro['name'] ?>">
                    <br> <br>
                    Danh mục: <br>
                    <select name="cate_id">
                        <?php foreach ($cate as $c) : ?>
                            <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <br> <br>
                    Giá: <br>
                    <input type="text" name="price" value="<?= $pro['price'] ?>"> <br>
                    Ảnh: <br>
                    <?php if (!empty($pro['image'])) : ?>
                        <input type="hidden" name="image" value="<?= $pro['image'] ?>">
                        <img src="<?= $pro['image'] ?>" alt="" width="200px"> <br>
                    <?php endif ?>
                    <input type="file" name="image"> <br>
                    Mô tả ngắn: <br>
                    <input type="text" name="sort_desc" value="<?= $pro['sort_desc'] ?>"> <br>
                    Chi tiết: <br>
                    <textarea name=" detail" cols="30" rows="10"><?= $pro['detail'] ?></textarea>
                    <br><br>
                    <button type="submit" class="btn btn-sm btn-success" name="btn">Lưu</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>