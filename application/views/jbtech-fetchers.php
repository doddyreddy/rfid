<!DOCTYPE html>
<html>
<head>
<?php echo '<title>'.$title.'</title>'.$meta_scripts.$css_scripts; ?>
<style>
#display-photo-container{
  height: 10em;
  margin-bottom: 10px;
}
</style>
</head>

<body>
<?php echo $navbar_scripts; ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
    <?php echo form_open("tables/fetchers/list/jbtech",'id="fetcher-list-form"');?>
    
    </form>
      <h1 style="text-align: center;">Fetchers</h1>
      <table class="table table-hover" id="fetcher-list-table">
        <thead>
          <tr>
            <th style="text-align:center;">ID</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>

</div>
<?php echo $modaljs_scripts;
echo '

<!--Edit fetcher Modal -->
<div id="fetcher_edit_modal" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">fetcher Data</h4>
      </div>
      <div class="modal-body">
        <p>
        <form class="form-horizontal">
        <div id="display-photo-container">
          <img class="img-responsive" id="display-photo" src="'.base_url("assets/images/empty.jpg").'">
        </div>

          <!--
          <div class="form-group">
              <label class="col-sm-4">LRN Number</label>
              <div class="input-group col-sm-7">
                <input id="lrn_number" type="text" class="form-control" name="lrn_number" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#lrn_number" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          -->
          <div class="form-group">
              <label class="col-sm-4">ID</label>
              <div class="input-group col-sm-7">
                <input id="id" type="text" class="form-control" name="id" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#id" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Student Name</label>
              <div class="input-group col-sm-7">
                <input id="full_name" type="text" class="form-control" name="full_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#full_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <!--
          <div class="form-group">
              <label class="col-sm-4">Last Name</label>
              <div class="input-group col-sm-7">
                <input id="last_name" type="text" class="form-control" name="last_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#last_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">First Name</label>
              <div class="input-group col-sm-7">
                <input id="first_name" type="text" class="form-control" name="first_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#first_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Middle Name</label>
              <div class="input-group col-sm-7">
                <input id="middle_name" type="text" class="form-control" name="middle_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#middle_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Suffix</label>
              <div class="input-group col-sm-7">
                <input id="suffix" type="text" class="form-control" name="suffix" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#suffix" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Gender</label>
              <div class="input-group col-sm-7">
                <input id="gender" type="text" class="form-control" name="gender" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#gender" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Birthdate</label>
              <div class="input-group col-sm-7">
                <input id="birthday" type="text" class="form-control" name="birthday" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#birthday" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Age</label>
              <div class="input-group col-sm-7">
                <input id="age" type="text" class="form-control" name="age" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#age" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Contact Number</label>
              <div class="input-group col-sm-7">
                <input id="contact_number" type="text" class="form-control" name="contact_number" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#contact_number" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">Address</label>
              <div class="input-group col-sm-7">
                <input id="address" type="text" class="form-control" name="address" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#address" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Father&apos;s Name</label>
              <div class="input-group col-sm-7">
                <input id="fathers_name" type="text" class="form-control" name="fathers_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#fathers_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">Mother&apos;s Name</label>
              <div class="input-group col-sm-7">
                <input id="mothers_name" type="text" class="form-control" name="mothers_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#mothers_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Guardian&apos;s Name</label>
              <div class="input-group col-sm-7">
                <input id="guardian_name" type="text" class="form-control" name="guardian_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#guardian_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">Guardian Address</label>
              <div class="input-group col-sm-7">
                <input id="guardian_address" type="text" class="form-control" name="guardian_address" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#guardian_address" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">Guardian Contact Number</label>
              <div class="input-group col-sm-7">
                <input id="guardian_contact_number" type="text" class="form-control" name="guardian_contact_number" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#guardian_contact_number" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          -->
          <div class="form-group">
              <label class="col-sm-4">Class</label>
              <div class="input-group col-sm-7">
                <input id="class_name" type="text" class="form-control" name="class_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#class_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Grade or Year</label>
              <div class="input-group col-sm-7">
                <input id="grade" type="text" class="form-control" name="grade" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#grade" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <!--
          <div class="form-group">
              <label class="col-sm-4">Class Adviser</label>
              <div class="input-group col-sm-7">
                <input id="class_adviser" type="text" class="form-control" name="class_adviser" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#class_adviser" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          -->



        </form>
        </p>
      </div>
      <div class="modal-footer">
      <p class="help-block"></p>
        <button type="button" class="btn btn-default no-notif" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

