<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?=base?>">
    <title>Quản Trị</title>
    <!-- Bootstrap -->
    <link href="public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="public/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link href="public/build/css/custom.min.css" rel="stylesheet">
  </head>
  <style>
      .save_account{
        margin-left: 30px;
      }
  </style>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>ĐĂNG NHẬP</h1>
              <div>
                <input value="<?=$data["user"]?>" type="text" class="form-control" placeholder="Tài Khoản" name="user" required="" />
              </div>
              <div>
                <input value="<?=$data["pass"]?>" type="password" class="form-control" placeholder="Mật Khẩu" name="pass" required="" />
              </div>
              <div class="container-login">
                <button class="btn  btn-primary" name="login">Đăng Nhập</button>
                <label class="save_account" for="">Lưu Tài Khoản</label>
                <input  type="checkbox" id="save_account">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <br />

                <div>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
