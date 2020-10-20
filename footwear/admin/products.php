<?php
require_once '../public/dbconnection.php';
$sql = "SELECT categories.cate_name, products.id, products.name, products.price, products.image, products.sort_desc, products.detail FROM products INNER JOIN categories ON products.cate_id = categories.cate_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$pro = $stmt->fetchALL(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<?php require_once './common/head.php' ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> quản trị sản phẩm </h2>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>id</th>
                        <th>Tên danh mục</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Mô tả ngắn</th>
                        <th>Chi tiết</th>
                        <th>Action
                            <br>
                            <a href="pro_add.php">Them</a>
                        </th>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($pro as $p) : ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td><?= $p['cate_name'] ?></td>
                                <td><?= $p['name'] ?></td>
                                <td><img src="<?= $p['image'] ?>" alt="" width="100px"></td>
                                <td><?= $p['price'] ?></td>
                                <td><?= $p['sort_desc'] ?></td>
                                <td><?= $p['detail'] ?></td>
                                <td><a href="pro_delete.php?id=<?= $c['cate_id'] ?>">Xóa</a>
                                    <a href="pro_edit.php?id=<?= $c['cate_id'] ?>">Sửa</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>