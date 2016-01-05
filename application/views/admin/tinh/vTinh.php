<head>
    <script language="javascript">
        function xacnhan() 
        {
            if (!window.confirm('Bạn có muốn xóa tỉnh này không?')) 
            {
                return false;
            }
        }
    </script>
</head>

<div class="container">
  <h2>Quản lý tỉnh thành</h2>       
  <table class="table table-striped">
    <thead>
      <tr>
        <td colspan="6" align="center"><a href="<?php echo base_url(); ?>index.php/admin/tinh/add">Thêm tỉnh</a></td>
      </tr>
      <tr>
        <th>Mã tỉnh</th>
        <th>Tên tỉnh</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        <?php
            //$stt=$start;
            foreach($info as $item)
            {
                //$stt++;
                echo "<tr>";
                    //echo "<td>$stt</td>";
                    echo "<td>$item[T_MA]</td>";
                    echo "<td>$item[T_TEN]</td>";
                    echo "<td><a href=".base_url()."index.php/admin/tinh/edit/$item[T_MA]>Sửa</a></td>";
                    echo "<td><a href=".base_url()."index.php/admin/tinh/delete/$item[T_MA] onclick='return xacnhan();'>Xóa</a></td>";
                echo "</tr>";    
            }
        ?>
    </tbody>
    <tr><td>Tổng: <?php echo $total." Trang: ".$linkpage; ?></td></tr>
  </table>
</div>