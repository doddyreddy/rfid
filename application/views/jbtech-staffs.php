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
    <h1 style="text-align: center;">Non-Teaching Staffs</h1>
      <?php echo form_open("tables/staffs/list/jbtech",'id="staff-list-form"');?>
      <label>Search Last Name</label>
      <select class="ui search dropdown" name="owner_id" id="select_staff">
        <option value="">Select Staff's Last Name</option>
      </select>
      <button class="btn btn-primary" type="submit">Search</button>
      <button class="btn btn-danger" type="button" id="reset">Reset</button>
      </form>
      <table class="table table-hover" id="staff-list-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Contact Number</th>
            <th>Position</th>
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

<!--Edit staff Modal -->
<div id="staff_edit_modal" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">staff Data</h4>
      </div>
      <div class="modal-body">
        <p>
        <form class="form-horizontal">
          <div id="display-photo-container">
            <img class="img-responsive" id="display-photo" src="'.base_url("assets/images/empty.jpg").'">
          </div>
          <div class="form-group">
              <label class="col-sm-4">ID</label>
              <div class="input-group col-sm-7">
                <input id="id" type="text" class="form-control" name="id" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#id" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Full Name</label>
              <div class="input-group col-sm-7">
                <input id="full_name" type="text" class="form-control" name="full_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#full_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

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
              <label class="col-sm-4">Position</label>
              <div class="input-group col-sm-7">
                <input id="position" type="text" class="form-control" name="position" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#position" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
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
              <label class="col-sm-4">Blood Type</label>
              <div class="input-group col-sm-7">
                <input id="blood_type" type="text" class="form-control" name="blood_type" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#blood_type" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">In Case of Emergency</label>
              <div class="input-group col-sm-7">
                <input id="in_case_name" type="text" class="form-control" name="in_case_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#in_case_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">Contact Number</label>
              <div class="input-group col-sm-7">
                <input id="in_case_contact_number" type="text" class="form-control" name="in_case_contact_number" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#in_case_contact_number" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">Address</label>
              <div class="input-group col-sm-7">
                <input id="in_case_address" type="text" class="form-control" name="in_case_address" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#in_case_address" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
           <!--
          <div class="form-group">
              <label class="col-sm-4">fathers_name</label>
              <div class="input-group col-sm-7">
                <input id="fathers_name" type="text" class="form-control" name="fathers_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#fathers_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">mothers_name</label>
              <div class="input-group col-sm-7">
                <input id="mothers_name" type="text" class="form-control" name="mothers_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#mothers_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">guardian_name</label>
              <div class="input-group col-sm-7">
                <input id="guardian_name" type="text" class="form-control" name="guardian_name" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#guardian_name" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">guardian_address</label>
              <div class="input-group col-sm-7">
                <input id="guardian_address" type="text" class="form-control" name="guardian_address" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#guardian_address" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">guardian_contact_number</label>
              <div class="input-group col-sm-7">
                <input id="guardian_contact_number" type="text" class="form-control" name="guardian_contact_number" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#guardian_contact_number" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          
          <div class="form-group">
              <label class="col-sm-4">class_adviser</label>
              <div class="input-group col-sm-7">
                <input id="class_adviser" type="text" class="form-control" name="class_adviser" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#class_adviser" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          -->

          <div class="form-group">
              <label class="col-sm-4">sss</label>
              <div class="input-group col-sm-7">
                <input id="sss" type="text" class="form-control" name="sss" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#sss" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">philhealth</label>
              <div class="input-group col-sm-7">
                <input id="philhealth" type="text" class="form-control" name="philhealth" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#philhealth" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">pagibig</label>
              <div class="input-group col-sm-7">
                <input id="pagibig" type="text" class="form-control" name="pagibig" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#pagibig" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">tin</label>
              <div class="input-group col-sm-7">
                <input id="tin" type="text" class="form-control" name="tin" readonly>
                <span class="input-group-addon btn btn-default" data-clipboard-target="#tin" data-balloon="Copy to clipboard" data-balloon-pos="down"><i class="fa fa-files-o" aria-hidden="true"></i></span>
              </div>
          </div>



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


