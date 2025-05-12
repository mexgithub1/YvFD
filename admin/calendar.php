<?php
session_start();
  include '../config/config.php';
  class data extends Connection{ 
      public function managedata(){ 
?>
<!DOCTYPE html>
<html>
<head><?php include 'head.php'; ?>
  

 <style>
  .fc-day-header {
    padding-bottom: 15px !important;
    
}
.custom-day-header {
    background-color: #ebc09a !important;
    border: 5px solid #000 !important;
    padding-top: 5px !important;
    padding-bottom: 15px !important; /* Adjust the spacing as needed */
}

.custom-day-header::after {
    content: ''; /* Add a pseudo-element for the white bottom border */
    display: block;
    width: 100%;
    height: 5px;
    background-color: white;
    position: absolute;
    bottom: 0;
}

td.fc-day-top {
    padding-right: 20px;
}

.fc-ltr .fc-basic-view .fc-day-top .fc-day-number{
  margin-right: 10px;
}

td.fc-event-container{
  padding: 20px !important;
}
.fc-content {
    padding: 10px !important;
    text-align: center;
}

html{
  overflow-x: none !important;
}
 </style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />

</head>
</head>
<body>
  <div class="wrapper">
    <?php include 'profile.php'; ?>
    <?php include 'sidebar.php'; ?>
    <div class="content-wrapper" style="height: 100vh;background-color: #f9f9f9;overflow-x: hidden;">
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-body">
                <div id="calendar" style="overflow-x: none !important;"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
      


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="../asset/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="../asset/js/fontawesome.js"></script>

<script>
  $(document).ready(function() {
    display_events();
  });

  function display_events() {
    var events = new Array();
    $.ajax({
      url: '../controller/calendarController.php',  
      dataType: 'json',
      success: function (response) {
        var result = response.data;
        $.each(result, function (i, item) {
          events.push({
            events_id: result[i].events_id,
            title: result[i].title,
            start: result[i].start,
            end: result[i].end,
            color: result[i].color,
            url: result[i].url,
            code: result[i].code,
          });   
        });

        // Initialize FullCalendar
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          dayNamesShort: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
          defaultView: 'month',
          timeZone: 'local',
          editable: true,
          selectable: true,
          selectHelper: true,

          eventRender: function(event, element) { 
              element.bind('click', function() {
                  window.open('result.php?code='+event.code, '_blank');
              });
          },



          events: events,

          dayRender: function (date, cell) {
            cell.css({
              'border-color': 'white',
              'outline': '5px solid #fff',
              'background-color': '#ecf0f5',
              'border': '5px solid #fff'
            });
          },

          viewRender: function(view, element) {
            var dayHeaders = $('.fc-day-header');
            dayHeaders.each(function(index) {
              $(this).addClass('custom-day-header')
                .css({
                  'background-color': '#ff6a00',
                  'outline': '5px solid #fff',
                  'padding-top': '5px',
                  'padding-bottom': '5px'
                });
            });
          }
        });
      },
      error: function (xhr, status) {
        alert("Error loading events: " + status);
      }
    }); 
  }
</script>

</body>
</html>
<?php } } $data = new data(); $data->managedata(); ?>