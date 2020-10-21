<?php
require_once '../permission.php';
require_once '../public/dbconnection.php';
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
    } else {
        $image = "";
    }
    $sql = "INSERT INTO products (name,cate_id,price,image,sort_desc,detail) VALUES ('$name', '$cate_id','$price','$image','$sort_desc','$detail')";
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
                    <input type="text" name="name">
                    <br> <br>
                    Danh mục: <br>
                    <select name="cate_id">
                        <?php foreach ($cate as $c) : ?>
                            <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <br> <br>
                    Giá: <br>
                    <input type="text" name="price"> <br>
                    Ảnh: <br>

                    <input type="file" name="image"> <br>
                    Mô tả ngắn: <br>
                    <input type="text" name="sort_desc"> <br>
                    Chi tiết: <br>
                    <textarea name="detail" cols="30" rows="10"></textarea>
                    <br><br>
                    <button type="submit" class="btn btn-sm btn-success" name="btn">Lưu</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>