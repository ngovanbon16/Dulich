<head>
<script src="<?php echo base_url('media/js/jquery-1.11.3.min.js') ?>" type="text/javascript"></script>
<script language="javascript">
 // $(document).ready(function(){
          function load()
          {
          var ho = $("#ND_HO").val();
          var ten = $("#ND_TEN").val();
          var email = $("#ND_DIACHIMAIL").val();
          var matkhau = $("#ND_MATKHAU").val();
          var matkhau1 = $("#ND_MATKHAU1").val();
          $.ajax({
             type : "POST",
             url  : "<?php echo site_url('admin/dangky/add'); ?>",
             data : "ho=" + ho + "&ten=" + ten  + "&email=" + email + "&matkhau=" + matkhau + "&matkhau1=" + matkhau1,
             success: function(data){
                  if(data == "1")
                  {
                    alert ("Thêm thành công!");
                    window.location="<?php echo base_url(); ?>index.php/admin/dangky";
                  }
                  $("#data").html(data);
             }
          });
  };
//  });
</script>
</head>
<table width='650px' align='center' class="table table-striped">
<tr>
<td>
<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/dangky/add" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Họ</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="ND_HO" name="ND_HO" placeholder="Họ người dùng" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Tên</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="ND_TEN" name="ND_TEN" placeholder="Tên người dùng" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="ND_DIACHIMAIL" name="ND_DIACHIMAIL" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="ND_MATKHAU" name="ND_MATKHAU" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="ND_MATKHAU1" name="ND_MATKHAU1" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" id="OK" onclick="load()" class="btn btn-default">Lưu</button>
    </div>
  </div>
  <div class="form-group"> 
    <b>
      <div class="col-sm-10" id='data' align='center'>
          
      </div>
    </b>
  </div>
</form>
</td>
</tr>
</table>