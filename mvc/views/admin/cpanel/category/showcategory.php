<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
                <a href="admin/addcategory" class="btn btn-primary">Thêm mới</a>  
                <h3 class="text-success"><?=$data["mess"]?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <div class="table-responsive" style="min-height: 400px;">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Tên Danh Mục</th>
<!--                        <th class="column-title">Trạng Thái</th>-->
                        <th class="column-title">Ngày Tạo</th>
                        <th class="column-title no-link last"><span class="nobr">Hành Động</span>
                        </th>
                    </tr>
                </thead>
                <?php if(isset($data["data"])){?>
                <tbody>
                    <?php foreach($data["data"] as $key => $values){ $stt = ($data["currentpage"]-1)*5 + $key+1?>
                    <tr class="even pointer">
                        <td style=" font-size: 16px;" class=""><?=$values["name"] ?></td>
<!--                        <td style=" font-size: 16px;" class=""><a class="btn btn-primary" href="--><?//=base?><!--admin/statuscategory&id=--><?//=$values["id"]?><!--&status=--><?//=$values["status"]?><!--&page=--><?//=$data['currentpage']?><!--">--><?//=$values["status"] ?><!--</a></td>-->
                        <td style=" font-size: 16px;" class=""><?=$values["create_at"] ?></td>
                        <td>
                        <a style="height: 35px;" class="btn btn-success" href="<?=base?>admin/editcategory&id=<?=$values['id']?>&page=<?=$data['currentpage']?>">Sửa</a>
                            <a style="height: 35px" class="btn btn-danger submit" href="javascrip:void(0)" onclick="del(<?=$values['id']?>,'<?=$values['name'] ?>','<?=base.'admin/deletecategory/'?>','danh mục ',<?=$data['currentpage']?>,<?=$stt?>)"  >Xóa</a> 
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if($data["currentpage"] != 1 && $data["currentpage"] >= 4){?>
        <a class="page-item" href="<?=base?>admin/showcategory&page=<?=1?>">Trang đầu</a>
        <?php }?>
    <?php for($i = 1; $i <= $data["total"];$i++){ ?>
                <?php if($data["currentpage"] != $i){ 
                    if($i > $data["currentpage"]-3 && $i < $data["currentpage"] + 3){ ?>
                         <a class="page-item" href="<?=base?>admin/showcategory&page=<?=$i?>"><?=$i?></a>
                    <?php }?>
                <?php }else{ ?>
                <span class="current-page page-item"><?=$i?></span>
    <?php }}?>
    <?php if($data["currentpage"] != $data["total"] && $data["currentpage"] <= $data["total"] - 3){?>
        <a class="page-item" href="<?=base?>admin/showcategory&page=<?=$data["total"]?>">Trang cuối</a>
        <?php }?>
</div>
