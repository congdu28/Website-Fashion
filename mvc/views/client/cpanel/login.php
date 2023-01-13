<?php require_once "./mvc/views/client/include/head.php"; ?>

<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 333666999</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> banquanao@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
                                <li><a href="http://www.faceboook.com/duars.cong"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fab fa-facebook"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-2 clearfix">
						<div class="logo pull-left">
                            <a href="<?=base?>"><img src="public/images/logo/cac-mau-logo-shop-quan-ao-thoi-trang-dep-va-tinh-te838.jpg" alt="" height=40px" width="150px"/></a>
						</div>
					</div>
					<div class="col-md-4 clearfix mob-ipa">
						<div class="shop-menu clearfix pull-left">
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="">Trang Chủ</a></li>
									<li><a href="<?=base?>contact/contact">Liên Hệ</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6 clearfix mob-ipa" >
						<div class="shop-menu clearfix pull-right">
						<ul class="nav navbar-nav collapse navbar-collapse" style="position: relative;">
							<?php if(isset($_SESSION["info"]["name"])){?>
								<li class="dropdown menu-info">
									<a class="text-info" href="javascrip:void(0)"> <?php echo '<i class="fa fa-user"></i>Xin chào '.$_SESSION['info']["name"].'<i class="fa fa-angle-down"></i>'; ?></a>
									<ul class="info-user">
											<li><a href="<?=base?>infouser/index">Thông tin cá nhân</a></li>
											<li><a href="<?=base?>home/history">Lịch sử mua hàng</a></li>
									</ul>
								</li>
							<?php }?>
								<li><a href="<?=base?>cart/showcart"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
								<li><?php if(isset($_SESSION["info"]["name"])) echo '<a href="logout/logout"><i class="fas fa-sign-out-alt"></i>Đăng Xuất</a>'; else echo '<a href="login/login"><i class="fa fa-lock"></i>Đăng Nhập</a>'; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="container" style="height: 500px;">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->
						<h2 style="text-align: center;">Đăng Nhập</h2>
                        <div style="height: 20px; width: 100%; color: red;"><?=$data["mess"]?><?php if(isset($_SESSION["error_login"])){echo $_SESSION["error_login"];unset($_SESSION["error_login"]);}?></div>
						<form action="login/login" method="post">
							<input type="text" placeholder="Email" name="email" value="<?=$data["email"]?>" required>
							<input type="password" placeholder="Mật Khẩu" name="password" value="<?=$data["pass"]?>" required>
                            <div style="display: flex; justify-content: space-around;">
                                <button type="submit" class="btn btn-primary" name="login">Đăng Nhập</button>
                                <a style="margin-left: 40px; padding-left: 30px; padding-right: 30px;" class="btn btn-primary" href="sigin/sigin">Đăng Kí</a>
                            </div>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
		
    <?php require_once "./mvc/views/client/include/footer.php"; ?>
</body>
</html>