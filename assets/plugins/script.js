$(document).ready(function(){
     var calendar = $('#calendar').fullCalendar({
          editable: true,
          selectable: true,
          selectHelper: true,
          //timeFormat: 'H(:mm)t',
          header: {
             left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        events: 'agenda.php'

     });
});

#calendar {
     background-color: burlywood;
     color: black;
     font-family: sans-serif;
     max-width: 400px;
     max-height: 350px;
     min-width: 300px;
     min-height: 200px;
     font-size: 14px;
     top:50%;
     left:50%;
     transform: translate(-50%,-50%);
     padding: 30px;
     position: absolute;
     box-shadow: 0 0 5px 0 rgb(19, 18, 18);
}