<?php  
//Connect to database
require'connectDB.php';

if (isset($_POST['Add'])) {
     
    $title = $_POST['title'];
    $code = $_POST['code'];
    $credit= $_POST['credit'];
    $teacher= $_POST['teacher'];
    $status= $_POST['status'];

    //check if there any selected user
    $sql = "INSERT INTO subjects (title, code, credit, teacher, status) 
          VALUES ('$title', '$code', '$credit', '$teacher', '$status')";

  // Perform insert
  if ($conn->query($sql) === TRUE) {
    echo "Add New Subject successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
if (isset($_POST['show'])) {
  echo '<option selected disabled>Select Subject</option>';
    //check if there any selected user
    $query = "SELECT title FROM `subjects`";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value=\"" . $row["title"] . "\">" . $row["title"] . "</option>";
        }
      }else{
          
      }
}
if (isset($_POST['active_subject'])) {
     
  $subject_show = $_POST['subject_show'];

  //check if there any selected user
  $delete = "DELETE FROM `activesubject`";
  $sql = "INSERT INTO activesubject (subject) 
        VALUES ('$subject_show')";
// Perform insert
if ($conn->query($delete) === TRUE) {
  if($conn->query($sql) === TRUE){
    echo "Add New Subject successfully";
  }
  else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
if (isset($_POST['show_active_subject'])) {

  $query = "SELECT subject FROM `activesubject`";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo $row["subject"];
      }
    }
}
?>