';

?>





<?php echo $js_scripts; ?>
<script>
var clipboard = new Clipboard('.btn');
clipboard.on('success', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);
    e.clearSelection();
});
clipboard.on('error', function(e) {
    console.error('Action:', e.action);
    console.error('Trigger:', e.trigger);
});
$(document).ready(function() {
  $(document).on("click",".paging",function(e) {
    show_fetcher_list(e.target.id);
  });
  $(document).on("submit","#fetcher-list-form",function(e) {
    e.preventDefault();
    $('input[name="owner_id"]').removeAttr('value');
    show_fetcher_list();
  });
  $(document).on("change",'input[name="has_rfid"]',function(e) {
    show_fetcher_list();
  });
  $(document).on("click",".view_fetcher",function(e) {
    var id = e.target.id;
    show_fetcher_data(id);  
  });
  $(document).on("change",'#select_class',function(e) {
    // show_gatelogs();
    $('#select_fetcher').dropdown("clear");
    $('#select_fetcher').html("");
    $('#select_fetcher').append('<option value="">Select a Class</option>');
    var datastr = "class_id="+e.target.value;
    $.ajax({
      type: "GET",
      url: "<?php echo base_url("fetcher_ajax/get_list/jbtech"); ?>",
      data: datastr,
      cache: false,
      dataType: "json",
      success: function(data) {
        $.each(data, function(i, item) {
            $('#select_fetcher').append('<option value="'+data[i].id+'">'+data[i].full_name+'</option>');
        });
      }
    });
  });
  $('#select_fetcher').dropdown("clear");
  $('#select_fetcher').html("");
  $('#select_fetcher').append('<option value="">Select a Class</option>');
  $.ajax({
    type: "GET",
    url: "<?php echo base_url("fetcher_ajax/get_list/jbtech"); ?>",
    data: "get=1",
    cache: false,
    dataType: "json",
    success: function(data) {
      $.each(data, function(i, item) {
          $('#select_fetcher').append('<option value="'+data[i].id+'">'+data[i].full_name+'</option>');
      });
    }
  });
  $(document).on("click","#reset",function(e) {
    $(".ui").dropdown("clear");
    show_fetcher_list();
  });
  show_fetcher_list();
  function show_fetcher_list(page='1',clear=false) {

    var datastr = $("#fetcher-list-form").serialize();
    $.ajax({
      type: "GET",
      url: $("#fetcher-list-form").attr("action"),
      data: datastr+"&page="+page,
      cache: false,
      success: function(data) {
        if(clear){
          $("#search_last_name").val("");
        }
        $("#fetcher-list-table tbody").html(data);
      }
    });
  }
  function show_fetcher_data(id) {
    $.ajax({
      type: "GET",
      url: "<?php echo base_url("fetcher_ajax/get_data/jbtech"); ?>",
      data: "fetcher_id="+id,
      cache: false,
      dataType: "json",
      success: function(data) {
        $("#display-photo").attr("src","<?php echo base_url("assets/images/student_photo/");?>"+data.display_photo);
        $('#id').val(data.id_string);
        // $('#last_name').val(data.last_name);
        // $('#lrn_number').val(data.lrn_number);
        // $('#age').val(data.age);
        $('#full_name').val(data.full_name);
        // $('#first_name').val(data.first_name);
        // $('#middle_name').val(data.middle_name);
        // $('#suffix').val(data.suffix);
        // $('#gender').val(data.gender);
        // $('#birthday').val(data.birthday);
        // $('#contact_number').val(data.contact_number);
        // $('#address').val(data.address);
        // $('#guardian_name').val(data.guardian_name);
        // $('#guardian_address').val(data.guardian_address);
        // $('#guardian_contact_number').val(data.guardian_contact_number);
        // $('#fathers_name').val(data.fathers_name);
        // $('#mothers_name').val(data.mothers_name);
        $('#class_name').val(data.class_name);
        $('#grade').val(data.grade);
        // $('#class_adviser').val(data.class_adviser);
        // if(data.guardian_id!=""){
          // $('#edit-guardian_id').dropdown('set value',data.guardian_id);
        // }else{
          // $('#edit-guardian_id').dropdown('clear');
        // }
        // if(data.class_id!=""){
          // $('#edit-class_id').dropdown('set value',data.class_id);
        // }else{
          // $('#edit-class_id').dropdown('clear');
        // }
        $("#fetcher_edit_modal").modal("show");
      }
    });
  }
});
</script>
</body>
</html>