<table width='650px' align='center' class="table table-striped">
<tr>
<td>
<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/huyen/edit/<?php echo $info['T_MA'].'/'.$info['H_MA']; ?>" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Mã tỉnh:</label>
    <div class="col-sm-10">       
        <select class="form-control" name="T_MA">
          <option value="<?php echo $info['T_MA']; ?>"><?php echo $info['T_MA']; ?></option>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Mã huyện:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="H_MA" value="<?php echo $info['H_MA']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Tên huyện:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" name="H_TEN" value="<?php echo $info['H_TEN']; ?>">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Lưu</button>
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