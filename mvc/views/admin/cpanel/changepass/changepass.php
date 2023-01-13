<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['titel']?></h3>
                <h4 class="text-success"><?php if(isset($data["erro"]["addsuccess"])){echo $data["erro"]["addsuccess"];} ?></h4>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form class="" action="" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Mật Khẩu Cũ</label>
                        <h6 class="text-danger"><?php if(isset($data["erro"]["name"])){echo $data["erro"]["name"];}?> </h6>
                        <input id="name" type="password" class="form-control" name="data[pass_old]" required>
                    </div>
                    <div class="form-group">
                        <label for="">Mật Khẩu Mới</label>
                        <h6 class="text-danger"><?php if(isset($data["erro"]["price"])){echo $data["erro"]["price"];}?> </h6>
                        <input id="name" type="password" class="form-control" name="data[pass_new]" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nhập Lại Mật Khẩu Mới</label>
                        <h6 class="text-danger"><?php if(isset($data["erro"]["quantity"])){echo $data["erro"]["quantity"];}?> </h6>
                        <input id="name" type="password" required class="form-control" name="data[pass_again]">
                    </div>
                    <div style="display: flex; align-items: center;justify-content: center;" class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit">Xác Nhận</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
