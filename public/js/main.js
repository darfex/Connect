function textCounter()
{
    var maxlength = 280;
    var input_char = $("#body").val().length;
    var remaining_char = maxlength - input_char;
    $("#counter").html(remaining_char);
}