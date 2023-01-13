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
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
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
							<a href="<?=base?>"><img src="public/images/logo/logo.jpg" alt="" /></a>
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
					<div class="col-md-6 clearfix mob-ipa">
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
    <div id="contact-page" class="container">
        <h3 style="color: #FE980F;">HỖ TRỢ TRỰC TUYẾN</h3>
		<div style="padding: unset;" class="form-group col-md-12">
			<a href="<?=base?>" name="submit" class="btn btn-primary pull-left">Trở Về</a>
		</div>
    	<div class="bg">  	   
    		<div class="row" style="margin-top: 100px;">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Liên Hệ Với Chúng Tôi</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Họ Và Tên">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Nội Dung Lời Nhắn"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-center" value="Gửi">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Thông Tin Liên Hệ</h2>
	    				<address>
	    					<p>QUẦN ÁO THỜI TRANG</p>
							<p>Quận Nam Từ Liêm, TP Hà Nội</p>
							<p>Số Điện thoại: +84 333666999</p>
							<p>Email: banquanaonhom4@gmail.com</p>
	    				</address>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
</body>
    <?php require_once "./mvc/views/client/include/footer.php"; ?>