<script type="text/javascript">
    var idDelete;
    var idEdit;
    function ctrlAddForm() {
        var msg = "";
        if ($("#addName").val() == '')
            msg += 'Le nom est obligatoire.';
        if ($("#addDesignation").val() == '')
            msg += 'La désignation est obligatoire.';

        // Monitoring des erreurs
        $("#addMessage").html('<h5 class="text-warning text-center">' + msg + '</h5>');
        $result = (msg != "" ? false : true);
        return $result;
    }
    /*function searchString() {
        var search = $('#search').val();
        $("td:contains('" + search + "')").css("background", "lightgrey");
        var n = $("td:contains('" + search + "')").length;
        //alert(n + " occurence(s) trouvée(s)");
        $("td:contains('" + search + "')")[0].scrollIntoView(true);
    }
    function clearSearch() {
        var search = $('#search').val();
        if (search != '') {
            $("td:contains('" + search + "')").css("background", "none");
            $('#search').val('');
        }
    }*/
   /* function refresh() {

        $.ajax({
            type: 'POST',
            url: '/routes.php?action=listForm',
            success: function (data) {
                $("#requete").html(data);
                $('[data-toggle="tooltip"]').tooltip();
                $('a[class="delete"]').click(function () {
                    idDelete = this.getAttribute('idForm');
                    console.log(idDelete);
                });
                $('a[class="edit"]').click(function () {
                    idEdit = this.getAttribute('idForm');
                    console.log(idEdit);
                    $('#editName').val(this.getAttribute('formname'));
                    //designationEdit = this.getAttribute('designation');
                    $('#editDesignation').val(this.getAttribute('designation'));
                    //validatedEdit = this.getAttribute('validated');
                    $('#editCategory').val(this.getAttribute('category')).prop('selected', true);
                    //validatedEdit = this.getAttribute('validated');
                    $('#editSearchType').val(this.getAttribute('searchtype')).prop('selected', true);
                    $('#editValidated').val(this.getAttribute('validated')).prop('selected', true);

                });

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus);
                $("#retour").html("Erreur d\'envoi de la requête");
            }
        });
    }*/
    $(document).ready(function () {
       /* refresh();
        $("#back").click(function () {
            window.history.back();
        });*/
        // Activation du tooltip
       /* $('[data-toggle="tooltip"]').tooltip();
        // Activation de la fenêtre modale AJOUTER UN FORMULAIRE
        $("#addbutton").click(function () {
            // Reset de la fenetre modale 
            $("#addName").val('');
            $("#addDesignation").val('');
            $("#addMessage").html('');
            $("#addFormModal").modal('show');
        });*/
        // Requête AJAX pour validation
        $("#addWebCustomer").on('click', (function () {
            if (ctrlAddForm()) {
                $.ajax({
                    type: 'POST',
                    url: '/routes.php?action=addWebCustomer',
                     data:
                    {
                        "lastname": $("#lastname").val(),
                        "firstname": $("#firstname").val(),
                        "email": $("#email").val()
                    },
                    success: function (result) {
                        console.log('retour success' + result);
                        if (result != 1) {
                            $("#addMessage").html('<h5 class="text-warning text-center">Nom de formulaire déjà existant !!</h5>');
                        } else {
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
                                    <span><input type="radio" aria-label="Radio button for following text input" name="civility" value="MLLE" >Mle</span>
                                    <span><input type="radio" aria-label="Radio button for following text input" name="civility" value="MR" >Mr</span>       
                                </div>                              
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="lastname">Nom:</label>
                                    <div class="input-group col-md-9">
                                        <input type="text" 
                                               class="form-control form-control-sm  rounded-0" 
                                               name="lastname" id="lastname" >                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="firstname">Prénom:</label>
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
                                    <label class="control-label col-sm-3" for="email">E-mail:</label>
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
                                <div><?php
                                    if (isset($messageErreur))
                                        echo ('<h5 class="text-warning text-center">' . $messageErreur . '</h5>');
                                    ?><div>
                                        <button onclick="location.href='routes.php'" type="button" class="btn btn-success btn-sm float-left" 
                                                id="cancelWebCustomer" name='toto' >Annuler</button>
                                        <button type="button" class="btn btn-success btn-sm float-right" 
                                                id="addWebCustomer" name='toto' >Enregistrer</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
