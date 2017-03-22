<!DOCTYPE html>
<html>
<head>
<?php echo '<title>'.$title.'</title>'.$meta_scripts.$css_scripts; ?>
<style>

</style>
</head>

<?php echo $navbar_scripts; ?>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="table-header" colspan="20">My Students</th>
						</tr>
						<tr>
							<th>Name</th>
							<th>Remaining Load Credits</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($students_list["result"] as $student_data) {
								echo '
								<tr>
									<td>'.$student_data->last_name.", ".$student_data->first_name." ".$student_data->middle_name[0].". ".$student_data->suffix.'</td>
									<td style="text-align:right">'.number_format($student_data->rfid_data->load_credits,2).'</td>
									<td style="text-align:right"><a href="#" class="view_gate_logs" id="'.$student_data->id.'" title="Gate Logs of '.$student_data->last_name.", ".$student_data->first_name." ".$student_data->middle_name[0].". ".$student_data->suffix.'">View Gate Logs</a></td>
									<td style="text-align:right"><a href="#" class="view-purchases" id="'.$student_data->id.'" title="Purchases of '.$student_data->last_name.", ".$student_data->first_name." ".$student_data->middle_name[0].". ".$student_data->suffix.'">View Purchases</a></td>
								</tr>
								';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<?php echo $modaljs_scripts; ?>
<!-- Alert Modal -->
<div id="view_gate_logs-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="view_gate_logs-modal-title">Gate Logs</h4>
      </div>
      <div class="modal-body">
      	<?php echo form_open("tables/gate_logs",'id="view_gate_logs-form"'); ?>
      	<input type="hidden" name="ref_id">
      	<input type="hidden" name="ref_table" value="students">
      	<input type="hidden" name="for_guardian" value="true">
      	<label>Date:</label>
      	<input id="datepicker_from" type="text" name="date_from" placeholder="Pick a Date From" readonly>
      	<label> - </label>
      	<input id="datepicker_to" type="text" name="date_to" placeholder="Pick a Date To" readonly>
      		
      	</form>
        <div class="table-responsive">
	        <table class="table table-hover" id="gatelogs-table">
	        	<thead>
	        		<tr>
	        			<th>Type</th>
	        			<th>Date</th>
	        			<th>Time</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        	</tbody>
	        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php echo $js_scripts; ?>
<script>
$(document).on("click",".view_gate_logs",function(e) {
	$("#view_gate_logs-modal").modal("show");
	$("#view_gate_logs-modal-title").html(e.target.title);
	$('input[name="ref_id"]').val(e.target.id);
	show_gatelogs();
});

$(document).on("click",".paging",function(e) {
	show_gatelogs(e.target.id);
});

$(document).on("submit","#view_gate_logs-form",function(e) {
	e.preventDefault();
	show_gatelogs();
});

$(document).on("change","#datepicker_from,#datepicker_to",function(e) {
	show_gatelogs();
});
function show_gatelogs(page=1) {
	$.ajax({
		type: "POST",
		url: $("#view_gate_logs-form").attr("action"),
		data: $("#view_gate_logs-form").serialize()+"&page="+page,
		cache: false,
		success: function(data) {
			// alert(data);
			// console.log(data);
			$("#gatelogs-table tbody").html(data);
		}
	});
}

</script>
</body>
</html>