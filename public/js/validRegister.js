function checkMdp() {
    var mdp = $('input[name="password"]').val();
    var mdp2 = $('input[name="confirm_password"]').val();
    if (mdp!=mdp2) {
        var msg = document.createTextNode("Mots de passe différents");
        document.getElementById("mdperror").value(msg);
    }
    else{
        var msg = document.createTextNode("Mots de passe ok");
        document.getElementById("mdperror").value(msg);
    }
}
