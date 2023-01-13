<style>
    .paging{
        border: 1px solid #ccc;
        padding: 5px 9px;
        color: #000;
    }
    .paging-current{
        background: #666;
        color: #FFF;
    }
</style>
<section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>SHOP WHITE</h1>
									<h2>Fashion Week</h2>
									<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
								</div>
								<div class="col-sm-6">
									<img style="min-height: 400px; object-fit: cover;max-height: 400px;min-width: 390px;" src="public/images/img_banner/banner0.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							<!--dùng for để duyệt banner-->
                            <?php foreach($data["sliders"] as $key=>$values){?>
							<div class="item">
								<div class="col-sm-6">
                                <h1>SHOP WHITE</h1>
									<h2>Fashion Week</h2>
									<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
								</div>
								<div class="col-sm-6">
									<img style="min-height: 400px; object-fit: cover;max-height: 400px;min-width: 390px;" src="public/images/img_banner/<?=$values['slider_img']?>" class="girl img-responsive" alt="" />
								</div>
							</div>
							<?php }?>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="mobi">
					<div class="left-sidebar">
						<h2 style="padding-top: 3px ;">Danh Mục</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a class="allproduct" href="javascript:void(0)">Tất Cả Sản Phẩm</a></h4>
                                    <hr>
								</div>
							</div>
                            <?php foreach($data["totalcategory"] as $key=>$values){ ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    <h4 class="panel-title"><a class="category" href="javascrip:void(0)" id_category = <?=$values["id"]?> ><?=$values["name"]?></a></h4>
                                    </div>
                                </div>

                            <?php }?>

						</div><!--/category-products-->
						
                        <!--Sản Phẩm Sale   -->
                        <hr>
                        <h2 class="title text-center">Sản Phẩm Giảm Giá</h2>
                        <?php foreach($data["productsale"] as $key=>$values){?>
                        <div class="col-sm-12">
                            <div class="product-image-wrapper"style="max-height: 400px;">
                                <div class="single-products"style="max-height: 400px;">
                                    <div class="productinfo text-center" style="max-height: 450px;">
                                        <img style="max-height: 250px;min-height: 250px;object-fit: cover;" src="public/images/img_product/<?=$values["img_product"]?>" alt="" />
                                        <h4 style="text-decoration: line-through;"><?=number_format ($values["price"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?>đ</h4>
                                        <h2 style="margin: unset;"><?=number_format ($values["price"] * (1-$values["sale_product"]/100) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) ?> đ</h2>
                                        <p style="margin-top: 10px ;"><?=$values["name"]?></p>
                                        <a href="javascript:void(0)" class="btn btn-default add-to-cart" idproduct = "<?=$values['id']?>"><i class="fa fa-shopping-cart"></i>Mua Hàng</a>
                                    </div>
                                    <img src="public/client/images/home/sale.png" class="new" alt="" />
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>

                        
			</div>
            <div class="col-sm-9 padding-right">
                <!--features_items-->
                    <div class=""><!--features_items-->
                        <h2 class="title text-center" style="padding-top: 3px;">Danh Sách Sản Phẩm</h2>
                    </div>
                    <!-- dùng để chứa sản phẩm -->
                    <div  class="features_items" id="listproduct"><!--features_items-->
                            <!-- trong này là sản phẩm -->
                    </div>
                    <!--phân trang-->
                    <div class="getpage" id="getpage" style="margin-bottom: 5px; margin-left: 15px;height: 30px;">
                            <!-- phân trang sản phẩm -->
                    </div>
                    <!--features_items-->
                    <!--<div style="margin-left: 400px; margin-bottom: 50px;" class="box-item-page">
                       <a class="page-item" href="javascript:void(0)">Xem Thêm</a>
                    </div>-->
                
                   
                <div class="category-tab"><!--category-tab-->
                    <h2 class="title text-center" style="padding-top: 3px;">Sản Phẩm Mới Nhất</h2>
                    <div class="tab-content">
                        <?php foreach($data["productnew"] as $key=>$values){?>
                            <div class="tab-pane fade active in" id="tshirt" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper" style="max-height: 400px; min-height: 400px;">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="min-height: 255px; max-height: 255px; object-fit: cover;" src="public/images/img_product/<?=$values["img_product"]?>" alt="" />
                                                <h4 style="text-decoration: line-through;"><?=number_format ($values["price"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?>đ</h4>
                                                <h2 style="margin:unset"><?=number_format ($values["price"] * (1-$values["sale_product"]/100) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) ?> đ</h2>
                                                <p><?=$values["name"]?></p>
                                                <a href="javascript:void(0)" class="btn btn-default add-to-cart" idproduct = "<?=$values['id']?>"><i class="fa fa-shopping-cart"></i>Mua Hàng</a>
                                            </div>
                                            <img src="public/client/images/home/new.png" class="new" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        <?php }?> 
                    </div><!--/category-tab-->
                </div>
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Sản Phẩm Bán Chạy</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">	
                                
                                   <?php foreach($data["MSProduct"] as $key=>$values){?>
                
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="max-height: 250px; object-fit: cover;min-height: 250px;" src="public/images/img_product/<?=$values["img_product"]?>" alt="" />
                                                <h4 style="text-decoration: line-through;"><?=number_format ($values["price"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?>đ</h4>
                                                <h2 style="margin:unset"><?=number_format ($values["price"] * (1-$values["sale_product"]/100) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) ?> đ</h2>
                                                <p><?=$values["name"]?></p>
                                                <a href="javascript:void(0)" class="btn btn-default add-to-cart" idproduct = "<?=$values["id"]?>"><i class="fa fa-shopping-cart"></i>Mua Hàng</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                            </a>			
                    </div>
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>
<div>
</div>
<div class="features_items details" id="details" style="transform: translateY(-150%);">
<!--chi tiết sản phẩm-->
</div>
<div id="overflow" class="overflow">
<!-- lớp phủ của chi tiết sản phẩm -->
</div>
<div id="notification">
<!-- thông báo -->
</div>
<script src="public/homejs.js"></script>
<script>
    //thêm sản phẩm vào giỏ hàng
    $(document).on('click','.addcart',function(){
        idproduct =  $(this).attr('idproduct')
        $.post("ajax/addcart",{id:idproduct},function(data){
            $("#notification").html(data);
        });
    });
    //bắt sư kiện và truyền dữ liệu đi khi người dùng bấm nút "bình luận"
    $(document).on('click','.comment-product',function(){
        idproduct =  $(this).attr('idproduct')
        content   = $('.content-comment').val()
        $.post("ajax/commentproduct",{id_product:idproduct,content:content},function(data){
            $("#list-comment").append(data);
        });
        document.getElementById('content-comment').value = "";
    });
</script>