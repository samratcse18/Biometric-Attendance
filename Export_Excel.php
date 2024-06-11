<?php
//Connect to database
require'connectDB.php';

$output = '';

// $_POST['subject_show'] = null;
if(isset($_POST["To_Excel"])){
    $subject = $_POST['subject_show'];
    $Log_date = $_POST['date_sel'];

    if($Log_date && $subject){
        $sql = "SELECT * FROM users_logs WHERE checkindate='$Log_date' AND subject='$subject' ORDER BY id DESC";
    }
    elseif($Log_date){
        $sql = "SELECT * FROM users_logs WHERE checkindate='$Log_date' ORDER BY id DESC";
    }
    elseif($subject){
        $sql = "SELECT * FROM users_logs WHERE subject='$subject' ORDER BY id DESC";
    }
    else{
        $sql = "SELECT * FROM users_logs ORDER BY id DESC";
    }
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0){
            $output .= '
                        <table class="table" bordered="1">  
                          <TR>
                            <TH>ID</TH>
                            <TH>Name</TH>
                            <TH>Serial Number</TH>
                            <TH>Fingerprint ID</TH>
                            <TH>Date log</TH>
                            <TH>Subject</TH>
                            <TH>Time In</TH>
                            <TH>Time Out</TH>
                          </TR>';
              while($row=$result->fetch_assoc()) {
                  $output .= '
                              <TR> 
                                  <TD> '.$row['id'].'</TD>
                                  <TD> '.$row['username'].'</TD>
                                  <TD> '.$row['serialnumber'].'</TD>
                                  <TD> '.$row['fingerprint_id'].'</TD>
                                  <TD> '.$row['checkindate'].'</TD>
                                  <TD> '.$row['subject'].'</TD>
                                  <TD> '.$row['timein'].'</TD>
                                  <TD> '.$row['timeout'].'</TD>
                              </TR>';
              }
              $output .= '</table>';
              header('Content-Type: application/xls');
              header('Content-Disposition: attachment; filename=student_attendance'.$Log_date.'.xls');
              
              echo $output;
              exit();
        }
        else{
            header( "location: UsersLog.php" );
            exit();
        }
}
?>