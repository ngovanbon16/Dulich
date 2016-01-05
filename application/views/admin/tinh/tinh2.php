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

<?php                 
    $page_num = (int)$this->uri->segment(5);
    if($page_num==0) $page_num=1;
    $order_seg = $this->uri->segment(7,"asc"); 
    if($order_seg == "asc") $order = "desc"; else $order = "asc";
?>

<div class="container">
  <h2>Quản lý tỉnh thành</h2>       
  <table class="table table-striped">
    <thead>
      <tr>
        <td colspan="6" align="center"><a href="<?php echo base_url(); ?>index.php/admin/tinh/tinh/add">Thêm tỉnh</a></td>
      </tr>
      <tr>
        <th><b><a href="<?php echo base_url();?>index.php/admin/tinh/tinh/index/<?=$page_num?>/T_MA/<?=$order?>">Mã</a></b></th>
        <th><b><a href="<?php echo base_url();?>index.php/admin/tinh/tinh/index/<?=$page_num?>/T_TEN/<?=$order?>">Tên</a></b></th>
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
                    echo "<td><a href=".base_url()."index.php/admin/tinh/tinh/edit/$item[T_MA]>Sửa</a></td>";
                    echo "<td><a href=".base_url()."index.php/admin/tinh/tinh/delete/$item[T_MA] onclick='return xacnhan();'>Xóa</a></td>";
                echo "</tr>";    
            }
        ?>
    </tbody>
    <tr><td><?php echo $linkpage; ?></td></tr>
  </table>
</div>