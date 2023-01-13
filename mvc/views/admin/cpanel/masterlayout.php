<?php
    require_once "./mvc/views/admin/include/header.php";
?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="admin/home" class="site_title"><span>Trang Quản Trị</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="public/build/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin Chào,</span>
                <h2>Quản Trị Viên</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

                <?php
                    require_once "./mvc/views/admin/include/sidebar.php";
                ?>

            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
                <?php
                    require_once "./mvc/views/admin/include/topNavigation.php";
                ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col">
            <?php
                require_once "./mvc/views/admin/cpanel/".$data["folder"]."/".$data["file"].".php";
            ?>
        </div>
        <!-- /page content -->	
        <?php
            require_once "./mvc/views/admin/include/footer.php";
        ?>
  </body>
</html>
