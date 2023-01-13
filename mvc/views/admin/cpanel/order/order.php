<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content" style="min-height: 460px;max-height: 460px;">
        <div class="table-responsive" >
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">STT</th>
                        <th class="column-title">Tên Khách Hàng</th>
                        <th class="column-title">Tổng Tiền</th>
                        <th class="column-title">Ngày Đặt</th>
                        <th class="column-title">Trạng Thái</th>
                        <th class="column-title no-link last"><span class="nobr">Thao Tác</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data["listorder"] as $key=>$values){ ?>
                        <tr class="even pointer">
                            <td style=" font-size: 16px;" class=""><?=($data["currentpage"]-1)*6+$key+1?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["name"]?></td>
                            <td style=" font-size: 16px;" class=""><?=number_format ($values["total_mony"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</td>
                            <td style=" font-size: 16px;" class=""><?=$values["create_at"]?></td>
                            <?php if($values["status"] != "Chờ Xử Lý"){?>
                                <td style=" font-size: 16px;color: green;font-weight: bold;" class=""><?=$values["status"]?></td>
                                <?php }else{?>
                                    <td style=" font-size: 16px;color: red;font-weight: bold;" class=""><?=$values["status"]?></td>
                            <?php }?>
                            <td>
                                <a href="<?=base?>admin/orderdetails&id_order=<?=$values['id']?>&id_user=<?=$values['user_id']?>&page=<?=$data["currentpage"]?>" style="height: 35px;" class="btn btn-primary" href="">Chi Tiết</a> 
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($data["currentpage"] != 1 && $data["currentpage"] >= 4){?>
        <a class="page-item" href="<?=base?>admin/order&page=<?=1?>">Trang đầu</a>
        <?php }?>
    <?php for($i = 1; $i <= $data["totalpage"];$i++){ ?>
                <?php if($data["currentpage"] != $i){ 
                    if($i > $data["currentpage"]-3 && $i < $data["currentpage"] + 3){ ?>
                         <a class="page-item" href="<?=base?>admin/order&page=<?=$i?>"><?=$i?></a>
                    <?php }?>
                <?php }else{ ?>
                <span class="current-page page-item"><?=$i?></span>
    <?php }}?>
    <?php if($data["currentpage"] != $data["totalpage"] && $data["currentpage"] <= $data["totalpage"] - 3){?>
        <a class="page-item" href="<?=base?>admin/order&page=<?=$data["totalpage"]?>">Trang cuối</a>
    <?php }?>
</div>
