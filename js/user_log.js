$(document).ready(function(){
  // Get Report passenger
  $(document).on('click', '#user_log', function() {
    function fetchData() {
        var date_sel = $('#date_sel').val();
        var subject_show = $('#subject_show').val();
        console.log(subject_show);
        console.log(date_sel);
        $.ajax({
            url: 'user_log_up.php',
            type: 'POST',
            data: {
                'log_date': 1,
                'date_sel': date_sel,
                'subject_show': subject_show,
            },
            success: function(response) {
                $.ajax({
                    url: "user_log_up.php",
                    type: 'POST',
                    data: {
                        'log_date': 1,
                        'date_sel': date_sel,
                        'subject_show': subject_show,
                        'select_date': 0,
                    }
                }).done(function(data) {
                    $('#userslog').html(data);
                });
            }
        });
    }

    fetchData();

    var intervalID = setInterval(fetchData, 3000);

    $('#stop_interval').on('click', function() {
        clearInterval(intervalID);
    });
});

});