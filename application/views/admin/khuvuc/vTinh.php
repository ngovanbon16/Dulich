<div class="container">
  <h2>Quản lý tỉnh thành</h2>  
  <a href="<?php echo base_url(); ?>index.php/admin/khuvuc/tinh/add">Thêm tỉnh</a>  
  <br>       
  <table class="table">
    <thead>
      <tr>
        <th>Mã tỉnh</th>
        <th>Tên tỉnh</th>
        <th>Chọn</th>
      </tr>
    </thead>
    <tbody>
        <?php
        foreach($query as $row)
        {
            echo "<tr>";
            echo "<td>";
            echo $row->T_MA;
            echo "</td><td>";
            echo $row->T_TEN;
            echo "</td><td>";
            echo "<a href='".base_url('index.php/admin/khuvuc/tinh/edit').'/'.$row->T_MA."'>Sửa</a> <a href='".base_url('index.php/admin/khuvuc/tinh/delete').'/'.$row->T_MA."'>Xóa</a>";
            echo "</td>";
            echo "</tr>";
         }
         echo "</tbody>";
         echo "</table>";
        ?>
    </tbody>
  </table>
</div>