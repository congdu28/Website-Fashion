<h3 style="text-align: center;font-weight: bold;">CHI TIẾT ĐƠN HÀNG</h3>
<a class="btn btn-primary" href="<?=base?>admin/order&page=<?=$data["page"]?>">Trở Về</a>
<h3>Thông Tin Khách Hàng</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Tên Khách Hàng</th>
      <th scope="col">Số Điện Thoại</th>
      <th scope="col">Địa Chỉ</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><?=$data["infouser"][0]["name"]?></td>
      <td><?=$data["infouser"][0]["phone_number"]?></td>
      <td><?=$data["infouser"][0]["address_user"]?></td>
      <td><?=$data["infouser"][0]["email_account"]?></td>
    </tr>
  </tbody>
</table>
<h3>Thông Tin Đơn Hàng</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên Sản Phẩm</th>
      <th scope="col">Số Lượng</th>
      <th scope="col">Đơn Giá</th>
    </tr>
  </thead>
  <tbody>
      <?php $total = 0?>
    <?php foreach($data["orderdetails"] as $key=>$values){?>
    <tr>
      <th scope="row"><?=$key+1?></th>
      <td><?=$values["name_product"]?></td>
      <td><?=$values["quantity"]?></td>
      <td><?=number_format ($values["unit_price"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</td>
      <?php $total+= $values["unit_price"];?>
    </tr>
    <?php }?>
  </tbody>
</table>
<h2>Phí vận chuyển 35.000đ</h2>
<h2 style="color: black; font-weight: bold;">Tổng Tiền: <?=number_format ($total+35000 , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</h2>
<form method="POST">
  <?php if($data["statusorder"] == "Chờ Xử Lý"){ ?>
  <button class="btn btn-primary" name="submit">Xử Lý Đơn Hàng</button>
  <?php }else{?>
    <h2 style="color: green; font-weight: bold;">Đơn Hàng Đã Được Xử Lý</h2>
  <?php }?>
</form>