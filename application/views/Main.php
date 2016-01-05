<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $titlePage; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>media/bootstrap/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>Cùng nhau đi du lịch</h1>
    <p>Website quảng bá địa điểm du lịch vùng đồng bằng sông Cửu Long</p> 
  </div>
  <div class="row">
        <div class="container">
          <ul class="nav nav-tabs">
            <li class="active"><a href="<?php echo base_url(); ?>./">Trang chủ</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Submenu 1-1</a></li>
                <li><a href="#">Submenu 1-2</a></li>
                <li><a href="#">Submenu 1-3</a></li>                        
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url(); ?>index.php/admin/tinh">Khu vực<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>index.php/admin/tinh">Tỉnh/Thành phố</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/admin/huyen">Quận/Huyện</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/admin/xa">Xã/Phường/Thị trấn</a></li>                        
              </ul>
            </li>
            <li><a href="#">Người dùng</a></li>
            <li><a href="javascript:window.history.go(-1);">Trở lại</a></li>
          </ul>
        </div>
  </div>
  <div class="row">
      <?php //$this->load->view($subviewadd); ?>
  </div>
  <div class="row">
      <?php $this->load->view($subview); ?>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <h3>Giới thiệu</h3>
      <p>Website du lịch vùng đồng bằng sông Cửu Long</p>
    </div>
    <div class="col-sm-4">
      <h3>Liên hệ</h3>
      <p>Gmail:huy50621@gmail.com</p>
    </div>
  </div>
</div>

</body>
</html>