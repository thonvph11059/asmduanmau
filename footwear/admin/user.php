<?php
require_once '../permission.php';
require_once '../public/dbconnection.php';
$sql = "select * from users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once './common/head.php' ?>

<body>
    <div class="container">

        <div class="row">
            <?php include_once './common/nav.php' ?>
            <div class="col-md-12">
                <h2> quản trị danh mục </h2>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>username</th>
                        <th>email</th>
                        <th>Avatar</th>
                        <th>Role</th>
                        <th>Action
                            <br>
                            <a href="user_add.php">Them</a>
                        </th>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($user as $u) : ?>
                            <tr>
                                <td><?= $u['user_id'] ?> </td>
                                <td><?= $u['username'] ?> </td>
                                <td><?= $u['email'] ?> </td>
                                <td><img src="<?= $u['avatar'] ?>" alt="" width="100px"></td>
                                <td><?= $u['role'] ?> </td>
                                <td><a onclick="return confirm('Chắc chắn xóa tài khoản này?')" href="user_delete.php?id=<?= $u['user_id'] ?>">Xóa</a>
                                    <a href="user_edit.php?id=<?= $u['user_id'] ?>">Sửa</a>
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