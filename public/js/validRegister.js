function checkPwd() {
    var pwd = $('input[name="password"]').val();
    var pwd2 = $('input[name="confirm_password"]').val();

    if (pwd!=pwd2) {
        $('#confirm_password').css('border', '2px solid red');
    }
    else{
        $('#password').css('border', '2px solid green');
        $('#confirm_password').css('border', '2px solid green');
    }
}