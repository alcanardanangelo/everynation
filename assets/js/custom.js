$(function () {
  $("#birthday").datepicker();
  var dateToday = new Date();
  $("#date_class").datepicker({minDate: dateToday});


  $(".date_journey_start").datepicker();
  $(".date_journey_end").datepicker();

  $("#date_from").datepicker();
  $("#date_to").datepicker();



  $("#date_of_service").datepicker({minDate: dateToday});


  $('#discipleship_journey_save').on('click', function (e) {
    e.preventDefault();
    // var status = $('#test').closest("tr").find('#status option:selected').val();
    // var victory_group_leader_id = $(this).closest("tr").find('#victory_group_leader_id').val();
    // var date_started = $('#test').closest("tr").find('#date_journey_start').val();

    var status = $('#status option:selected').val();
    var registration_id = $('#registration_id').val();
    var journey_id = $('#journey_id option:selected').val();
    var victory_group_leader_id = $('#victory_group_leader_id option:selected').val();

    $.ajax({
      url: 'discipleship-journey/add',
      data: {
        journey_id: journey_id,
        registration_id: registration_id,
        victory_group_leader_id: victory_group_leader_id
      },
      type: 'post',
      success: function (data) {
        window.location.replace('http://everynation.thejob-connection.com/discipleship-journey');

      },
    });

  });

  $('.status_update').on('change', function () {
    var status = this.value;
    var registration_id = $('#registration_id').val();
    if (status == 1) {
      $.ajax({
        url: 'discipleship-journey/update',
        data: {
          registration_id: registration_id,
          status: status,

        },
        type: 'post',
        success: function (data) {
          window.location.replace('http://everynation.thejob-connection.com/discipleship-journey');

        },
      });

    }
  });




});