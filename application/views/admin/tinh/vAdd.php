<table width='600px' align='center'>
<tr>
<td>
<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/tinh/add" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Mã tỉnh:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="T_MA">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Tên tỉnh:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" name="T_TEN">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Thêm</button>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <?php
        echo "<div class='mess_error'>";
        echo "<ul>";
            if(validation_errors() != ''){
                echo "<li>".validation_errors()."</li>";
            }
        echo "</ul>";
        echo "</div>";
        ?>
    </div>
  </div>
</form>
</td>
</tr>
</table>