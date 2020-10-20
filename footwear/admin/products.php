<?php
require_once '../public/dbconnection.php';
$path = "Quản trị sản phẩm";
$sql = "select * from products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once './admin/' ?>

<body>
    <div class="container" style="text-align: center;">
        <?php
        include_once './admin_asset/header.php';

        ?>
        <section class="news">
            <div class="news-body">
                <table style="width: 100%;" border="1">
                    <thead>
                        <th>Pro_id</th>
                        <th>Danh mục</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán</th>
                        <th>Ảnh</th>
                        <th>Gía mềm</th>
                        <th>Mô tả chi tiết</th>
                        <th>Hành động<br>
                            <a href="pro_add.php"><button class="btn btn_red" type="submit">Thêm</button></a>
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $p) : ?>

                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td><?= $p['cate_id'] ?></td>
                                <td><?= $p['name'] ?></td>
                                <td><?= $p['price'] ?></td>
                                <td><img src=" ../img/<?= $p['image'] ?>" alt="" width="200px">
                                </td>

                                <td><?= $p['soft_price'] ?></td>
                                <td><?= $p['detail'] ?></td>


                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa mục này không?')" href="pro_delete.php?id=<?= $p['pro_id'] ?>"><button class="btn btn_red" type="submit">Xóa</button></a>
                                    <br>
                                    <a href="pro_edit.php?id=<?= $p['pro_id'] ?>"><button class="btn btn_red" type="submit">Sửa</button></a>
                                </td>
                            </tr>
                        <?php endforeach ?>


                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>