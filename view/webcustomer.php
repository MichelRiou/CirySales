<script type="text/javascript">
    function getRadio() {
        var radioValue = '';
        for (i = 0; i < document.form2.civility.length; i++) {
            if (document.form2.civility[i].checked) {
                radioValue = document.form2.civility[i].value;
            }
        }
        return radioValue;
    }
    function ctrlAddWebCustomer() {
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
        // Monitoring des erreurs
        console.log(msg);
        document.getElementById("addMessage").innerHTML = msg;
        $result = (msg != "" ? false : true);
        return $result;
    }

    $(document).ready(function () {
        // Requête AJAX pour validation
        $("#addWebCustomer").on('click', (function () {
            if (ctrlAddWebCustomer()) {
                $.ajax({
                    type: 'POST',
                    url: '/routes.php?action=addWebCustomer',
                    data:
                            {
                                "lastname": $("#lastname").val(),
                                "firstname": $("#firstname").val(),
                                "civility": getRadio(),
                                "address1": $("#address1").val(),
                                "address2": $("#address2").val(),
                                "zipcode": $("#zipcode").val(),
                                "city": $("#city").val(),
                                "email": $("#email").val(),
                                "sms": $("#sms").val()
                            },
                    success: function (result) {
                        console.log('retour success' + result);
                        if (result != 1) {
                            $("#addMessage").html('Email déjà existant.');
                        } else {
                            $.ajax({
                                type: 'POST',
                                url: '/routes.php?action=sendMailCustomer',
                                data:
                                        {
                                            "email": $("#email").val()
                                        },
                                success: function (result) {
                                   
                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                    alert(textStatus);
                                    $("#retour").html("Erreur d\'envoi de la requête" + result);
                                }
                            });
                            $('#addCancel').trigger('click');
                            //refresh();
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                        $("#retour").html("Erreur d\'envoi de la requête" + result);
                    }
                });
                return false;
            }
        }));
    });
</script>
<div class="container py-5 extra">
    <div class="row">
        <div class="col-md-12">
            <div class="row" >
                <div class="col-md-8 mx-auto ">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">Inscription</h3>
                        </div>
                        <div class="card-body">
                            <form  method="POST" action="routes.php?action=addWebCustomer" name="form2" onSubmit="return verif_form2()">
                                <div class="form-group row offset-sm-5">
                                    <span><input type="radio" aria-label="Radio button for following text input" name="civility" value="MME" checked="checked">Mme </span>
                                    <span><input type="radio" aria-label="Radio button for following text input" name="civility" value="MLLE" >Mlle</span>
                                    <span><input type="radio" aria-label="Radio button for following text input" name="civility" value="MR" >Mr</span>       
                                </div>                              
                                <div class="form-group row">

                                    <label class="control-label col-sm-3" for="lastname">*Nom:</label>
                                    <div class="input-group col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm  rounded-0" 
                                               name="lastname" id="lastname" >                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="firstname">*Prénom:</label>
                                    <div class="input-group col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="firstname" id="firstname" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="address1">Adresse:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="address1" id="address1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="address2">Adresse-suite:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="address2" id="address2" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="zipcode">Code postal:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="zipcode" id="zipcode" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="city">Ville:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="city" id="city">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="email">*E-mail:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="sms">SMS:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="sms" id="sms">
                                    </div>
                                </div> 
                                <div id='addMessage' ></div>
                                <div>
                                    <button onclick="location.href = 'routes.php'" type="button" class="btn btn-success btn-sm float-left" 
                                            id="addCancel" name='toto' >Annuler</button>

                                    <button type="button" class="btn btn-success btn-sm float-right" 
                                            id="addWebCustomer" name='toto' >Enregistrer</button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
