<!DOCTYPE html>
<html>
<head>
	<title>Add Subject Details</title>
<link rel="stylesheet" type="text/css" href="css/subject.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/subject.js"></script>
</head>
<body>
<?php include'header.php';?>
<style>
  .formdata {
    margin-top: -90px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  form {
    width: 500px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
  }

  input[type="text"], select {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  button[type="button"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button[type="button"]:hover {
    background-color: #45a049;
  }

  .alert{
    font:20px;
    color:yellow;
    text-align:center;
  }
</style>
<main>
	<h1 class="slideInDown animated">Add Subject Details</h1>
    <div class="alert">
		<label id="alert"></label>
	</div>
	<div class="formdata slideInDown animated">
        <form id="subjectForm" style="background:#659aa1; margin-top: -80px;">
            <label for="title">Course Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="code">Course Code:</label>
            <input type="text" id="code" name="code" required>

            <label for="credit">Course Credit:</label>
            <input type="text" id="credit" name="credit" required>

            <label for="teacher">Course Teacher:</label>
            <input type="text" id="teacher" name="teacher" required>

            <label for="status">Course Status:</label>
            <select id="status" name="status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <button type="button" name="subject_add" class="subject_add" style="background: linear-gradient(to right, #23555c, #21a0ab);">Add Subject</button>
        </form>
    </div>

</main>
</body>
</html>