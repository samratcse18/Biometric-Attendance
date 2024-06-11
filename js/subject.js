$(document).ready(function(){
    $(document).on('click', '.subject_add', function(){
        
      var title = $('#title').val();
      var code = $('#code').val();
      var credit = $('#credit').val();
      var teacher = $('#teacher').val();
      var status = $('#status').val();
      
      // Check if form is valid
      if($('#subjectForm')[0].checkValidity()){
        $.ajax({
          url: 'add_subject_action.php',
          type: 'POST',
          data: {
            'Add': 1,
            'title': title,
            'code': code,
            'credit': credit,
            'teacher': teacher,
            'status': status,
          },
          success: function(response){
            $('#alert').show();
            $('#alert').text(response);
            
            // Reset the form
            $('#subjectForm')[0].reset();
          }
        });
      } else {
        // If form is not valid, trigger HTML5 validation
        $('#subjectForm')[0].reportValidity();
      }
    });
    $.ajax({
        url: 'add_subject_action.php',
        type: 'POST',
        data: {
            'show': 1,
        },
        success: function(response){
            console.log("Response received:");
            console.log(response);
            // Append the options to the select element
            $('#subject_show').html(response);
        }
    });
    $(document).on('click', '.active_subject', function(){
        var subject_show = $('#subject_show').val();
        // console.log(subject_show)
          $.ajax({
            url: 'add_subject_action.php',
            type: 'POST',
            data: {
              'active_subject': 1,
              'subject_show': subject_show,
            },
            success: function(response){
              window.location.reload();
            }
          });
      });
      $.ajax({
        url: 'add_subject_action.php',
        type: 'POST',
        data: {
            'show_active_subject': 1,
        },
        success: function(response){
            $('#show_active_subject').html(response);
        }
    });
  });
  