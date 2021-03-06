$(document).ready(function(e) {
  $('input[name="rfid"]').click(function(e) {
    $(this).val("");
  });
  $("#change_school_name").click(function(e) {
    $("#change_school_name_modal").modal("show");
  });
  $(document).on("submit","#change_school_name_form",function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#change_school_name_form").attr("action"),
      data: $("#change_school_name_form").serialize(),
      cache: false,
      dataType: "json",
      success: function(data) {
        
      }
    });
  });
  $(document).on("submit", "#rfid_scan_add_load_credit_form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#rfid_scan_add_load_credit_form").attr("action"),
      data: $("#rfid_scan_add_load_credit_form :input").serialize(),
      cache: false,
      dataType: "json",
      success: function(data) {
        $("#rfid_scan_add_load_credit_form")[0].reset();
        if (data.is_valid) {
          $("#rfid_scan_add_load_credits_modal").modal("hide");
          $('input[name="rfid_id"]').val(data.rfid_data.id);
          $("#add_load_credits_display-photo").attr("src", data.display_photo);
          $("#add_load_credits_full_name").html(data.full_name);
          $("#add_load_credits_remaining_load").html(data.rfid_data.load_credits);
          $("#add_load_credits_data_modal").modal("show");
          $("#rfid_scan_add_load_credits_form")[0].reset();
          $(".help-block").html("");
        } else {
          $('#rfid_scan_add_load_credits_help-block').html("RFID is invalid or available.");
        }
      },
      error: function(e) {
        console.log(e);
      }
    });
  });
  $('input[name="rfid"]').click(function(e) {
    $(this).val("");
  });
  $(document).on("change","#login-select-type",function(e) {
    window.location = base_url+e.target.value;
  });
  $(document).on("submit", "#rfid_scan_add_load_credit_form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#rfid_scan_add_load_credit_form").attr("action"),
      data: $("#rfid_scan_add_load_credit_form :input").serialize(),
      cache: false,
      dataType: "json",
      success: function(data) {
        $("#rfid_scan_add_load_credit_form")[0].reset();
        if (data.is_valid) {
          $("#rfid_scan_add_load_credits_modal").modal("hide");
          $('input[name="rfid_id"]').val(data.rfid_data.id);
          $("#add_load_credits_display-photo").attr("src", data.display_photo);
          $("#add_load_credits_full_name").html(data.full_name);
          $("#add_load_credits_remaining_load").html(data.rfid_data.load_credits);
          $("#add_load_credits_data_modal").modal("show");
          $("#rfid_scan_add_load_credits_form")[0].reset();
          $(".help-block").html("");
        } else {
          $('#rfid_scan_add_load_credits_help-block').html("RFID is invalid or available.");
        }
      }
    });
  });
  $(document).on("click", "#rfid_add_load_credits", function(e) {
    $("#rfid_scan_add_load_credits_modal").modal("show");
  });
  $(document).on("submit", "#add_load_credits_form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#add_load_credits_form").attr("action"),
      data: $("#add_load_credits_form").serialize(),
      cache: false,
      dataType: "json",
      success: function(data) {
        $("#add_load_credits_form")[0].reset();
        $("#add_load_credits_data_modal").modal("hide");
        alertify.success("You have successfully added a load a student's load credits.");
      },
      error: function(e) {
        console.log(e);
      }
    });
  });
  $(document).on("click", "#register_guardian", function(e) {
    $("#register_guardian_modal").modal("show");
    $('input[name="auto"]').val("0");
  });
  $(document).on("click", "#add_guardian,#student_add_guardian", function(e) {
    $('input[name="auto"]').val("1");
    $("#register_guardian_modal").modal("show");
  });
  $(document).on("click", ".change_password", function(e) {
    var type = e.target.id;
    $("#change_password_type").val(type);
    $("#change_password-modal").modal("show");
  });
  $(document).on("submit", "#change_password-form", function(e) {
    e.preventDefault();
    $('button[form="change_password-form"]').prop('disabled', true);
    $.ajax({
      type: "POST",
      url: $("#change_password-form").attr("action"),
      data: $("#change_password-form").serialize(),
      dataType: "json",
      cache: false,
      success: function(data) {
        $('button[form="change_password-form"]').prop('disabled', false);
        if (data.is_valid) {
          $(".help-block").html("");
          $("#change_password-modal").modal("hide");
          alertify.success("You have successfully changed your password.");
        } else {
          $("#current_password_help-block").html(data.current_password_error);
          $("#new_password_help-block").html(data.new_password_error);
          $("#confirm_password_help-block").html(data.confirm_password_error);
        }
      },
      error: function(e) {
        console.log(e);
      }
    });
  });
  $('#add_guardian_last_name,#add_guardian_middle_name,#add_guardian_first_name').keyup(function() {
    let guardian_name = $('#add_guardian_last_name').val() + " " + $('#add_guardian_first_name').val() + " " + $('#add_guardian_middle_name').val();
    $('#add_guardian_name').val(guardian_name);
  });
  $(document).on("submit", "#register_guardian_form", function(e) {
    e.preventDefault();
    $("button[form='register_guardian_form']").prop('disabled', true);
    $.ajax({
      type: "POST",
      url: $("#register_guardian_form").attr("action"),
      data: $("#register_guardian_form").serialize(),
      cache: false,
      dataType: "json",
      success: function(data) {
        $("button[form='register_guardian_form']").prop('disabled', false);
        $("#add_guardian_address_help-block").html(data.guardian_address_error);
        $("#add_guardian_last_name_help-block").html(data.guardian_last_name_error);
        $("#add_guardian_middle_name_help-block").html(data.guardian_middle_name_error);
        $("#add_guardian_first_name_help-block").html(data.guardian_first_name_error);
        $("#add_guardian_name_help-block").html(data.guardian_name_error);
        $("#add_email_address_help-block").html(data.email_address_error);
        $("#add_contact_number_help-block").html(data.contact_number_error);
        $("#add_subscription_help-block").html(data.subscription_error);
        if (data.is_valid) {          
          $("#register_guardian_form")[0].reset();
          $(".help-block").html("");
          $("#register_guardian_modal").modal("hide");
          update_select_options("guardian_id", base_url);
          if(data.sms_code != 0){
            alertify.success("You have successfully registered a guardian."); 
            var msg = alertify.notify('The Password was not been sent to <b>'+data.contact_number+'</b>.<br>Click this message to view the error.', 'error', 10);
            msg.callback = function (isClicked) {
              if(isClicked){
                alertify.alert('SMS Failed',data.sms_status);
              }
            };
          }else{
            alertify.success("You have successfully registered a guardian.<br>The Password has been sent to <b>"+data.contact_number+"</b>"); 
          }
        } else {
          $("#add_guardian_name_help-block").html(data.guardian_name_error);
          $("#add_email_address_help-block").html(data.email_address_error);
          $("#add_contact_number_help-block").html(data.contact_number_error);
        }
      },
      error: function(e) {
        console.log(e);
      }
    });
  });
  $(".rfid_scan_add#students").click(function(e) {
    $("#students_add_modal").modal("show");
  });
  $(".rfid_scan_add#teachers").click(function(e) {
    $("#teachers_add_modal").modal("show");
  });
  $(".rfid_scan_add#staffs").click(function(e) {
    $("#staffs_add_modal").modal("show");
  });
  $(".rfid_scan_add#fetchers").click(function(e) {
    $("#fetchers_add_modal").modal("show");
  });
  $(document).on("submit", "#student_add_form", function(e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr('action'),
      data: new FormData(this),
      processData: false,
      contentType: false,
      method: "POST",
      dataType: "json",
      beforeSend: function() {
        $("button[form='student_add_form']").prop('disabled', true);
      },
      success: function(data) {
        if (data.is_valid) {
          $("#student_add_form")[0].reset();
          $('.ui.dropdown').dropdown('clear');
          $(".help-block").html("");
          if (data.is_successful) {
            $("#students_add_modal").modal("hide");
            alertify.success("You have successfully added a student in the list."); 
          }
        } else {
          $("#student_lrn_number_help-block").html(data.lrn_number_error);
          $("#student_first_name_help-block").html(data.first_name_error);
          $("#student_gender_help-block").html(data.gender_error);
          $("#student_mothers_name_help-block").html(data.mothers_name_error);
          $("#student_fathers_name_help-block").html(data.fathers_name_error);
          $("#student_address_help-block").html(data.address_error);
          $("#student_last_name_help-block").html(data.last_name_error);
          $("#student_middle_name_help-block").html(data.middle_name_error);
          $("#student_suffix_help-block").html(data.suffix_error);
          $("#student_contact_number_help-block").html(data.contact_number_error);
          $("#student_bday_help-block").html(data.bday_error);
          $("#student_guardian_id_help-block").html(data.guardian_id_error);
          $("#student_class_id_help-block").html(data.class_id_error);
          $("#student_photo_help-block").html(data.photo_error);
          $("#student_mother_tongue_help-block").html(data.mother_tongue_error);
          $("#student_age_as_of_august_help-block").html(data.age_as_of_august_error);
          $("#student_fathers_last_name_help-block").html(data.fathers_last_name_error);
          $("#student_fathers_middle_name_help-block").html(data.fathers_middle_name_error);
          $("#student_fathers_first_name_help-block").html(data.fathers_first_name_error);
          $("#student_fathers_contact_number_help-block").html(data.fathers_contact_number_error);
          $("#student_fathers_address_help-block").html(data.fathers_address_error);
          $("#student_mothers_last_name_help-block").html(data.mothers_last_name_error);
          $("#student_mothers_middle_name_help-block").html(data.mothers_middle_name_error);
          $("#student_mothers_first_name_help-block").html(data.mothers_first_name_error);
          $("#student_mothers_contact_number_help-block").html(data.mothers_contact_number_error);
          $("#student_mothers_address_help-block").html(data.mothers_address_error);
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        $("button[form='student_add_form']").prop('disabled', false);
      }
    })
  });
  $(document).on("submit", "#teacher_add_form", function(e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr('action'),
      data: new FormData(this),
      processData: false,
      contentType: false,
      method: "POST",
      dataType: "json",
      beforeSend: function() {
        $("button[form='teacher_add_form']").prop('disabled', true);
      },
      success: function(data) {
        if (data.is_valid) {
          $("#teacher_add_form")[0].reset();
          $('.ui.dropdown').dropdown('clear');
          $(".help-block").html("");
          $("#teachers_add_modal").modal("hide");
          
          update_select_options("class_adviser", base_url);
          if(data.sms_code != 0){
            alertify.success("You have successfully added a teacher in the list."); 
            var msg = alertify.notify('The Password was not been sent to <b>'+data.contact_number+'</b>.<br>Click this message to view the error.', 'error', 10);
            msg.callback = function (isClicked) {
              if(isClicked){
                alertify.alert('SMS Failed',data.sms_status);
              }
            };
          }else{
            alertify.success("You have successfully added a teacher in the list.<br>The Password has been sent to <b>"+data.contact_number+"</b>"); 
          }
        } else {
          $("#teacher_address_help-block").html(data.address_error);
          $("#teacher_in_case_contact_number_help-block").html(data.in_case_contact_number_error);
          $("#teacher_in_case_name_help-block").html(data.in_case_name_error);
          $("#teacher_gender_help-block").html(data.gender_error);
          $("#teacher_first_name_help-block").html(data.first_name_error);
          $("#teacher_last_name_help-block").html(data.last_name_error);
          $("#teacher_middle_name_help-block").html(data.middle_name_error);
          $("#teacher_suffix_help-block").html(data.suffix_error);
          $("#teacher_contact_number_help-block").html(data.contact_number_error);
          $("#teacher_bday_help-block").html(data.bday_error);
          $("#teacher_guardian_id_help-block").html(data.guardian_id_error);
          $("#teacher_class_id_help-block").html(data.class_id_error);
          $("#teacher_photo_help-block").html(data.photo_error);
          $("#teacher_dept_head_help-block").html(data.dept_head_error);
          $("#teacher_dept_head_number_help-block").html(data.dept_head_number_error);
          $("#teacher_blood_type_help-block").html(data.blood_type_error);
          $("#teacher_sss_help-block").html(data.sss_error);
          $("#teacher_philhealth_help-block").html(data.philhealth_error);
          $("#teacher_pagibig_help-block").html(data.pagibig_error);
          $("#teacher_tin_help-block").html(data.tin_error);
          $("#teacher_in_case_address_help-block").html(data.in_case_address_error);
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        $("button[form='teacher_add_form']").prop('disabled', false);
      }
    });
  });  
  $(document).on("submit", "#staff_add_form", function(e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr('action'),
      data: new FormData(this),
      processData: false,
      contentType: false,
      method: "POST",
      dataType: "json",
      beforeSend: function() {
        $("button[form='staff_add_form']").prop('disabled', true);
      },
      success: function(data) {
        if (data.is_valid) {
          $("#staff_add_form")[0].reset();
          $('.ui.dropdown').dropdown('clear');
          $(".help-block").html("");
          if (data.is_successful) {
            $("#staffs_add_modal").modal("hide");
            alertify.success("You have successfully added a staff in the list.");
            update_select_options("class_adviser", base_url);
          }
        } else {
          $("#staff_gender_help-block").html(data.gender_error);
          $("#staff_address_help-block").html(data.address_error);
          $("#staff_position_help-block").html(data.position_error);
          $("#staff_dept_head_help-block").html(data.dept_head_error);
          $("#staff_dept_head_number_help-block").html(data.dept_head_number_error);
          $("#staff_in_case_contact_number_help-block").html(data.in_case_contact_number_error);
          $("#staff_in_case_name_help-block").html(data.in_case_name_error);
          $("#staff_first_name_help-block").html(data.first_name_error);
          $("#staff_last_name_help-block").html(data.last_name_error);
          $("#staff_middle_name_help-block").html(data.middle_name_error);
          $("#staff_suffix_help-block").html(data.suffix_error);
          $("#staff_contact_number_help-block").html(data.contact_number_error);
          $("#staff_bday_help-block").html(data.bday_error);
          $("#staff_guardian_id_help-block").html(data.guardian_id_error);
          $("#staff_class_id_help-block").html(data.class_id_error);
          $("#staff_photo_help-block").html(data.photo_error);
          $("#staff_blood_type_help-block").html(data.blood_type_error);
          $("#staff_sss_help-block").html(data.sss_error);
          $("#staff_philhealth_help-block").html(data.philhealth_error);
          $("#staff_pagibig_help-block").html(data.pagibig_error);
          $("#staff_tin_help-block").html(data.tin_error);
          $("#staff_in_case_address_help-block").html(data.in_case_address_error);
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        $("button[form='staff_add_form']").prop('disabled', false);
      }
    })
  });
  $(document).on("submit", "#fetcher_add_form", function(e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr('action'),
      data: new FormData(this),
      processData: false,
      contentType: false,
      method: "POST",
      dataType: "json",
      beforeSend: function() {
        $("button[form='fetcher_add_form']").prop('disabled', true);
      },
      success: function(data) {
        if(data.is_valid){
          alertify.success('Fetcher is added.');
          $('#fetchers_add_modal').modal('hide');
        }else{
          alertify.error('Students to fetch is required.');
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        $("button[form='fetcher_add_form']").prop('disabled', false);
      }
    })
  });
  $(document).on("click", "#add_canteen", function(e) {
    $("#add_canteen_modal").modal("show");
  });
  $(document).on("submit", "#add_canteen_form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#add_canteen_form").attr("action"),
      data: $("#add_canteen_form").serialize(),
      cache: false,
      dataType: "json",
      beforeSend: function() {
        $('button[form="add_canteen_form"]').prop('disabled', true);
      },
      success: function(data) {
        if (data.is_valid) {}
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        $('button[form="add_canteen_form"]').prop('disabled', false);
      }
    });
  });
  $(document).on("click", "#class_add", function(e) {
    $("#class_add_modal").modal("show");
  });
  $(document).on("submit", "#class_add_form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#class_add_form").attr("action"),
      data: $("#class_add_form").serialize(),
      cache: false,
      dataType: "json",
      beforeSend: function() {
        $('button[form="class_add_form"]').prop('disabled', true);
      },
      success: function(data) {
        if (data.is_valid) {
          $("#class_add_form")[0].reset();
          $('.ui.dropdown').dropdown('clear');
          alertify.success("You have successfully added a class in the list.");
          $(".help-block").html("");
          update_select_options("class_id", base_url);
        } else {
          $("#class_adviser_help-block").html(data.class_adviser_error);
          $("#class_name_help-block").html(data.class_name_error);
          $("#grade_help-block").html(data.grade_error);
          $("#class_room_help-block").html(data.class_room_error);
          $("#class_schedule_help-block").html(data.class_schedule_error);
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        $('button[form="class_add_form"]').prop('disabled', false);
      }
    });
  });
  $("#send-sms-admin").on("click", function(e) {
    $("#sms-modal").modal("show");
  });
  $("#send-sms-teacher").on("click", function(e) {
    $("#sms-modal-teacher").modal("show");
  });
  $("#add-class").on("click", function(e) {
    $("#class_add_modal").modal("show");
  });
  $("#datepicker_from,#datepicker_to").datepicker();
  $('.ui.dropdown').dropdown({
    forceSelection: false
  });
  $(document).on("change", 'select[name="type_recipient"]', function(e) {
    if (e.target.value == "all_teachers" || e.target.value == "all_teachers_students" || e.target.value ==
      "all_students" || e.target.value == "all_members" || e.target.value == "all_guardians" || e.target.value == "staffs") {
      $("#send-to-container").css("display", "none");
    } else {
      $("#send-to-container").css("display", "block");
    }
  });
  $(document).on("click", ".email_settings", function(e) {
    $("#email_settings-modal").modal("show");
  });
  $(document).on("submit", "#guardian_email_settings_form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#guardian_email_settings_form").attr("action"),
      data: $("#guardian_email_settings_form").serialize(),
      cache: false,
      dataType: "json",
      beforeSend: function() {
        $('button[form="guardian_email_settings_form"]').prop('disabled', true);
      },
      success: function(data) {
        if (data.is_valid) {
          $(".help-block").html("");
          $("#email_settings-modal").modal("hide");
          alertify.success("You have successfully changed your email settings.");
        } else {
          $("#email_settings_email_address_help-block").html(data.email_address_error);
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        $('button[form="guardian_email_settings_form"]').prop('disabled', false);
      }
    });
  });
  $(document).on("click", "#gate_change_password", function(e) {
    $("#gate_change_password-modal").modal("show");
  });
  $(document).on("submit", "#gate_change_password-form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#gate_change_password-form").attr("action"),
      data: $("#gate_change_password-form").serialize(),
      cache: false,
      dataType: "json",
      beforeSend: function() {
        $('button[form="gate_change_password-form"]').prop('disabled', true);
      },
      success: function(data) {
        if (data.is_valid) {
          $("#gate_change_password-form")[0].reset();
          $(".help-block").html("");
          $("#gate_change_password-modal").modal("hide");
          alertify.success("You have successfully changed the gate password.");
        } else {
          $("#gate_current_password_help-block").html(data.current_password_error);
          $("#gate_new_password_help-block").html(data.new_password_error);
          $("#gate_confirm_password_help-block").html(data.confirm_password_error);
        }
      },
      error: function(e) {
        console.log(e);
      },
      success: function() {
        $('button[form="gate_change_password-form"]').prop('disabled', false);
      }
    });
  });
  $(document).on("click", "#reset_admin_password", function(e) {
    $("#reset_admin_password-modal").modal("show");
    $.ajax({
      type: "GET",
      url: base_url + "admin_ajax/get_list",
      data: "get=1",
      cache: false,
      dataType: "json",
      beforeSend: function() {
        $('#select_admin_username').dropdown("clear");
        $('#select_admin_username').html("");
        $('#select_admin_username').append('<option value="">Select a Class</option>');
      },
      success: function(data) {
        $.each(data, function(i, item) {
          $('#select_admin_username').append('<option value="' + data[i].id + '">' + data[i].username +
            '</option>');
        });
      },
      error: function(e) {
        console.log(e);
      }
    });
  });
  $(document).on("submit", "#add_admin-form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      data: $("#add_admin-form").serialize(),
      url: $("#add_admin-form").attr("action"),
      cache: false,
      dataType: "json",
      beforeSend: function() {
        $('button[form="add_admin-form"]').prop('disabled', true);
      },
      success: function(data) {
        if (data.is_valid) {
          $(".help-block").html("");
          $("#add_admin-modal").modal("hide");
          alertify.success("You have created an admin account and the password has been sent to "+data.email_address);
        } else {
          $("#add_admin_username_help-block").html(data.username_error);
          $("#add_admin_email_address_help-block").html(data.email_address_error);
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        $('button[form="add_admin-form"]').prop('disabled', false);
      }
    });
  });
  $(document).on("submit", "#reset_admin_password-form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#reset_admin_password-form").attr("action"),
      data: $("#reset_admin_password-form").serialize(),
      cache: false,
      dataType: "json",
      beforeSend: function() {
        $('button[form="reset_admin_password-form"]').prop('disabled', true);
      },
      success: function(data) {
        if (data.is_valid) {
          $("#reset_admin_password_help-block").html(data.email_address_error);
          $(".help-block").html("");
          $("#reset_admin_password-modal").modal("hide");
          alertify.success("The new admin password has been sent to " + data.email_address);
        } else {
          $("#reset_admin_password_help-block").html(data.email_address_error);
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        $('button[form="reset_admin_password-form"]').prop('disabled', false);
      }
    });
  });
  $(document).on("click", "#add_admin", function(e) {
    $("#add_admin-modal").modal("show");
  });
  $(document).on("click",".send-sms",function(data) {
    $.ajax({
      type: "GET",
      url: base_url+"sms_ajax/get_api_data",
      data: "get=1",
      cache: false,
      dataType: "json",
      success: function(data) {
        $("#smsapi-message-left").html(data.MessagesLeft);
        $("#smsapi-message-max").attr('data-balloon',data.MaxMessages);
      },
      error: function(e) {
        console.log(e);
      }
    })
;  });
  var needToConfirm = false;
  $(document).on("submit", "#sms-form", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: $("#sms-form").attr("action"),
      data: $("#sms-form").serialize(),
      cache: false,
      dataType: "json",
      beforeSend: function() {
        needToConfirm = true;
        $('button[form="sms-form"]').prop('disabled', true);
        $('button[form="sms-form"]').html("Sending...");
        $('.loading').css("display", "initial");
      },
      success: function(data) {
        if (data.is_valid) {
          var count = 0;
          $.each(data.recipients_number, function(i, item) {
            $.ajax({
              type: "POST",
              url: base_url+"sms_ajax/send_api",
              dataType: "json",
              data: $("#sms-form").serialize()+"&sms_id="+data.sms_id+"&recipients_number="+data.recipients_number[i],
              cache: false,
              success: function(new_response) {
                count++;
                $('button[form="sms-form"]').html("Sending..."+count+"/"+data.recipients_number.length);
                if(data.recipients_number.length==count){
                  $("#sms-form")[0].reset();
                  $('.ui.dropdown').dropdown('clear');
                  $(".help-block").html("");
                  $("#sms-modal").modal("hide");
                  $("#sms-modal-teacher").modal("hide");
                  $("#sms-list-modal").modal("show");
                  $("#message_id_txt").html(new_response.sms_id);
                  $('.sms_list_table tbody').html("");
                  $.ajax({
                    type: "GET",
                    url: base_url+"sms_ajax/get_data",
                    data: "sms_id="+new_response.sms_id,
                    cache: false,
                    dataType: "json",
                    success: function(sms_table) {
                      $.each(sms_table, function(z, item) {
                        $('.sms_list_table tbody').append('\
                          <tr>\
                          <td>' + sms_table[z].message + '</td>\
                          <td>' + sms_table[z].mobile_number + '</td>\
                          <td class="recipient">' + sms_table[z].ref_table + '</td>\
                          <td>' + sms_table[z].recipient + '</td>\
                          <td>' + sms_table[z].status + '</td>\
                          </tr>\
                          ');
                      });
                    }
                  });
                }
              },
              error: function(e) {
                console.log(e);
              }
            })
          });
        }else {
          needToConfirm = false;
          $('.loading').css("display", "none");
          $('button[form="sms-form"]').html("Submit");
          $('button[form="sms-form"]').prop('disabled', false);

          $("#type_recipient_help-block").html(data.type_recipient_error);
          $("#message_help-block").html(data.message_error);
          $("#class_id_help-block").html(data.class_id_error);
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        needToConfirm = false;
        $('.loading').css("display", "none");
        $('button[form="sms-form"]').html("Submit");
        $('button[form="sms-form"]').prop('disabled', false);
      }
    });
  });
  window.onbeforeunload = confirmExit;

  function confirmExit() {
    if (needToConfirm) return "Changes have not been saved.";
  }
  update_select_options("guardian_id", base_url);
  update_select_options("class_adviser", base_url);
  update_select_options("class_id[]", base_url);
  update_select_options("class_id", base_url);
  update_select_options("fetcher_student_id[]", base_url);
  function update_select_options(type, base_url) {
    if (type == "guardian_id") {
      $.ajax({
        type: "GET",
        url: base_url + "guardian_ajax/get_list",
        cache: false,
        dataType: "json",
        beforeSend: function() {
          $('select[name="' + type + '"]').html("");
          $('select[name="' + type + '"]').append('<option value="">Select a Guardians Email</option>');
        },
        success: function(data) {
          $.each(data, function(i, item) {
            $('select[name="' + type + '"]').append('<option value="' + data[i].id + '">' + data[i].contact_number + ' - ' + data[i].name +
              '</option>');
          })
        },
        error: function(e) {
          console.log(e);
        }
      });
    } else if (type == "class_adviser") {
      $.ajax({
        type: "GET",
        url: base_url + "teacher_ajax/get_list/admin",
        cache: false,
        dataType: "json",
        beforeSend: function() {
          $('select[name="' + type + '"]').html("");
          $('select[name="' + type + '"]').append('<option value="">Select a Class Adviser</option>');
        },
        success: function(data) {
          $.each(data, function(i, item) {
            $('select[name="' + type + '"]').append('<option value="' + data[i].id + '">' + data[i].full_name +
              '</option>');
          })
        },
        error: function(e) {
          console.log(e);
        }
      });
    } else if (type == "class_id[]" || type == "class_id") {
      $.ajax({
        type: "GET",
        url: base_url + "class_ajax/get_list",
        cache: false,
        dataType: "json",
        beforeSend: function() {
          $('select[name="' + type + '"]').html("");
          $('select[name="' + type + '"]').append('<option value="">Select a Class</option>');
        },
        success: function(data) {
          $.each(data, function(i, item) {
            $('select[name="' + type + '"]').append('<option value="' + data[i].id + '">' + data[i].class_name + " - " + data[i].grade +
              '</option>');
          })
        },
        error: function(e) {
          console.log(e);
        }
      });
    } else if (type == "fetcher_student_id[]") {
      $.ajax({
        type: "GET",
        url: base_url + "student_ajax/get_list/admin",
        cache: false,
        dataType: "json",
        beforeSend: function() {
          $('select[name="' + type + '"]').html("");
          $('select[name="' + type + '"]').append('<option value="">Select a student</option>');
        },
        success: function(data) {
          $.each(data, function(i, item) {
            $('select[name="' + type + '"]').append('<option value="' + data[i].id + '">' + data[i].full_name +
              '</option>');
          })
        },
        error: function(e) {
          console.log(e);
        }
      });
    }
  }

  $(".modal").on('shown.bs.modal', function () {
      $(this).find("input:visible:first").focus();
  });

  //when closing a bootstrap modal
  $('button[data-dismiss="modal"]').click(function(e) {
    if(e.target.className=="btn btn-default"){
      alertify.error('Cancelled');
    }
  });
  // alertify settings
  alertify.dialog('confirm').set({transition:'zoom'});

  var require_mothers_tongue = false;
  $('#student_add_select_class').dropdown({
    onChange: function (value, text, choice) {
      if (typeof text == "undefined"){
        return false;
      }
      let str = text.toLowerCase();
      let grade_str_position = str.search(/grade/i);
      let grade = str.slice(grade_str_position, str.length);
      switch (grade) {
        case 'grade 1':
        case 'grade 2':
        case 'grade 3':
          require_mothers_tongue = true
          break;
          
        default:
          require_mothers_tongue = false
          break;
      }
      $('#grade').val(grade);
    }
  });
});