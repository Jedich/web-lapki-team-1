

$(document).ready(function () {
    $('#go').click(function () {
        // или сериализируем данные формы
        // var regData = $('#reg_form').serialize();


        var username = $("#log").val().trim();
        var password = $("#pass").val().trim();
        console.log(username + ":" + password);

        var a = passid_validation(password, 7, 12);
        console.log(a)

        var jsonData = {
            username: username,
            password: password
        };

        $.ajax({
            type: 'POST',
            url: '../handler.php',
            method: 'POST',
            dataType: 'json',
            data: {
                fed: jsonData,
            },
            success: function (response) {
                console.log(response);
                if (response["code"] === 400){
                    alert(response["msg"])
                }
            }
        });


    });
});

$(document).ready(function () {


    $.ajax({
        type: 'POST',
        url: '../citys.php',
        method: 'POST',
        dataType: 'json',
        success: function (response) {
            console.log("CITY");
            console.log(response["data"]);
            $( "#cities" ).autocomplete({
                source: response["data"]
            });
        }
    });
});
function passid_validation(passid,mx,my)
{
    var passid_len = passid.length;
    if (passid_len == 0 ||passid_len >= my || passid_len < mx)
    {
        alert("Password should not be empty / length be between "+mx+" to "+my);

        return false;
    }
    return true;
}
