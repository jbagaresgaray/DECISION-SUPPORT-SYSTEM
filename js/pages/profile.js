$(document).ready(function() {

    
});

function clear() {
    $("#fname").val('');
    $("#lname").val('');
    $("#username").val('');
    $("#email").val('');
    $("#mobileno").val('');
}

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function getData(status, id) {
    $.ajax({
        url: '../server/users/' + id,
        async: true,
        type: 'GET',
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                var data = decode.userdata;

                $("#user_id").val(data.id);
                $("#fname").val(data.fname);
                $("#lname").val(data.lname);
                $("#level").val(data.level);
                $("#username").val(data.username);
                $("#email").val(data.email);
                $("#mobileno").val(data.mobileno);

                if (status === 'view') {
                    $("#fname").prop('disabled', true);
                    $("#lname").prop('disabled', true);
                    $("#level").prop('disabled', true);
                    $("#username").prop('disabled', true);
                    $("#password").hide();
                    $("#password").prev('label').hide();
                    $("#password2").hide();
                    $("#password2").prev('label').hide();
                    $("#email").prop('disabled', true);
                    $("#mobileno").prop('disabled', true);

                    $("#btn-save").attr('disabled', true);
                } else {
                    $("#fname").prop('disabled', false);
                    $("#lname").prop('disabled', false);
                    $("#level").prop('disabled', false);
                    $("#username").prop('disabled', false);
                    $("#password").hide();
                    $("#password").prev('label').hide();
                    $("#password2").hide();
                    $("#password2").prev('label').hide();
                    $("#email").prop('disabled', false);
                    $("#mobileno").prop('disabled', false);

                    $("#btn-save").removeAttr('disabled');
                }


                $('#userModal').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}
