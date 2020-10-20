		<?php
		$sql = "select * from categories";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$rl = $stmt->fetchAll(PDO::FETCH_ASSOC);
		?>

		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index.html">Footwear</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
							<form action="#" class="search-wrap">
								<div class="form-group">
									<input type="search" class="form-control search" placeholder="Search">
									<button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="index.php">Trang chủ</a></li>
								<li class="has-dropdown">
									<a href="#">Sản phẩm</a>
									<!-- show danh mục -->
									<ul class="dropdown">
										<?php foreach ($rl as $c) : ?>
											<li><a href="pro_cate.php?id=<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></a></li>
										<?php endforeach ?>
									</ul>
								</li>
								<li><a href="admin/products.php">Quản trị</a></li>
								<li><a href="contact.html">Liên hệ</a></li>
								<li class="cart"><a href="cart.html"><i class="icon-shopping-cart"></i>GIỏ hàng[0]</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>