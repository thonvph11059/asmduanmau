<?php
session_start();
require_once './public/dbconnection.php';
$id = $_GET['id'];
$sql = "select * from products where id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$pro = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT users.username, comment.content, comment.date FROM comment INNER JOIN users on comment.user_id = users.user_id WHERE pro_id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$comment = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['btn'])) {
	extract($_REQUEST);
	$user_id = $_SESSION['id'];
	$sql = "insert into comment set content = '$content', user_id = '$user_id', pro_id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	header('location:info.php?id=' . $id);
}
?>
<!DOCTYPE HTML>
<html>
<?php require_once './public/header.php'; ?>


<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<?php include_once './public/nav.php'; ?>
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Thông tin sản phẩm</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg product-detail-wrap">
					<div class="col-sm-8">
						<div class="owl-carousel">
							<div class="item">
								<div class="product-entry border">
									<a href="#" class="prod-img">
										<img src="footwear/<?= $pro['image'] ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
									</a>
								</div>
							</div>
							<div class="item">
								<div class="product-entry border">
									<a href="#" class="prod-img">
										<img src="footwear/<?= $pro['image'] ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-desc">
							<h3><?= $pro['name'] ?></h3>
							<p class="price">
								<span><?= $pro['price'] ?></span>
							</p>
							<p><?= $pro['sort_desc'] ?></p>
							<p><?= $pro['detail'] ?></p>
							<div class="input-group mb-4">
								<span class="input-group-btn">
									<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
										<i class="icon-minus2"></i>
									</button>
								</span>
								<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
								<span class="input-group-btn ml-1">
									<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="icon-plus2"></i>
									</button>
								</span>
							</div>
							<div class="row">
								<div class="col-sm-12 text-center">
									<p class="addtocart"><a href="cart.html" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-12 pills">
								<div class="bd-example bd-example-tabs">
									<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
										</li>
									</ul>

									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane border fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
											<div class="row">
												<div class="col-md-8">
													<h3 class="head">23 Reviews</h3>
													<?php foreach ($comment as $item) : ?>
														<div class="review">
															<div class="user-img" style="background-image: url(images/person1.jpg)"></div>
															<div class="desc">
																<h4>
																	<span class="text-left"><?= $item['username'] ?></span>
																	<span class="text-right"><?= $item['date'] ?></span>
																</h4>
																<p class="star">
																	<span>
																		<i class="icon-star-full"></i>
																		<i class="icon-star-full"></i>
																		<i class="icon-star-full"></i>
																		<i class="icon-star-half"></i>
																		<i class="icon-star-empty"></i>
																	</span>
																	<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
																</p>
																<p><?= $item['content'] ?></p>
															</div>
														</div>
													<?php endforeach ?>
												</div>
												<div class="col-md-4">
													<div class="rating-wrap">
														<h3 class="head">Give a Review</h3>
														<div class="wrap">
															<?php if (isset($_SESSION['username'])) : ?>
																<form action="" method="post">
																	<?= $_SESSION['username'] ?>: <br>
																	<input type="text" name="content">
																	<br>
																	<br>
																	<button class="btn-sm btn-primary" type="submit" name="btn">Bình luận</button>
																</form>
															<?php endif ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About Footwear</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost
							unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;
								<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | This
								template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a>
								, <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- popper -->
	<script src="js/popper.min.js"></script>
	<!-- bootstrap 4.1 -->
	<script src="js/bootstrap.min.js"></script>
	<!-- jQuery easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	<script>
		$(document).ready(function() {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function(e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function(e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>


</body>

</html>