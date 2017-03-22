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
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
				<h1 style="text-align: center;">
					Gate Logs
				</h1>
				<?php echo form_open("tables/gate_logs", 'id="gate_logs-form"'); ?>
				<span class="btn btn-danger" id="gate_logs-reset_search">Reset</span>
				<input type="hidden" name="ref_id">
				<select name="ref_table" id="ref_table">
					<option value="students">Students</option>
					<option value="teachers">Teachers</option>
				</select>
				<label>Last Name:</label>
				<input type="text" name="search_last_name" id="search_last_name">
				<label>Date From:</label>
				<input type="text" name="date_from" id="datepicker_from" readonly>
				<label>Date To:</label>
				<input type="text" name="date_to" id="datepicker_to" readonly>
				<!-- <button type="submit" class="btn btn-primary" form="gate_logs-form">Search</button> -->
				</form>
				<table class="table table-hover" id="gatelogs-table">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>RFID</th>
							<th>Date</th>
							<th>Time</th>
							<th>Type</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>

</div>
<?php echo $modaljs_scripts; ?>
<?php echo $js_scripts; ?>
<script>
$(document).on("submit","#gate_logs-form",function(e) {
	// e.preventDefault();
	$('input[name="ref_id"]').val("");
	show_gatelogs();
});
$(document).on("click",".gate_logs",function(e) {
	$('input[name="ref_id"]').val(e.target.id);
	show_gatelogs();
});


$("#search_last_name").autocomplete({
	source: function(request, response) {
	    $.ajax({
	        url: "<?php echo base_url("search/students/gate_logs"); ?>",
	        dataType: "json",
	        data: {
	            term : request.term,
	            ref_table : $("#ref_table").val()
	        },
	        success: function(data) {
	            response(data);
	        }
	    });
	},
	select: function(event, ui){
			$('input[name="ref_id"]').val(ui.item.data);
			show_gatelogs();
	}
});

$(document).on("change","#ref_table",function(e) {
	$('input[name="ref_id"]').val("");
	show_gatelogs();
});
$(document).on("change","#datepicker_from,#datepicker_to",function(e) {
	show_gatelogs();
});
$(document).on("click","#gate_logs-reset_search",function(e) {
	$('input[name="ref_id"]').val("");
	$("#search_last_name").val("");
	$("#datepicker_from").val("");
	$("#datepicker_to").val("");
	show_gatelogs();
});


show_gatelogs();
function show_gatelogs(page=1) {
	var data_str = $("#gate_logs-form").serialize();
	$.ajax({
		type: "POST",
		url: $("#gate_logs-form").attr("action"),
		data: data_str+"&page="+page,
		cache: false,
		success: function(data) {
			$("#gatelogs-table tbody").html(data);
			$("#search_last_name").val("");
			
		}
	});
}
</script>
</body>
</html>