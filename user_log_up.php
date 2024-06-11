<table cellpadding="0" cellspacing="0" border="0">
  <tbody>
    <?php

      session_start();
      //Connect to database
      require'connectDB.php';
      // $subject = $_POST['subject_show'];
      if (isset($_POST['log_date'])) {
        if ($_POST['date_sel'] != 0) {
            $seldate = $_POST['date_sel'];
            $subject = $_POST['subject_show'];
        }
        else{
            $seldate = date("Y-m-d");
        }
      }
      
      if ($_POST['select_date'] == 1) {
          $seldate = $_POST['date_sel'];
          $subject = $_POST['subject_show'];
        }
        else if ($_POST['select_date'] == 0) {
          $seldate = $_POST['date_sel'];
          $subject = $_POST['subject_show'];
      }
      if($seldate!=null && $subject!=null){
        $sql = "SELECT * FROM users_logs WHERE checkindate='$seldate' AND subject = '$subject' ORDER BY id DESC";
      }
      elseif($seldate){
        $sql = "SELECT * FROM users_logs WHERE checkindate='$seldate' ORDER BY id DESC";
      }
      elseif($subject){
        $sql = "SELECT * FROM users_logs WHERE subject='$subject' ORDER BY id DESC";
      }
      else{
        $sql = "SELECT * FROM users_logs ORDER BY id DESC";
      }
      $result = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($result, $sql)) {
          echo '<p class="error">SQL Error</p>';
      }
      else{
        mysqli_stmt_execute($result);
          $resultl = mysqli_stmt_get_result($result);
        if (mysqli_num_rows($resultl) > 0){
            while ($row = mysqli_fetch_assoc($resultl)){
      ?>
                  <TR>
                  <TD><?php echo $row['id'];?></TD>
                  <TD><?php echo $row['username'];?></TD>
                  <TD><?php echo $row['serialnumber'];?></TD>
                  <TD><?php echo $row['fingerprint_id'];?></TD>
                  <TD><?php echo $row['checkindate'];?></TD>
                  <TD><?php echo $row['subject'];?></TD>
                  <TD><?php echo $row['timein'];?></TD>
                  <TD><?php echo $row['timeout'];?></TD>
                  </TR>
    <?php
            }   
        }
      }
    ?>
  </tbody>
</table>