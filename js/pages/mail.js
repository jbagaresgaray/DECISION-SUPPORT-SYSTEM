function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function clear() {
    $("#name").val('');
    $("#email").val('');
    $("#phone").val('');
    $("#message").val('');
}

function send() {
    resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#name').val() == '') {
        $('#name').next('span').text('Please enter your name.');
        empty = true;
    }

    if ($('#email').val() == '') {
        $('#email').next('span').text('Please enter your email address.');
        empty = true;
    }

    if ($('#phone').val() == '') {
        $('#phone').next('span').text('Please enter your mobile number.');
        empty = true;
    }

    if ($('#message').val() == '') {
        $('#message').next('span').text('Please enter a message.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }

    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var message = $("#message").val();

    $.ajax({
        url: "../server/mail/",
        type: "POST",
        data: {
            name: name,
            phone: phone,
            email: email,
            message: message
        },
        cache: false,
        success: function(decode) {
        	console.log('decode: ',JSON.parse(decode));
        	var res = JSON.parse(decode);
            if (res.success == true) {
                clear();
                 $.notify(res.msg, "success");
            } else if (res.success === false) {
                $.notify("Sorry " + name + ", it seems that my mail server is not responding. Please try again later!", "error");
                return;
            }
           
        },
        error: function() {
            // Fail message
            $.notify("Sorry " + name + ", it seems that my mail server is not responding. Please try again later!", "error");
            return;
        },
    })
}
