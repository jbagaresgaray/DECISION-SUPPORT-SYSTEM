function save() {
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
