<style>
</style>
<?php require_once "./mvc/views/client/include/head.php"; ?>
<body>
	<?php require_once "./mvc/views/client/include/header.php"; ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li class="active" style="color: #FE980F; font-weight: bold; font-size: 20px;">Giỏ Hàng Của Bạn </li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình Ảnh</td>
							<td class="description">Tên Sản Phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số Lượng</td>
							<td class="total">Tổng Tiền</td>
							<td class="total">Chức Năng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php if(isset($_SESSION["cart"])){ ?>
							<?php foreach($_SESSION["cart"] as $key=>$values){?>
								<form method="post">
								<tr>
									<td class="cart_product">
										<img class="img-cart"src="public/images/img_product/<?=$values["img"]?>">
									</td>
									<td class="cart_description">
										<h4 style="margin-bottom: 10px;"><?=$values["name"]?></h4>
									</td>
									<td class="cart_price" >
										<p style="margin-top: 10px;"><?=number_format ($values["price"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?></p>
									</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button" style="display: flex;">
												<a class="cart_quantity_down" href="<?=base?>ajax/downquantity&id=<?=$values["id"]?>"> - </a>
												<input id="quantity" class="cart_quantity_input" type="text" name="quantity" value="<?=$values["quantity"]?>" autocomplete="off" size="2">
												<input type="text" value="<?=$values["id"]?>" name="idproduct" hidden>
												<a class="cart_quantity_up" href="<?=base?>ajax/upquantity&id=<?=$values["id"]?>"> + </a>
											</div>
										</td>
										<td class="cart_total" id = "'<?=$values["id"]?>'">
											<p class="cart_total_price"><?=number_format ($values["total"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?>đ</p>
										</td>
										<td class="cart_delete">
											<button style="margin-bottom: 18px;" class="btn btn-primary btn-update_quantity" name="updatequantity">Cập Nhật</button>
											<a style="background: #999;" class="cart_quantity_delete" href="<?=base?>ajax/deleteproductcart&id=<?=$values["id"]?>"><i class="fa fa-times"></i></a>
										</td>
									</form>
								</tr>
							<?php }?>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
    <form method="POST">
		<section id="do_action">
			<div class="container">
				<div class="heading">
					<h3 style="color: #FE980F;">Thanh Toán Đơn Hàng</h3>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="info-order">
							<input name="order[name]" value="<?php if(isset($_SESSION["info"]["name"])) echo $_SESSION["info"]["name"]; ?>" class="order full-name" type="text" placeholder="Họ Tên" required>
							<input name="order[phone]" value="<?php if(isset($_SESSION["info"]["phone"])) echo $_SESSION["info"]["phone"]; ?>" class="order phone-number" type="text" placeholder="Số Điện Thoại" required>
							<input name="order[address]" value="<?php if(isset($_SESSION["info"]["address"])) echo $_SESSION["info"]["address"]; ?>" class="order add-ress" type="text" placeholder="Địa Chỉ" required>
							<input name="order[total]" type="text" value="<?=$data['total']+35000?>" hidden>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="total_area">
							<ul>
								<li>Tổng Số Tiền Sản Phẩm <span><?=number_format ($data["total"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> đ</span></li>
								<li>Phí Vận Chuyển <span>35.000đ</span></li>
								<li>Tổng Số Tiền Thanh Toán <span><?=number_format (($data["total"]+35000) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> đ</span></li>
							</ul>
								<button style="margin-left: unset;" name="submit" class="btn btn-default update">Thanh Toán</button>
						</div>
					</div>
				</div>
			</div>
		</section><!--/#do_action-->
	</form>

	<?php require_once "./mvc/views/client/include/footer.php"; ?>
</body>
</html>
<script>
	 $(document).on('click','.updatequantity',function(){
		quantity = $("#quantity").val()
        id = $(this).attr('idproduct')
		$.post("ajax/updatequantity",{id:id,quantity:quantity},function(data){
       });
    });
</script>