<head>
    <script language="javascript">
        function xacnhan() 
        {
            if (!window.confirm('Bạn có muốn xóa huyện nào không?')) 
            {
                return false;
            }
        }
    </script>
</head>

<div class="container">
  <h2>Quản lý xã phường</h2>       
  <table class="table table-striped">
    <thead>
      <tr>
        <td colspan="6" align="center"><a href="<?php echo base_url(); ?>index.php/admin/xa/add">Thêm xã</a></td>
      </tr>
      <tr>
        <th>Tên tỉnh</th>
        <th>Tên huyện</th>
        <th>Mã xã</th>
        <th>Tên xã</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $stt=0;
            foreach($info as $item){
                $stt++;
                echo "<tr>";
                    //echo "<td>$stt</td>";
                    echo "<td>$item[T_MA]</td>";
                    echo "<td>$item[H_MA]</td>";
                    echo "<td>$item[X_MA]</td>";
                    echo "<td>$item[X_TEN]</td>";
                    echo "<td><a href=".base_url()."index.php/admin/xa/edit/$item[T_MA]/$item[H_MA]/$item[X_MA]>Sửa</a></td>";
                    echo "<td><a href=".base_url()."index.php/admin/xa/delete/$item[T_MA]/$item[H_MA]/$item[X_MA]  onclick='return xacnhan();'>Xóa</a></td>";
                echo "</tr>";
                     
            }
        ?>
    </tbody>
    <tr><td>Tổng: <?php echo $total." Trang: ".$linkpage; ?></td></tr>
  </table>
</div>