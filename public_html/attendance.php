<?php

include ('../includes/config.php');
include ('includes/session.php');

if (!$_SESSION['admin_boolean']) {
  header("Location: member_attendance");
}

$active_page = 'attendance';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TFSS DECA | Attendance</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon.png`" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/admin.min.css">
  <link rel="stylesheet" href="css/skin-blue.min.css">
  <!-- Page Style -->
  <link rel="stylesheet" href="css/attendance.css">



  <!-- jQuery 2.2.3 -->
  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="components/all_pages.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/admin.min.js"></script>

</head>


<body class="hold-transition skin-blue sidebar-mini fixed">
 <div class="wrapper">

  <!-- Header and Left Menu -->
  <?php if ($_SESSION['admin_boolean']) { include 'components/admin_menu.php'; }
  else { include 'components/member_menu.php'; } ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <!--<section class="content-header">
        <h1>
          Home
          <small>General Info</small>
        </h1>
      </section>-->

      <!-- Main content -->
      <section class="content">



       <button class="btn btn-lg btn-primary btn-block btn-full-5" id="start_session_button">Start Session</button>
       <button class="btn btn-lg btn-primary btn-block btn-full-5" id="end_session_button">End Session</button>
       <button class="btn btn-lg btn-primary btn-block btn-full-5" id="check_attendance_button" onclick="window.location='check_attendance';" >Check Attendance</button>


     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
 </div>


 <!--Start Session When Unset Modal -->
 <div class="modal fade" id="start_session_unset_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form id="start_form" role="form">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Start Session</h4>
        </div>
        <div class="modal-body" id="body" align:"center">
          <input type="text" placeholder="Code Word" id="code_word" autocomplete="off" style="margin-left:10%; min-height: 3vh; min-width: 80%;" />
        </div>
        <div class="modal-footer" id="footer" align:"center">
          <input type="button" class="btn btn-primary" id="begin_session" value="Begin" />
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Start Session When Set Modal -->
<div class="modal fade" id="start_session_set_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form id="start_form" role="form">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Session Already Started</h4>
        </div>
        <div class="modal-body" id="body" align:"center">
          <div id="current_password_div"></div>
        </div>
        <div class="modal-footer" id="footer" align:"center">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--End Session Unset Modal -->
<div class="modal fade" id="end_session_unset_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form id="end_form" role="form">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="myModalLabel">No Session Started</h4>
        </div>
        <div class="modal-body" id="body" align:"center">
          <h4>You'll have to start a session first</h4>
        </div>
        <div class="modal-footer" id="footer" align:"center">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--End Session Set Modal -->
<div class="modal fade" id="end_session_set_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form id="end_form" role="form">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="myModalLabel">End Session</h4>
        </div>
        <div class="modal-body" id="body" align:"center">
          <h4>Are you sure?
          </div>
          <div class="modal-footer" id="footer" align:"center">
            <input type="button" class="btn btn-primary" id="end_session" value="Yes" />
            <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>



  $(document).ready(function() {

    var attendance_id;

    check_open();
    $("#start_session_button").click(function() {
      open_start();
    });
    $("#end_session_button").click(function() {
      $.ajax({
        type: "get",
        url: "includes/ajax",
        data: {ajax_id : JSON.stringify("attendance_check_open"),
        code_word : JSON.stringify(code_word)},
      }).done(function(data){ 
        result = jQuery.parseJSON(data);
        if (result['exists']) {
          $('#end_session_set_modal').modal('show'); 
        }
        else {
          $('#end_session_unset_modal').modal('show');        
        }      
      });
    });
    $("#begin_session").click(function() {
      start_ajax($("#code_word").val());
    });
    $("#end_session").click(function() {
      end_ajax();
    });


  });

function start_ajax (code_word) {
  if (code_word.length == 0) {
    alert ("Enter a code word");
    return;
  }
  $.ajax({
    type: "get",
    url: "includes/ajax",
    data: {ajax_id : JSON.stringify("attendance_start"),
    code_word : JSON.stringify(code_word)},
  }).done(function(data) {
    result = jQuery.parseJSON(data);
    if (result) {
      alert("Session successfully started");
  $('#start_session_unset_modal').modal('hide');
    }
    else {
      alert("Failed to start session");
    }
  });
  check_open();
}

function end_ajax () {
  $.ajax({
    type: "get",
    url: "includes/ajax",
    data: {ajax_id : JSON.stringify("attendance_end"),
        attendance_id : JSON.stringify(attendance_id)},
  }).done(function(data) {
    result = jQuery.parseJSON(data);
    if (result) {
      alert("Session successfully ended");
  $('#end_session_set_modal').modal('hide');
    }
    else {
      alert("Failed to end session");
    }
  });
}

function check_open() {
  $.ajax({
        type: "get",
        url: "includes/ajax",
        data: {ajax_id : JSON.stringify("attendance_check_open"),
        code_word : JSON.stringify(code_word)},
      }).done(function(data){ 
        result = jQuery.parseJSON(data);
        if (result['exists']) {
          attendance_id = result['attendance_id'];
        }   
      });
}

function open_start() {
  $.ajax({
        type: "get",
        url: "includes/ajax",
        data: {ajax_id : JSON.stringify("attendance_check_open"),
        code_word : JSON.stringify(code_word)},
      }).done(function(data){ 
        result = jQuery.parseJSON(data);
        if (result['exists']) {
          $("#current_password_div").html("<h3>Session started: " + result['start_time'] + "</h3><p>Code is: <i>" + result['code_word'] + "</i></p>");
          $('#start_session_set_modal').modal('show'); 
          attendance_id = result['attendance_id'];
        }
        else {
          $('#start_session_unset_modal').modal('show');        
        }      
      });
}

</script>

</body>
</html>