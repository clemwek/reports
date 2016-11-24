$('document').ready(function () {
// 	//Add date-picker for working history
//-------------Register page--------------
    $('#rdob').datepicker();

    //--------------------------Employee side-----------------------------------------

    //dates
	$('#wh_create_start_date').datepicker();//profile pg work history start date
	$('#wh_create_end_date').datepicker();//profile pg work history end date
    $('#eh_create_start_date').datepicker();//profile pg work history start date
	$('#eh_create_end_date').datepicker();//profile pg work history end date

    //proccess update names
    $('#edit_names').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'user_update_name';
        var data = $('#edit_names').serialize()+"&mode="+mode;

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess update phone number
    $('#edit_phone').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'user_update_phone';
        var data = $('#edit_phone').serialize()+"&mode="+mode;

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess update Email
    $('#edit_email').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'user_update_email';
        var data = $('#edit_email').serialize()+"&mode="+mode;

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess update Region
    $('#edit_region').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var mode = 'user_update_region';
        var data = $('#edit_region').serialize()+"&mode="+mode;

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess create a working 
    $('#wh_create_form').on('submit', function (event) {
        event.preventDefault();//prevent form submit

        //set variables
        var mode = 'wh_create';
        var data = $('#wh_create_form').serialize()+"&mode="+mode;

        $.ajax({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
            success: function (data) {
                 $('#wh_status').html(data);
             }
        });
    });
    
    //proccess create a education history 
    $('#eh_create_form').on('submit', function (event) {
        event.preventDefault();//prevent form submit

        //set variables
        var mode = 'eh_create';
        var data = new FormData(this); //$('#eh_create_form').serialize()+"&mode="+mode;

        $.ajax({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            success: function (data) {
                 $('#eh_status').html(data);
             }
        });
    });
    
    //proccess create a other qualifications 
    $('#oq_create_form').on('submit', function (event) {
        event.preventDefault();//prevent form submit

        //set variables
        var mode = 'oq_create';
        var data = new FormData(this); //$('#eh_create_form').serialize()+"&mode="+mode;

        $.ajax({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            success: function (data) {
                 $('#oq_status').html(data);
             }
        });
    });
    
    //proccess create a referees 
    $('#re_create_form').on('submit', function (event) {
        event.preventDefault();//prevent form submit

        //set variables
        var mode = 're_create';
        var data = new FormData(this); //$('#eh_create_form').serialize()+"&mode="+mode;

        $.ajax({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            success: function (data) {
                 $('#re_status').html(data);
             }
        });
    });
    //------------------------------End of Employee side------------------------

    //--------------------------Staff/admin side-----------------------------------------
    //proccess update names
    $('#admin_edit_names').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var data = $('#admin_edit_names').serialize();

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess update phone number
    $('#admin_edit_phone').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var data = $('#admin_edit_phone').serialize();

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess update Email
    $('#admin_edit_email').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var data = $('#admin_edit_email').serialize();

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess update Region
    $('#admin_edit_region').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var data = $('#admin_edit_region').serialize();

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
            success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //---------------------CV page--------------------------
    $('#search_name').on('submit', function (event) {
        event.preventDefault();

        //set up variables
        var data = $('#admin_edit_region').serialize();

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
            success: function (data) {
                 $('#search_results').html(data);
             }
        });
        // alert ('Working');
    });
    //-------------------End of Staff/Admin section------------------------------------

    //--------------------------Employer side-----------------------------------------
    //proccess update names
    $('#employer_edit_names').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var data = $('#employer_edit_names').serialize();

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess update phone number
    $('#employer_edit_phone').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var data = $('#employer_edit_phone').serialize();

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess update Email
    $('#employer_edit_email').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var data = $('#employer_edit_email').serialize();

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
             success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //proccess update Region
    $('#employer_edit_region').on('submit', function (event) {
        event.preventDefault();//prevent form submit
        //set up variables
        var data = $('#employer_edit_region').serialize();

        $.ajax ({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
            success: function (data) {
                 $('#user_status').html(data);
             }
        });
        //alert('This works!');
    });

    //------------------------Proccess jobs-------------------------------
    $('#new_job').on('submit', function (event) {
        event.preventDefault();//prevent form submit

        var mode = 'new_job';
        var data = $('#new_job').serialize()+'&mode='+mode;

        $.ajax({
            url: 'proccess_ajax.php',
            type: 'POST',
            data: data,
            success: function (data) {
                 $('#job_status').html(data);
             }
        });
    });

});//---------- End of document ready -------------------

function wh_create_form_build () {
    var data = 'createForm' 
    $.ajax ({
        url: 'proccess_ajax.php',
        type: 'POST',
        data: "mode="+data,
        success: function (data) {
            $('#wh_load_form').text (data);
        }
    });
}

function build (mode) {
    $.ajax ({
        url: 'proccess_ajax.php',
        type: 'POST',
        data: "mode="+data,
        success: function (data) {
            $('#wh_load_form').html (data);
        }
    });
}

