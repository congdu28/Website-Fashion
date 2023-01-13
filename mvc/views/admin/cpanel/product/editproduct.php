<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
            <a class="btn btn-primary" href="<?=base?>admin/showproduct&page=<?=$data["page"]?>">Trở Về</a>
                <h4 class="text-success"><?php if(isset($data["notifi"]["addsuccess"])){echo $data["notifi"]["addsuccess"];} ?></h4>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form class="" action="" method="post" novalidate enctype="multipart/form-data">
            <div class="row" >
                <div class="col-5">
                    <div class="form-group">
                        <label for="">Tên Sản Phẩm</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["name"])){echo $data["notifi"]["name"];}?> </h6>
                        <input id="name" type="text" class="form-control" name="product[name]" value="<?=$data["product"][0]["name"]?>">
                   
                    </div>
                  
                    <div class="form-group">
                        <label for="">Chọn Danh Mục Sản Phẩm</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["category"])){echo $data["notifi"]["category"];}?> </h6>
                        <select class="form-control" name="product[id_category]">
                            <option value="<?=$data["product"][0]["category_id"]?>"><?=$data["product"][0]["name_category"]?></option>
                            <?php foreach($data["category"] as $key=>$values){?>
                            <option value="<?=$values["id"]?>"><?=$values["name"]?></option>
                            <?php } ?>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="">Nhà Sản Xuất</label>
                        <input id="name" type="text" class="form-control" name="product[company]" value="<?=$data["product"][0]["production_company"]?>">
                    </div>
                    
                </div>
                
                <!-- trong row chứa col , trong col chứa dc row -->
                <!-- col từ 1 -> 12 -->
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Giá Sản Phẩm</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["price"])){echo $data["notifi"]["price"];}?> </h6>
                        <input id="" type="number" class="form-control" name="product[price]" value="<?=$data["product"][0]["price"]?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm Giá</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["sale"])){echo $data["notifi"]["sale"];}?> </h6>
                        <input id="name" type="number" class="form-control" name="product[sale]" value="<?=$data["product"][0]["sale_product"]?>" placeholder="%">
                    </div>

                    <div class="form-group">
                        <label for="">Số Lượng</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["quantity"])){echo $data["notifi"]["quantity"];}?> </h6>
                        <input id="name" type="number" class="form-control" name="product[quantity]" value="<?=$data["product"][0]["quantity"]?>">
                    </div>
                </div>
                <div class="col-2">
                <div class="form-group">
                        <label for="">Hình Ảnh</label>
                        <h6 class="text-danger"><?php if(isset($data["notifi"]["img"])){echo $data["notifi"]["img"];}?> </h6>
                        <input id="name" type="file" accept=".jpg, .png" class="" name="img">
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                    <label for="">Mô Tả</label>
                        <textarea style="height: 100px;" id="name" type="text" class="form-control" name="product[decs]" ><?=$data["product"][0]["descrip"]?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>