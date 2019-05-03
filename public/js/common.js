/**
 * 
 * FICHIER DES FONCTIONS JAVASCRIPT / JQUERY COMMUNES
 */
/**
 * 
 * FONCTION DE RECHERCHE DANS UN TABLEAU HTML
 */
var msg = '';
function checkMail()
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(document.getElementById("email").value.toLowerCase());
}
function checkSms() {
    var re = /^0[6-7][0-9]{8}$/;
    return re.test(document.getElementById("sms").value);
}
function checkZipcode() {
    var re = /^[0-9]{5}$/;
    return re.test(document.getElementById("zipcode").value);
}
function checkAddress() {
    if ((document.getElementById("address1").value.length > 1) && (document.getElementById("city").value.length > 1) && checkZipcode())
    {
        return true;
    } else {
        return false;
    }
}
function verif_form()
            {
                msg = '';
                document.getElementById("nom").style.backgroundColor = "white";
                document.getElementById("prenom").style.backgroundColor = "white";
                document.getElementById("pos").style.backgroundColor = "white";
                document.getElementById("email").style.backgroundColor = "white";
                document.getElementById("sms").style.backgroundColor = "white";
                document.getElementById("ad1").style.backgroundColor = "white";
                document.getElementById("ville").style.backgroundColor = "white";

                if (document.getElementById("nom").value.trim().length < 1)
                {
                    document.getElementById("nom").style.backgroundColor = "orange";
                    document.getElementById("nom").focus();
                    msg += 'Le nom est obligatoire.<br>';
                }
                if (document.getElementById("prenom").value.trim().length < 1)
                {
                    document.getElementById("prenom").style.backgroundColor = "orange";
                    document.getElementById("prenom").focus();
                    msg += 'Le prénom est obligatoire.<br>';
                }
                if ((document.getElementById("sus")== null) || (!document.getElementById("sus").checked)){
                if (document.getElementById("ad1").value.length > 0
                        || document.getElementById("ad2").value.length > 0
                        || document.getElementById("pos").value.length > 0
                        || document.getElementById("ville").value.length > 0
                        || document.getElementById("pos").value.length > 0)
                {
                    if (!checkAddress()) {
                        document.getElementById("ad1").style.backgroundColor = "orange";
                        document.getElementById("ville").style.backgroundColor = "orange";
                        document.getElementById("pos").style.backgroundColor = "orange";
                        document.getElementById("ad1").focus();
                        msg += 'L\'adresse n\'est pas valide.<br>';
                    }
                }
                if ((document.getElementById("email").value.length > 0) && (!checkMail()))
                {
                    document.getElementById("email").style.backgroundColor = "orange";
                    document.getElementById("email").focus();
                    msg += 'L\'email ne semble pas valide.<br>';
                }
                if ((document.getElementById("sms").value.length > 0) && (!checkSms()))
                {
                    document.getElementById("sms").style.backgroundColor = "orange";
                    document.getElementById("sms").focus();
                    msg += 'Le numéro de téléphone est incorrect.<br>';
                }


                if (!checkMail() && !checkSms() && !checkAddress()) {

                    msg += 'Vous devez saisir soit un email, un numéro de portable ou une adresse complète.';
                }

                }
                if (msg == '') {
                    return true;
                } else
                {
                    console.log(message);
                    document.getElementById("message").innerHTML = msg;
                    return false;
                }

            }

function verif_form2()
{
    msg = '';
    document.getElementById("lastname").style.backgroundColor = "white";
    document.getElementById("firstname").style.backgroundColor = "white";
    document.getElementById("zipcode").style.backgroundColor = "white";
    document.getElementById("email").style.backgroundColor = "white";
    document.getElementById("sms").style.backgroundColor = "white";
    document.getElementById("address1").style.backgroundColor = "white";
    document.getElementById("city").style.backgroundColor = "white";

    if (document.getElementById("lastname").value.trim().length < 1)
    {
        document.getElementById("lastname").style.backgroundColor = "orange";
        document.getElementById("lastname").focus();
        msg += 'Le nom est obligatoire.<br>';
    }
    if (document.getElementById("firstname").value.trim().length < 1)
    {
        document.getElementById("firstname").style.backgroundColor = "orange";
        document.getElementById("firstname").focus();
        msg += 'Le prénom est obligatoire.<br>';
    }

    if (document.getElementById("address1").value.length > 0
            || document.getElementById("address2").value.length > 0
           /* || document.getElementById("pos").value.length > 0*/
            || document.getElementById("city").value.length > 0
            || document.getElementById("zipcode").value.length > 0)
    {
        if (!checkAddress()) {
            document.getElementById("address1").style.backgroundColor = "orange";
            document.getElementById("city").style.backgroundColor = "orange";
            document.getElementById("zipcode").style.backgroundColor = "orange";
            document.getElementById("address1").focus();
            msg += 'L\'adresse n\'est pas valide.<br>';
        }
    }
    if ((document.getElementById("email").value.length > 0) && (!checkMail()))
    {
        document.getElementById("email").style.backgroundColor = "orange";
        document.getElementById("email").focus();
        msg += 'L\'email n\'est pas valable.<br>';
    }
    if ((document.getElementById("sms").value.length > 0) && (!checkSms()))
    {
        document.getElementById("sms").style.backgroundColor = "orange";
        document.getElementById("sms").focus();
        msg += 'Le numéro de téléphone est incorrect.<br>';
    }


    if (!checkMail()) {
        document.getElementById("email").style.backgroundColor = "orange";
        document.getElementById("email").focus();
        msg += 'Vous devez saisir obligatoirement votre email.';
    }

    if (msg == '') {
        return true;
    } else
    {
        console.log(message);
        document.getElementById("message").innerHTML = msg;
        return false;
    }

}
function searchString() {
    // RE-ECRITURE DE L'EXPRESSION contains POUR DEVENIR CASE INSENSITIVE 
    jQuery.expr[':'].contains = function (a, i, m) {
        return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
    }
    var search = $('#search').val();
    if (search != '' && search != null) {
        var n = $("td:contains('" + search + "')").length;
        if (n != 0) {
            $("td:contains('" + search + "')").css("background", "lightgrey");
            $("td:contains('" + search + "')")[0].scrollIntoView(true);
        }
    }
}
function clearSearch() {
    var search = $('#search').val();
    if (search != '') {
        $("td:contains('" + search + "')").css("background", "none");
        $('#search').val('');
    }

}
