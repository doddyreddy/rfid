<!DOCTYPE html>
<html>
<head>
<?php echo '<title>'.$title.'</title>'.$meta_scripts.$css_scripts; ?>
<style>

</style>
</head>

<body>
<?php echo $navbar_scripts; ?>

<div class="container-fluid">
<h1 style="text-align: center;">SMS Threads</h1>
  <div class="row">
    <div class="col-sm-12">
      <?php echo form_open("tables/sms/threads_list",'id="sms_list_form" class="form-inline"'); ?>
      <input type="hidden" name="sent_by_id" value="<?php echo $teacher_data->id; ?>">
      <input type="hidden" name="sent_by_table" value="teachers">
      <div class="form-group">
        <label>Date From:</label>
        <input type="text" name="date_from" class="form-control" id="datepicker_from" value="<?php echo date("m/d/Y");?>" readonly>
      </div>
      <div class="form-group">
        <label>Date To:</label>
        <input type="text" name="date_to" class="form-control" id="datepicker_to" value="<?php echo date("m/d/Y");?>" readonly>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" form="sms_list_form"><span class="glyphicon glyphicon-search"></span> Search</button>
      </div>
      </form>
      <div class="table-responsive">
        <table class="table table-hover" id="sms_threads_table">
          <thead>
            <tr>
              <th>Message ID:</th>
              <th>Messages:</th>
              <th>Date</th>
              <th>Time</th>
              <th>Sender</th>
              <th>Sender</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<?php echo $modaljs_scripts; ?>

<?php echo $js_scripts; ?>
<script>
$(document).ready(function() {
  $(document).on("click",".message",function(e) {
    var id = $(this).attr("id");
    $.ajax({
      type: "GET",
      data: "sms_id="+id,
      url: "<?php echo base_url("sms_ajax/get_data"); ?>",
      cache: false,
      dataType: "json",
      success: function(data) {
        $("#sms-list-modal").modal("show");
        $("#message_id_txt").html(id);
          $('.sms_list_table tbody').html("");

        $.each(data, function(i, item) {
            $('.sms_list_table tbody').append('\
              <tr>\
              <td>'+data[i].message+'</td>\
              <td>'+data[i].mobile_number+'</td>\
              <td>'+data[i].ref_table+'</td>\
              <td>'+data[i].recipient+'</td>\
              <td>'+data[i].status+'</td>\
              </tr>\
              ');
        });
      },
      error: function(e) {
        console.log(e);
      }
    });
  });

  $(document).on("submit","#sms_list_form",function(e) {
    e.preventDefault();
    show_sms_threads();
  });

  var needToConfirm = false;
  $(document).on("click",".resend_sms",function(e) {
    var dataStr = "<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>"+"&id="+e.target.id;
    $.ajax({
      type: "POST",
      url: "<?php echo base_url("sms_ajax/resend");?>",
      data: dataStr,
      cache: false,
      dataType: "json",
      beforeSend: function() {
        needToConfirm = true;
      },
      success: function(data) {
        if(data.is_success){
          alertify.success("You have successfully resent the message.");
        }else{
          alertify.error("Please Check the message status.");
        }
          show_sms_threads();
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        needToConfirm = false;
      }
    });
  });

  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    if (needToConfirm)
      return "sdasdasdasd";
  }
  $(document).on("click",".paging",function(e) {
    show_sms_threads(e.target.id);
  });

  show_sms_threads();
  function show_sms_threads(page=1) {
    $.ajax({
      type: "GET",
      url: $("#sms_list_form").attr("action"),
      data: $("#sms_list_form").serialize()+"&page="+page,
      cache: false,
      success: function(data) {
        // alert(data);
        $("#sms_threads_table tbody").html(data);
      },
      error: function(e) {
        console.log(e);
      }
    });
  }
});
</script>
</body>
</html>