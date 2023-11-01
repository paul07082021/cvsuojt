
$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
    defaultDate: '2020-02-17',
    navLinks: true,
    eventLimit: true,
    events: [{
            title: 'Front-End Conference',
            start: '2020-02-17',
            end: '2020-02-17'
        },
        {
            title: 'jake meetings',
            start: '2020-02-17',
            end: '2020-02-17'
        },
       
    ]
});