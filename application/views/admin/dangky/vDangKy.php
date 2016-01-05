<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?php 
      	$this->load->view('admin/dangky/vAdd');
      ?>
    </div>
  </div>
</div>
<head>
    <script language="javascript">
        function xacnhan() 
        {
            if (!window.confirm('Bạn có muốn xóa người dùng này không?')) 
            {
                return false;
            }
        }
    </script>
</head>

<div class="container">
  <h2>Người dùng</h2>       
  <table class="table table-striped">
    <thead>
      <tr>
      	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Thêm người dùng</button>
      </tr>
      <tr>
        <th width='50'>Mã</th>
        <th>Ảnh đại diện</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Kích hoạt</th>
        <th>Ngày tạo</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        <?php
        	//print_r($info);
            foreach($info as $item){
                echo "<tr>";
                    echo "<td>$item[ND_MA]</td>";
                    echo "<td> <img src=\"data:image/png;base64,".base64_encode($item['ND_HINH'])."\" width=50 height=50> </td>";
                    echo "<td>$item[ND_HO] $item[ND_TEN]</td>";
                    echo "<td>$item[ND_DIACHIMAIL]</td>";
                    echo "<td>$item[ND_KICHHOAT]</td>";
                    echo "<td>$item[ND_NGAYTAO]</td>";
                    echo "<td><a href=".base_url()."index.php/admin/dangky/edit/$item[ND_MA]>"; ?><img src='<?php echo base_url(); ?>media/images/sua.png' width='30' height='20'><?php echo "</a></td>";
                    echo "<td><a href=".base_url()."index.php/admin/dangky/delete/$item[ND_MA] onclick='return xacnhan();'>"; ?><img src='<?php echo base_url(); ?>media/images/xoa.png' width='20' height='20'><?php echo "</a></td>";
                echo "</tr>";
                     
            }
        ?>
    </tbody>
    <tr><td align='center' colspan='8'>Tổng: <?php echo $total." Trang: ".$linkpage; ?></td></tr>
  </table>
</div>