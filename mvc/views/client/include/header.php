
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
		
		<div class="header-middle" style="height: 122px;"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-2 clearfix" >
						<div class="logo pull-left">
							<a href="<?=base?>"><img src="public/images/logo/cac-mau-logo-shop-quan-ao-thoi-trang-dep-va-tinh-te838.jpg" alt="" height=40px" width="150px"/></a>
						</div>
					</div>
					<div class="col-md-4 clearfix mob-ipa">
						<div class="shop-menu clearfix pull-left">
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="<?=base?>" class="contact-us.html">Trang Chủ</a></li>
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
											<li><a href="<?=base?>home/history">Lịch sử đơn hàng</a></li>
									</ul>
								</li>
							<?php }?>
								<li class="trung__subnav"><a href="<?=base?>cart/showcart"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
								<li class="trung__subnav"><?php if(isset($_SESSION["info"]["name"])) echo '<a href="logout/logout"><i class="fas fa-sign-out-alt"></i>Đăng Xuất</a>'; else echo '<a href="login/login"><i class="fa fa-lock"></i>Đăng Nhập</a>'; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<input type="checkbox" id="check"></input>
							<label for="check">
								<i style="font-size: 20px;" class="fas fa-bars" trung="open"></i>
								<i style="font-size: 25px;" class="fas fa-times" trung="close"></i>
							</label>
							<ul class="sub_nav">

								<li class="sub_nav__title"></li>
								<li>
									<a href="javascrip:void(0)" class="home">Menu</a>
								</li>
								<?php if(isset($_SESSION["info"])){?>
									<li>
										<p>Xin chào, <?=$_SESSION["info"]["name"]?></p>
									</li>
								<?php }?>
								<li>
									<a href="<?=base?>"><i class="fas fa-home"></i>Trang Chủ</a>
								</li>
								<li>
									<a href="<?=base?>contact/contact"><i class="fas fa-phone-square"></i>Liên Hệ</a>
								</li>
								<?php if(isset($_SESSION["info"])){?>
									<li>
										<a href="<?=base?>infouser/index"><i class="fas fa-user i_subnav"></i>Thông tin cá nhân</a>
									</li>
									<li>
										<a href="<?=base?>home/history"><i class="fas fa-history i_subnav"></i>Lịch sử đơn hàng</a>
									</li>
								<?php }?>
								<li>
									<a href="<?=base?>cart/showcart"><i class="fa fa-shopping-cart i_subnav"></i>Giỏ hàng</a>
								</li>
								<li>
									<?php if(isset($_SESSION["info"]["name"])) echo '<a href="logout/logout"><i class="fas fa-sign-out-alt i_subnav"></i>Đăng Xuất</a>'; else echo '<a href="login/login"><i class="fa fa-lock i_subnav"></i>Đăng Nhập</a>'; ?>
								</li>
								<li>
									<p></p>
								</li>
							</ul>
						</div>
		
					</div>
						<div class="col-sm-8">
							<form method="post">
								<div  style="position: relative;" class="search_box pull-right">
									<input id="search" type="text" placeholder="Tìm Kiếm Sản Phẩm"/><button id="btn-search" style="position: absolute; top: 5px; font-size: 23px;right: 3px; color:#999;border: none;background: none;" class="fas fa-search btnn"></button >
								</div>
							</form>
						</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<script>
		var content;
		var current_page;
		$(document).on('click','.btnn',function(){
			content = $("#search").val()
			current_page = 1;
			$.post("ajax/search",{content:content,page:current_page},function(data){
            	$("#listproduct").html(data);
        	});
			$.post("ajax/pagingsearch",{content:content},function(data){
                $("#getpage").html(data);
           });
    	});
		$(document).on('click','.nextpagesearch',function(){
			content = $("#search").val()
			current_page = $(this).attr('numPage');
			//xử lý khi người dùng click chuyển trang
			$.post("ajax/pagingsearch",{content:content,page:current_page},function(data){
            	$("#getpage").html(data);
        	});
			$.post("ajax/search",{content:content,page:current_page},function(data){
                $("#listproduct").html(data);
           });
    	});
		//xử lý khi người dùng bấm vào nút btn không bị sub mit
		document.querySelector('#btn-search').addEventListener('click',(e)=>{
			e.preventDefault()
		})
	</script>