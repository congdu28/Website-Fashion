<style>
	.detail_order{
    overflow: hidden;
    /* transform: translateY(-100%); */
    position: relative;
    background-color: white;
    z-index: 7;
    position: fixed;
    top: 10%;
    right: 10%;
    left:10%;
   }
   .overflow_order{
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 5;
    background: rgba(0, 0, 0, 0.8);
    display: block;
	pointer-events: none;
   }
</style>
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
                                <li><a href="http://www.faceboook.com/lehuuphuoc0201"><i class="fa fa-facebook"></i></a></li>
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
					<div class="col-md-4 clearfix">
						<div class="shop-menu clearfix pull-left mob-ipa">
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
<div class="container" id="container">
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin-bottom: 20px;">
				  <li class="active" style="color: #FE980F; font-weight: bold; font-size: 20px;">Lịch Sử Mua Hàng </li>
				</ol>
			</div>
			<div class="breadcrumbs">
				<a style="margin-top: unset;margin-bottom: 10px;" href="<?=base?>" name="submit" class="btn btn-primary pull-left">Trở Về</a>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Địa Chỉ</td>
							<td class="total">Số Điện Thoại</td>
							<td class="description">Ngày Mua</td>
							<td class="price">Tổng Số Tiền</td>
							<td class="quantity">Trạng Thái</td>
							<td class="total">Chức Năng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
							<?php foreach($data["order"] as $key=>$values){?>
								<form method="post" id="form">
									<input name="id" type="text" value="<?=$values["id"]?>" hidden>
								<tr>
									<td class="cart_price">
										<p style="margin-bottom: 10px;"><?=$values["address"]?><p>
									</td>
									<td class="cart_description">
										<p style="margin-bottom: 10px;"><?=$values["phone_number"]?></p>
									</td>
									<td class="cart_description">
										<p style="margin-bottom: 10px;"><?=$values["create_at"]?></p>
									</td>
									<td class="cart_price" >
										<p style="margin-top: 10px;"><?=number_format ($values["total_mony"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?></p>
									</td>
									<td class="cart_quantity">
									<p style="margin-top: 10px;"><?=$values["status"]?></p>
									</td>
										<td class="cart_price" style="width: 170px;">
											<?php if($values["status"] == "Chờ Xử Lý") {?>
												<span style="margin-bottom: 18px; min-width: 84px;" class="btn btn-primary btn-update_quantity" onclick="cancelorder()">Hủy Đơn</span>
												<button  name="cancel" id="cancel" hidden></button>
											<?php }?>
											<?php if($values["status"] == "Đã Xử Lý" && $values["status_recieve"] == "false"){ ?>
												<button style="margin-bottom: 18px; width: 84px;" class="btn btn-primary btn-update_quantity" name="confirm">Xác Nhận</button>
											<?php }?>
<!--											--><?php //if($values["status_recieve"] == "true"){?>
<!--												<span style="margin-bottom: 18px;min-width: 84px;" class="btn btn-primary btn-update_quantity" onclick="deleteorder()">Xóa Đơn</span>-->
<!--												<button id="delete" name="delete" hidden></button>-->
<!--											--><?php //}?>
											<a  id_order="<?=$values["id"]?>" href="javascrip:void(0)" style="margin-bottom: 18px;" class="btn btn-primary btn_details_order" name="details">Chi Tiết</a>
										</td>
									</form>
								</tr>
							<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
</div>

	<?php require_once "./mvc/views/client/include/footer.php"; ?>
	<script>

		//Chi tiết hóa đơn
		$(document).on('click','.btn_details_order',function(){
			id_order = $(this).attr('id_order')
			$.post("ajax/orderdetails",{id_order:id_order},function(data){
				$("#container").html(data);
			});
   		 });
		// thông báo xác nhận xóa đơn hàng
		function deleteorder(){
			Swal.fire({
			title: 'Bạn có muốn xóa đơn hàng này không?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Có'
			}).then((result) => {
			if (result.isConfirmed) {
				$( "#delete" ).click();
			}
			});
		}
		// thông báo xác nhận hủy đơn hàng
		function cancelorder(){
			Swal.fire({
			title: 'Bạn có muốn hủy đơn hàng này không?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Có'
			}).then((result) => {
			if (result.isConfirmed) {
				$( "#cancel" ).click();
			}
			});
		}
	</script>
</body>
</html>