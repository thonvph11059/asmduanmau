<?php
require_once '../public/dbconnection.php';
$sql = "SELECT users.username, comment.id,comment.pro_id, comment.content, comment.date FROM comment INNER JOIN users on comment.user_id = users.user_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$comment = $stmt->fetchALL(PDO::FETCH_ASSOC);

$countsql = "SELECT COUNT(id) as total FROM comment ";
$stmt = $conn->prepare($countsql);
$stmt->execute();
$count = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($count);
// die;
?>



<!DOCTYPE html>
<html lang="en">

<?php require_once './common/head.php' ?>

<body>
    <?php include_once './common/nav.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> quản trị comment </h2>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>id
                            <br>
                            Tổng: <?= $count[0]['total'] ?>
                        </th>
                        <th>Tên người dùng</th>
                        <th>Sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Ngày</th>
                        <th>Action
                            <br>
                            <a href="cate_add.php">Them</a>
                        </th>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($comment as $c) : ?>
                            <tr>
                                <td><?= $c['id'] ?> </td>
                                <td><?= $c['username'] ?> </td>
                                <td><a href="../info.php?id=<?= $c['pro_id'] ?>"><?= $c['pro_id'] ?></a> </td>
                                <td><?= $c['content'] ?> </td>
                                <td><?= $c['date'] ?> </td>
                                <td><a onclick="return confirm('Có chắc chắn xóa comment này')" href="comment_delete.php?id=<?= $c['id'] ?>">Xóa</a>
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