<!DOCTYPE html>
<html>
<head>
  <title>Users Logs</title>
<link rel="stylesheet" type="text/css" href="css/userslog.css">
<script>
  $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/user_log.js"></script>
<script>
  // $(document).ready(function(){
  //   var date_sel = $('#date_sel').val();
  //   var subject_show = $('#subject_show').val();
  //     $.ajax({
  //       url: "user_log_up.php",
  //       type: 'POST',
  //       data: {
  //           'select_date': 1,
  //           'date_sel': date_sel,
  //           'subject_show': subject_show,
  //       }
  //     });
  //   setInterval(function(){
  //     $.ajax({
  //       url: "user_log_up.php",
  //       type: 'POST',
  //       data: {
  //           'select_date': 0,
  //           'date_sel': date_sel,
  //           'subject_show': subject_show,
  //       }
  //       }).done(function(data) {
  //         $('#userslog').html(data);
  //       });
  //   },5000);
  // });
</script>
</head>
<body>
<?php include'header.php'; ?> 
<main>
  <section>
  <!--User table-->
  <h1 class="slideInDown animated">Here are the Students daily Attendance</h1>
  	<div class="form-style-5 slideInDown animated">
  		<form method="POST" action="Export_Excel.php">
  			<input type="date" name="date_sel" id="date_sel">
        <select id="subject_show" name="subject_show" style="width: 190px; padding: 4px;" required>

        </select>
        <button type="button" name="active_subject" class="active_subject" style="margin-top: 10px;">Active Subject</button>
        <button type="button" name="user_log" id="user_log">Select Date</button>
  			<input type="submit" name="To_Excel" value="Export to Excel">
  		</form>
      <div class="form-style-5 slideInDown animated">
        <h3 id="show_active_subject" style="text-align:center;"></h3>
      </div>
  	</div>
  <div class="tbl-header slideInRight animated">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Student ID</th>
          <th>Fingerprint ID</th>
          <th>Date</th>
          <th>Subject</th>
          <th>Time In</th>
          <th>Time Out</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content slideInRight animated">
    <div id="userslog"></div>
  </div>
</section>
</main>
</body>
</html>
<script src="js/subject.js"></script>