<?php
require_once './public/dbconnection.php';
require_once './public/header.php';

$sql = "select * from products";
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

		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="intro">It started with a simple idea: Create quality, well-designed products that I
							wanted myself.</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-product">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url(images/men.jpg);"></a>
							<div class="desc">
								<h2><a href="#">Shop Men's Collection</a></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url(images/women.jpg);"></a>
							<div class="desc">
								<h2><a href="#">Shop Women's Collection</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

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
									<img src="images/item-1.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
								</a>
								<div class="desc">
									<h2><a href="#"><?php echo $p['name'] ?></a></h2>
									<span class="price"></span>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p><a href="#" class="btn btn-primary btn-lg">Shop All Products</a></p>
					</div>
				</div>
			</div>
		</div>

		<?php include_once './public/footer.php'; ?>

		<!-- jQuery -->
		<?php require_once './public/script.php'; ?>

</body>

</html>