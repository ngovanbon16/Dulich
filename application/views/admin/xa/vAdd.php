<head>
<script src="<?php echo base_url('media/js/jquery-1.11.3.min.js') ?>" type="text/javascript"></script>
<script>
  $(document).ready(function(){
          $("#matinh").change(function(){
          var matinh = $("#matinh").val();
          $.ajax({
             type : "POST",
             url  : "<?php echo site_url('admin/xa/gethuyen'); ?>",
             data : "matinh=" + matinh,
             success: function(data){
                   $("#data").html(data);
             }
          });
  });
  });
</script>
</head>
<table width='650px' align='center'>
<tr>
<td>
<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/xa/add" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Tên tỉnh:</label>
    <div class="col-sm-10">       
        <select class="form-control" name="T_MA" id='matinh'>
            <option value=''>--Chọn tỉnh--</option>
            <?php
                foreach($info as $item)
                {
                    echo "<option value='$item[T_MA]'>$item[T_TEN]</option>";
                }
            ?>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Tên huyện:</label>
    <div class="col-sm-10" id='data'>       
        <select class="form-control" name="H_MA">
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Mã xa:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="X_MA" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Tên xã:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" name="X_TEN" />
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