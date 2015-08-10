$(document).ready(function() {
    $('#dataTables-example').dataTable();
});

function create_child(){
  $("#fname").val('');
  $("#mname").val('');
  $("#lname").val('');
  $("#address").val('');
  $("#location").val('');
  $("#height").val('');
  $("#weight").val('');
  $("#month").val('');
  $("#gender").val('');

  $('#childModal').modal('show');
}

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function refresh(){

}

function save() {
    resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#fname').val() == '') {
        $('#fname').next('span').text('First Name is required.');
        empty = true;
    }

    if ($('#mname').val() == '') {
        $('#mname').next('span').text('Middle Name is required.');
        empty = true;
    }

    if ($('#lname').val() == '') {
        $('#lname').next('span').text('Last Name is required.');
        empty = true;
    }

    if ($('#fname').val() == '') {
        $('#fname').next('span').text('First Name is required.');
        empty = true;
    }

    if ($('#fname').val() == '') {
        $('#fname').next('span').text('First Name is required.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }

    $.ajax({
        url: '../server/child/index.php',
        async: false,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            fname: $('#fname').val(),
            mname: $('#mname').val(),
            lname: $('#lname').val(),
            address: $('#address').val(),
            location: $('#location').val(),
            date: $('#date').val(),
            height: $('#height').val(),
            weight: $('#weight').val(),
            month: $('#month').val(),
            gender: $('#gender').val()
        },
        success: function(response) {
            var decode = response;

            if (decode.success == true) {
                refresh();
                clear_category();
            } else if (decode.success === false) {
                $('#btn-save').button('reset');
                alert(decode.error);
                return;
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error.responseText);
            console.log(error.message);
            return;
        }
    });
}
