<?php
require_once '../permission.php';
require_once '../public/dbconnection.php';
$sql = "select * from categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchALL(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<?php require_once './common/head.php' ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> quản trị danh mục </h2>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>cate_id</th>
                        <th>cate_name</th>
                        <th>cate_description</th>
                        <th>Action
                            <br>
                            <a href="cate_add.php">Them</a>
                        </th>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($cate as $c) : ?>
                            <tr>
                                <td><?= $c['cate_id'] ?> </td>
                                <td><?= $c['cate_name'] ?></td>
                                <td><?= $c['cate_description'] ?></td>
                                <td><a href="cate_delete.php?id=<?= $c['cate_id'] ?>">Xóa</a>
                                    <a href="cate_edit.php?id=<?= $c['cate_id'] ?>">Sửa</a>
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