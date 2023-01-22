<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar1');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          //initialView: 'dayGridMonth'
          initialView: 'timeGrid'
          

        });
        var calendarEl2 = document.getElementById('calendar2');
        var calendar2 = new FullCalendar.Calendar(calendarEl2, {
          initialView: 'dayGridMonth'
          
          

        });
        calendar.setOption('locale', 'uk');
        calendar.render();
        calendar2.setOption('locale', 'en');
        calendar2.render();


      });

    </script>
  </head>
  <body>
    <h1>Mi calendario</h1>
    <!-- capa para el calendario -->
    <div id='calendar1'></div>
    <div id='calendar2'></div>
  </body>
</html>