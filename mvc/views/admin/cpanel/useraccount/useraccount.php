<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content" style="min-height: 460px; max-height: 460px;">
        <div class="table-responsive" >
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">STT</th>
                        <th class="column-title">Họ Tên</th>
                        <th class="column-title">Email</th>
                        <th class="column-title">Số Điện Thoại</th>
                        <th class="column-title">Địa Chỉ</th>
                        <th class="column-title no-link last"><span class="nobr">Trạng Thái</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data["listaccount"] as $key=>$values){ ?>
                        <tr class="even pointer">
                            <td style=" font-size: 16px;" class=""><?=($data["currentpage"]-1)*6+$key+1?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["name"]?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["email_account"]?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["phone_number"]?></td>
                            <td style=" font-size: 16px;" class=""><?=$values["address_user"]?></td>
                            <td>
                                <a href="<?=base?>admin/statusaccountuser&id=<?=$values["id"]?>&status=<?=$values["active_status"]?>&page=<?=$data["currentpage"]?>" style="height: 35px;min-width: 105px;" class="btn btn-primary" href=""><?=$values["active_status"]?></a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($data["currentpage"] != 1 && $data["currentpage"] >= 4){?>
        <a class="page-item" href="<?=base?>admin/useraccount&page=<?=1?>">Trang đầu</a>
        <?php }?>
    <?php for($i = 1; $i <= $data["totalpage"];$i++){ ?>
                <?php if($data["currentpage"] != $i){
                    if($i > $data["currentpage"]-3 && $i < $data["currentpage"] + 3){ ?>
                         <a class="page-item" href="<?=base?>admin/useraccount&page=<?=$i?>"><?=$i?></a>
                    <?php }?>
                <?php }else{ ?>
                <span class="current-page page-item"><?=$i?></span>
    <?php }}?>
    <?php if($data["currentpage"] != $data["totalpage"] && $data["currentpage"] <= $data["totalpage"] - 3){?>
        <a class="page-item" href="<?=base?>admin/useraccount&page=<?=$data["totalpage"]?>">Trang cuối</a>
    <?php }?>
</div>