$(document).on("click",".paging",function(e) {
  show_staff_list(e.target.id);
});

$(document).ready(function() {
  

  $(document).on("submit","#staff-list-form",function(e) {
    e.preventDefault();
    $('input[name="owner_id"]').removeAttr('value');
    show_staff_list();
  });

  $(document).on("change",'input[name="has_rfid"]',function(e) {
    show_staff_list();
  });

  $(document).on("click",".view_staff",function(e) {
    var id = e.target.id;
    show_staff_data(id);  
  });


  $('#select_staff').dropdown("clear");
  $('#select_staff').html("");
  $('#select_staff').append('<option value="">Select a Class</option>');
  $.ajax({
    type: "GET",
    url: "<?php echo base_url("staff_ajax/get_list/jbtech"); ?>",
    data: "get=1",
    cache: false,
    dataType: "json",
    success: function(data) {
      $.each(data, function(i, item) {
          $('#select_staff').append('<option value="'+data[i].id+'">'+data[i].full_name+'</option>');
      });
    }
  });


  $(document).on("click","#reset",function(e) {
    $(".ui").dropdown("clear");
    show_staff_list();
  });


  show_staff_list();
  function show_staff_list(page='1',clear=false) {

    var datastr = $("#staff-list-form").serialize();
    $.ajax({
      type: "GET",
      url: $("#staff-list-form").attr("action"),
      data: datastr+"&page="+page,
      cache: false,
      success: function(data) {
        if(clear){
          $("#search_last_name").val("");
        }
        $("#staff-list-table tbody").html(data);
      }
    });
  }

  function show_staff_data(id) {
    $.ajax({
      type: "GET",
      url: "<?php echo base_url("staff_ajax/get_data/jbtech"); ?>",
      data: "staff_id="+id,
      cache: false,
      dataType: "json",
      success: function(data) {
        // console.log(data);
        $("#display-photo").attr("src","<?php echo base_url("assets/images/staff_photo/");?>"+data.display_photo);
        $('#id').val(data.id);
        $('#last_name').val(data.last_name);
        $('#age').val(data.age);
        $('#full_name').val(data.full_name);
        $('#first_name').val(data.Firstst_name);
        $('#in_case_name').val(data.in_case_name);
        $('#in_case_contact_number').val(data.in_case_contact_number);
        $('#position').val(data.position);
        $('#suffix').val(data.suffix);
        $('#gender').val(data.gender);
        $('#birthday').val(data.birthday);
        $('#contact_number').val(data.contact_number);
        $('#address').val(data.address);
        $('#in_case_address').val(data.in_case_address);
        $('#blood_type').val(data.blood_type);
        $('#sss').val(data.sss);
        $('#philhealth').val(data.philhealth);
        $('#pagibig').val(data.pagibig);
        $('#tin').val(data.tin);
        // $('#guardian_name').val(data.guardian_name);
        // $('#guardian_address').val(data.guardian_address);
        // $('#guardian_contact_number').val(data.guardian_contact_number);
        // $('#fathers_name').val(data.fathers_name);
        // $('#mothers_name').val(data.mothers_name);
        $('#class_name').val(data.class_name);
        $('#grade').val(data.grade);
        // $('#class_adviser').val(data.class_adviser);
        if(data.guardian_id!=""){
          $('#edit-guardian_id').dropdown('set value',data.guardian_id);
        }else{
          $('#edit-guardian_id').dropdown('clear');
        }
        if(data.class_id!=""){
          $('#edit-class_id').dropdown('set value',data.class_id);
        }else{
          $('#edit-class_id').dropdown('clear');
        }
        $("#staff_edit_modal").modal("show");
      }
    });
  }
});
</script>
</body>
</html>