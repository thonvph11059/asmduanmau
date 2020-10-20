<?php
require_once '../public/dbconnection.php';
$sql = "select * from categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchALL(PDO::FETCH_ASSOC);



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
                <h2> quản trị danh mục </h2>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>cate_id</th>
                        <th>cate_name</th>
                        <th>cate_description</th>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($cate as $c) : ?>
                            <tr>
                                <td><?= $c['cate_id'] ?> </td>
                                <td><?= $c['cate_name'] ?></td>
                                <td><?= $c['cate_description'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>