<style>
    .title-statistical{
        font-size: 25px;
    }
    .tile-stats{
        min-height: 125px;
    }
    .count{
      font-size: 15px;
    }
</style>
<div class="col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Bảng Điều Khiển</h3>
        </div>

        <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </span>
            </div>
        </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
        <div class="">
            <div class="x_content">
            <div class="row">
                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon">
                      <!-- <i class="fa fa-shopping-cart"></i> -->
                    </div>
                    <div class="count"><?=$data["totalorder"]?></div>

                    <h3>Đơn Hàng</h3>
                </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6  " >
                <div class="tile-stats">
                    <div class="icon">
                      <!-- <i class="fa fa-group"></i> -->
                    </div>
                    <div class="count"><?=$data["totaluser"]?></div>

                    <h3>Thành Viên</h3>
                </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon">
                      <!-- <i class="fa fa-money"></i></i> -->
                    </div>
                    <div class="count"><?=number_format ($data["totalmony"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?></div>

                    <h3>Doanh Thu</h3>
                </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon">
                      <!-- <i class="fa fa-check-square-o"></i> -->
                    </div>
                    <div class="count"><?=$data["ordersuccess"]?></div>
                    <h3 class="title-statistical">Đơn Hàng Đã Giao</h3>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="page-title">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Đơn Hàng Gần Đây</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên Khách Hàng</th>
                          <th>Tổng Tiền</th>
                          <th>Thời Gian</th>
                          <th>Trạng Thái</th>
                          <th>Thao Tác</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach($data["ordernew"] as $key=>$value){ ?>
                          <tr>
                            <td><?=$key+1?></td>
                            <td><?=$value["name"]?></td>
                            <td><?=number_format ($value["total_mony"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?></td>
                            <td><?=$value["create_at"]?></td>
                            <?php if($value["status"] == "Chờ Xử Lý"){ ?>
                              <td style="color: red; font-weight: bold;"><?=$value["status"]?></td>
                            <?php }else {?>
                              <td style="color: green; font-weight: bold;"><?=$value["status"]?></td>
                            <?php }?>
                            <td style="padding: unset; padding-left: 5px ;">
                            <a style="height: 35px;" class="btn btn-primary" href="<?=base?>admin/orderdetails&id_order=<?=$value['id']?>&id_user=<?=$value['user_id']?>">Chi Tiết</a>
                            </td>
                          </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>