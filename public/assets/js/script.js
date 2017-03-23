$('document').ready(function() {
    loadNewStaffForm();
    loadAccidentForm();
    loadIncidentForm();
    loadPaymentForm();
    loaddepartmentForm();
    loadAddCatfForm();
    loadCatForm();

    $('#addDepartmentForm').on('submit', function(event) {
        event.preventDefault();

        var mode = 'addDepartment';
        var data = $('#addDepartmentForm').serialize()+'&mode='+mode;
        // alert('this is working');
        $.ajax ({
            url: 'process_ajax.php',
            type: 'POST',
            data: data,
            success: function(data) {
                $('#addDepartmentStatus').html(data);
                $('#addDepartmentAjax').load('modal_forms.php #dep_load');
            }
        });
    });

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
                $('#newStaff').load('modal_forms.php #new_staff');
             }
        });
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

    //ajax for categories for ajax
    $('#catForm').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'cat';
        var data = $('#catForm').serialize()+'&mode='+mode;

        $.ajax ({
            url: 'process_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#catStatus').html(data);
                 $('#catAjax').load('modal_forms.php #cat_load');
             }
        });
        //alert('This works!');
    });

    //ajax for payment for ajax
    $('#paymentForm').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'payment';
        var data = $('#paymentForm').serialize()+'&mode='+mode;

        $.ajax ({
            url: 'process_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#paymentStatus').html(data);
                 $('#paymentAjax').load('modal_forms.php #payment_load');
             }
        });
        //alert('This works!');
    });

    //ajax for report form
    $('#reportForm').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'report';
        var data = $('#reportForm').serialize()+'&mode='+mode;

        $.ajax ({
            url: 'process_ajax.php',
            type: 'POST',
            data: data,
            success: function (data) {
                $('#reportStatus').html(data);
            }
        });
    });

});

function loadNewStaffForm() {
    $('#bNewStaff').on('click', function (event) {
        event.preventDefault();
        $('#newStaff').load('modal_forms.php #new_staff');
    });
}

function loadAccidentForm() {
    $('#bAccident').on('click', function (event) {
        event.preventDefault();
        $('#accidentAjax').load('modal_forms.php #accident_load');
    });
}

function loaddepartmentForm() {
    $('#addDepartment').on('click', function (event) {
        event.preventDefault();
        $('#addDepartmentAjax').load('modal_forms.php #dep_load');
    });
}

function loadAddCatfForm() {
    $('#addCat').on('click', function (event) {
        event.preventDefault();
        $('#addCatAjax').load('modal_forms.php #addCat_load');
    });
}


function loadIncidentForm() {
    $('#bIncident').on('click', function (event) {
        event.preventDefault();
        $('#incidentAjax').load('modal_forms.php #incident_load');
    });
}

function loadCatForm() {
    $('#bAddCat').on('click', function (event) {
        event.preventDefault();
        $('#catAjax').load('modal_forms.php #cat_load');
    });
}

function loadPaymentForm() {
    $('#bAddPayment').on('click', function (event) {
        event.preventDefault();
        $('#paymentAjax').load('modal_forms.php #payment_load');
    });
}

// function loadReport () {
//     $("#loadReport").load('process_ajax.php');
// }