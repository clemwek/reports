$('document').ready(function() {
    loadNewStaffForm();
    loadAccidentForm();
    loadIncidentForm();

    $('#newStaffForm').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'new_staff';
        var data = $('#newStaffForm').serialize()+'&mode='+mode;

        $.ajax ({
            url: 'process_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#newStaffStatus').html(data);
                 $('#newStaff').load('modal_forms.php#new_staff');
             }
        });
        //alert('This works!');
    });

    //ajax for accident for ajax
    $('#accidentForm').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'accident';
        var data = $('#accidentForm').serialize()+'&mode='+mode;

        $.ajax ({
            url: 'process_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#accidentStatus').html(data);
                 $('#accidentAjax').load('modal_forms.php #accident_load');
             }
        });
        //alert('This works!');
    });

    //ajax for incident for ajax
    $('#incidentForm').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'incident';
        var data = $('#incidentForm').serialize()+'&mode='+mode;

        $.ajax ({
            url: 'process_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#incidentStatus').html(data);
                 $('#incidentAjax').load('modal_forms.php #incident_load');
             }
        });
        //alert('This works!');
    });

    //ajax for report form
    $('#reportForm').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'report';
        var data = $('#incidentForm').serialize()+'&mode='+mode;

        $.ajax ({
            url: 'process_ajax',
            type: 'POST',
            data: data,
            success: function (data) {
                $('#reportStatus').html(data);
            }
        });
    });

});

function loadNewStaffForm() {
    $('#bNewStaff').on('click', function () {
        //alert ('Working');
        $('#newStaff').load('modal_forms.php #new_staff');
    });
}

function loadAccidentForm() {
    $('#bAccident').on('click', function () {
        //alert ('Working');
        $('#accidentAjax').load('modal_forms.php #accident_load');
    });
}

function loadIncidentForm() {
    $('#bIncident').on('click', function () {
        $('#incidentAjax').load('modal_forms.php #incident_load');
    });
}