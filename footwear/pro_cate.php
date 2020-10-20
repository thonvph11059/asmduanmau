<?php
require_once './public/dbconnection.php';
require_once './public/header.php';
$id = $_GET['id'];
$sql = "select * from products where cate_id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$pro = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE HTML>
<html>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <?php include './public/nav.php'; ?>
        <?php include './public/slider.php'; ?>

        <div class="colorlib-product">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                        <h2>Sản phẩm</h2>
                    </div>
                </div>
                <div class="row row-pb-md">
                    <?php foreach ($pro as $p) : ?>
                        <div class="col-lg-3 mb-4 text-center">
                            <div class="product-entry border">
                                <a href="info.php?id=<?= $p['id'] ?>" class="prod-img">
                                    <img src="footwear/<?= $p['image'] ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
                                </a>
                                <div class="desc">
                                    <h2><a href="#"><?= $p['name'] ?></a></h2>
                                    <span class="price"><?= $p['price'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><a href="#" class="btn btn-primary btn-lg">Mua tất cả sản phẩm</a></p>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once './public/footer.php'; ?>

        <!-- jQuery -->
        <?php require_once './public/script.php'; ?>

</body>

</html>